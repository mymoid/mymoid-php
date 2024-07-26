<?php
/**
 * Class MymoidParser
 *
 * @author    MYMOID <support@mymoid.com>
 * @copyright 2024 MYMOID
 * @license   ISC https://opensource.org/license/isc-license-txt
 */

namespace Mymoid\Traits;

use InvalidArgumentException;
use Mymoid\Api\v1\Common\Constants;
use Mymoid\Api\v1\Common\Helpers;
use Mymoid\Api\v1\Schemas\ApiError;
use Mymoid\Api\v1\Schemas\ApiErrorLegacy;
use Mymoid\Api\v1\Schemas\Bines;
use Mymoid\Api\v1\Schemas\Objects\ErrorDetail;
use Mymoid\Api\v1\Schemas\Objects\ErrorDetailLegacy;
use Mymoid\Api\v1\Schemas\Objects\PaymentMethodDetail;
use Mymoid\Api\v1\Schemas\PaymentMethod;
use Mymoid\Api\v1\Schemas\PaymentMethodDetails;
use Mymoid\Api\v1\Schemas\PaymentOrder;
use Mymoid\Api\v1\Schemas\PaymentOrderDetail;
use Mymoid\Api\v1\Schemas\PaymentPoint;
use Mymoid\Api\v1\Schemas\TransactionDetail;
use ReflectionClass;
use ReflectionProperty;

trait MymoidParser
{
    /**
     * Parse JSON data to object
     *
     * @param string $content
     *
     * @return $this (>7.4 required for static)
     * @throws InvalidArgumentException
     */
    public function parse(string $content)
    {
        $data = json_decode($content, true);
        $this->checkJsonError();

        foreach ($data as $key => $value) {
            if (!property_exists($this, $key) || is_null($value) || empty($value)) {
                continue;
            }

            $this->setValue($key, $value);
        }

        return $this;
    }

    /**
     * Parse JSON data from array to object
     *
     * @param array $content
     *
     * @return $this (>7.4 required for static)
     * @throws InvalidArgumentException
     */
    public function parseFromArray(array $content)
    {
        foreach ($content as $key => $value) {
            if (!property_exists($this, $key) || (is_null($value) && $value !== 0)) {
                continue;
            }

            $this->setValue($key, $value);
        }

        return $this;
    }

    public function toJson()
    {
        $reflectionClass = new \ReflectionClass(self::class);
        $properties = $reflectionClass->getProperties();
    
        $propertiesArray = [];
        foreach ($properties as $property) {
            $property->setAccessible(true); // Ensure property is accessible
            $name = $property->getName();
            $value = $property->getValue($this);
            
            // Format expiration_date to ISO 8601 string if it's a DateTime object
            if ($value instanceof \DateTime) {
                $value = $value->format(\DateTime::ATOM); // ISO 8601 format
            }
    
            // Include only properties that are not null or optional properties that are explicitly set to zero
            if ($value !== null || (is_numeric($value) && $value === 0)) {
                $propertiesArray[$name] = $value;
            }
        }
    
        // Ensure proper encoding, including handling zero values
        $jsonEncodedProperties = json_encode($propertiesArray, JSON_PRESERVE_ZERO_FRACTION);
    
        // Check for JSON encoding errors
        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new \RuntimeException('Failed to encode properties to JSON: ' . json_last_error_msg());
        }
    
        return $jsonEncodedProperties;
    }

    /**
     * Sets the value to the object
     *
     * @param string $key
     * @param mixed $value
     *
     * @return void
     * @throws InvalidArgumentException
     */
    private function setValue(string $key, mixed $value, $obj = null): void
    {
        $method = 'set' . Helpers::snakeCaseToPascalCase($key);
        if (!method_exists($this, $method) && is_null($obj) || Helpers::isMagicMethod($method)) {
            return;
        }

        $object = $obj ?? $this;
        $object_class = get_class($object);

        if ($key === 'details' && $object_class === ApiError::class) {
            $value = $this->parseErrors($value);
        } elseif ($key === 'details' && $object_class === ApiErrorLegacy::class) {
            $value = $this->parseErrors($value, true);
        } elseif ($key === 'details' && $object_class === PaymentMethod::class) {
            $value = $this->parsePaymentMethodDetails($value);
        } elseif ($key === 'details' && $object_class === PaymentMethodDetails::class) {
            $value = $this->parsePaymentMethodDetails($value);
        } elseif ($key === 'payment_point' && $object_class === PaymentOrderDetail::class) {
            $value = $this->parsePaymentPoint($value);
        } elseif ($key === 'payment_method_detail' && $object_class === PaymentMethodDetail::class) {
            $value = $this->parsePaymentMethodDetail($value);
        } elseif ($key === 'bines' && $object_class === PaymentMethodDetails::class) {
            $value = $this->parseBines($value);
        } elseif ($key === 'payment_point' && $object_class === TransactionDetail::class) {
            $value = $this->parsePaymentPoint($value);
        } elseif ($key === 'payment_method' && $object_class === TransactionDetail::class) {
            $value = $this->parsePaymentMethod($value);
        } elseif ($key === 'payment_order' && $object_class === TransactionDetail::class) {
            $value = $this->parsePaymentOrder($value);
        } elseif (in_array($key, Constants::DATE_VARIABLE_NAMES)) {
            if ($key === 'expiration_date' && $object_class === PaymentOrder::class) {
                $value = $this->parseDate($value);
            } elseif ($key !== 'expiration_date') {
                $value = $this->parseDate($value);
            }
        }

        if (!is_null($obj) && method_exists($obj, $method)) {
            $obj->$method($value);

            return;
        }

        $this->$method($value);
    }

    /**
     * Parse JSON date string to object
     *
     * @param string $date ISO 8601 or yyyy-MM-dd HH:mm:ss or timestamp
     *
     * @return DateTime
     * @throws InvalidArgumentException
     */
    private function parseDate(string $date): \DateTime
    {
        // Detect if date is a timestamp (numeric format)
        if (is_numeric($date)) {
            $dateTime = new \DateTime();
            $dateTime->setTimestamp(floor($date / 1000));

            if (property_exists($this, 'usesISO8601') && $this->usesISO8601) {
                return $dateTime->format('Y-m-d\TH:i:s\Z');
            }

            return $dateTime;
        }

        // Detect if date is in ISO 8601 format
        $date_iso_8601 = \DateTime::createFromFormat('Y-m-d\TH:i:s\Z', $date);
        $date_other = \DateTime::createFromFormat('Y-m-d H:i:s', $date);

        if ($date_iso_8601 && $date_iso_8601->format('Y-m-d\TH:i:s\Z') === $date) {
            return $date_iso_8601;
        }

        if (!$date_other || $date_other->format('Y-m-d H:i:s') !== $date) {
            throw new \InvalidArgumentException('Date must be in format yyyy-MM-dd HH:mm:ss or ISO 8601');
        }

        return $date_other;
    }

    /**
     * Parse JSON errors to object
     *
     * @param array $errors
     *
     * @return array<ErrorDetail>
     */
    private function parseErrors(array $errors, $is_legacy = false): array
    {
        $error_details = [];

        foreach ($errors as $error) {
            if (!$is_legacy) {
                $error_detail = new ErrorDetail();
                $error_detail->setMessage($error['message']);
            } else {
                $error_detail = new ErrorDetailLegacy();
                $error_detail->setFieldName($error['field_name']);
                $error_detail->setCode($error['code']);
                $error_detail->setMessage($error['message']);
            }

            $error_details[] = $error_detail;
        }

        return $error_details;
    }

    /**
     * Parse JSON payment point to object
     *
     * @param array $payment_point
     *
     * @return PaymentPoint
     */
    private function parsePaymentPoint(array $payment_point): PaymentPoint
    {
        $payment_point_object = new PaymentPoint();

        if (array_key_exists('id', $payment_point)) {
            $payment_point_object->setId($payment_point['id']);
        }

        return $payment_point_object;
    }

    /**
     * Parse JSON payment method to object
     *
     * @param array $payment_method_details
     *
     * @return PaymentMethodDetails
     */
    private function parsePaymentMethodDetails(array $payment_method_details): PaymentMethodDetails
    {
        $payment_method_details_object = new PaymentMethodDetails();

        foreach ($payment_method_details as $key => $value) {
            $this->setValue($key, $value, $payment_method_details_object);
        }

        return $payment_method_details_object;
    }

    /**
     * Parse JSON payment method detail to object
     *
     * @param array $payment_method_detail
     *
     * @return PaymentMethodDetail
     */
    private function parsePaymentMethodDetail(array $payment_method_detail): PaymentMethodDetail
    {
        $payment_method_detail_object = new PaymentMethodDetail();

        foreach ($payment_method_detail as $key => $value) {
            $this->setValue($key, $value, $payment_method_detail_object);
        }

        return $payment_method_detail_object;
    }

    /**
     * Parse JSON Bines to object
     *
     * @param array $bines
     *
     * @return Bines
     */
    private function parseBines(array $bines): Bines
    {
        $bines_object = new Bines();

        foreach ($bines as $key => $value) {
            $this->setValue($key, $value, $bines_object);
        }

        return $bines_object;
    }

    /**
     * Parse array payment method to object
     *
     * @param array $payment_method
     *
     * @return PaymentMethod
     */
    private function parsePaymentMethod(array $payment_method): PaymentMethod
    {
        $payment_method_object = new PaymentMethod();

        foreach ($payment_method as $key => $value) {
            $this->setValue($key, $value, $payment_method_object);
        }

        return $payment_method_object;
    }

    /**
     * Parse array payment order to object
     *
     * @param array $payment_order
     *
     * @return PaymentOrder
     */
    private function parsePaymentOrder(array $payment_order): PaymentOrder
    {
        $payment_order_object = new PaymentOrder();

        foreach ($payment_order as $key => $value) {
            $this->setValue($key, $value, $payment_order_object);
        }

        return $payment_order_object;
    }

    /**
     * Check JSON error
     *
     * @throws InvalidArgumentException
     */
    private function checkJsonError()
    {
        // Switch and check possible JSON errors
        switch (json_last_error()) {
            case JSON_ERROR_NONE:
                $has_error = false;
                $error_msg = ''; // JSON is valid // No error has occurred
                break;
            case JSON_ERROR_DEPTH:
                $error_msg = 'The maximum stack depth has been exceeded.';
                break;
            case JSON_ERROR_STATE_MISMATCH:
                $error_msg = 'Invalid or malformed JSON.';
                break;
            case JSON_ERROR_CTRL_CHAR:
                $error_msg = 'Control character error, possibly incorrectly encoded.';
                break;
            case JSON_ERROR_SYNTAX:
                $error_msg = 'Syntax error, malformed JSON.';
                break;
                // PHP >= 5.3.3
            case JSON_ERROR_UTF8:
                $error_msg = 'Malformed UTF-8 characters, possibly incorrectly encoded.';
                break;
                // PHP >= 5.5.0
            case JSON_ERROR_RECURSION:
                $error_msg = 'One or more recursive references in the value to be encoded.';
                break;
                // PHP >= 5.5.0
            case JSON_ERROR_INF_OR_NAN:
                $error_msg = 'One or more NAN or INF values in the value to be encoded.';
                break;
            case JSON_ERROR_UNSUPPORTED_TYPE:
                $error_msg = 'A value of a type that cannot be encoded was given.';
                break;
            default:
                $error_msg = 'Unknown JSON error occured.';
                break;
        }

        if ($has_error) {
            throw new InvalidArgumentException($error_msg);
        }
    }

    /**
     * Get object properties using reflection
     *
     * @see https://www.php.net/manual/en/class.reflectionclass.php
     *
     * @param string $object_class
     *
     * @return array
     */
    private function getObjectProperties(string $object_class)
    {
        $result = [];
        $reflection_class = new ReflectionClass($object_class);

        foreach ($reflection_class->getProperties(ReflectionProperty::IS_PROTECTED) as $property) {
            $property->setAccessible(true);
            $value = $property->getValue($this);

            if (!empty($value)) {
                if ($value instanceof \DateTime) {
                    // If the class has de usesISO8601 property, format date to ISO 8601
                    if (property_exists($this, 'usesISO8601') && $this->usesISO8601) {
                        // Format date to ISO 8601
                        $result[$property->getName()] = $value->format('Y-m-d\TH:i:s\Z');
                    } else {
                        // Format date to yyyy-MM-dd HH:mm:ss
                        $result[$property->getName()] = $value->format('Y-m-d H:i:s');
                    }
                } elseif (is_object($value)) {
                    $value_classname = get_class($value);
                    $result[$property->getName()] = $this->getObjectProperties($value_classname);
                } else {
                    $result[$property->getName()] = $value;
                }
            }
        }

        return $result;
    }
}
