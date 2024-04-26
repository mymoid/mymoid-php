<?php
/**
 * Class PaymentMethod
 *
 * @author    MYMOID <support@mymoid.com>
 * @copyright 2024 MYMOID
 * @license   ISC https://opensource.org/license/isc-license-txt
 * @see       https://developers.mymoid.com/api-reference#/schemas/PaymentMethod
 */

namespace Mymoid\Api\v1\Schemas;

use Mymoid\Api\MymoidObject;
use Mymoid\Api\v1\Common\Constants;
use Mymoid\Traits\MymoidParser;

class PaymentMethod extends MymoidObject
{
    use MymoidParser;

    /** @var string Payment method Identifier. Must be >=64 && <=64 chars */
    protected $id;

    /** @var string Allowed types must be one of Constants::ALLOWED_PAYMENT_METHOD_TYPES */
    protected $type;

    /** @var \DateTime */
    protected $first_usage;

    /** @var PaymentMethodDetails */
    protected $details;

    /**
     * Gets the Payment method Identifier
     *
     * @return string|null
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets the Payment method Identifier
     *
     * @param string|null $id
     *
     * @return PaymentMethod
     * @throws \InvalidArgumentException
     */
    public function setId($id)
    {
        if (mb_strlen($id) !== 64 && !is_null($id)) {
            throw new \InvalidArgumentException('Payment method ID must be >=64 && <=64 chars');
        }

        $this->id = $id;

        return $this;
    }

    /**
     * Gets the Payment method type
     *
     * @return string|null
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Sets the Payment method type
     *
     * @param string|null $type
     *
     * @return PaymentMethod
     */
    public function setType($type)
    {
        // Check if type is allowed
        if (!in_array($type, Constants::ALLOWED_PAYMENT_METHOD_TYPES) && !is_null($type)) {
            $exception = 'Payment method ' . $type . ' type not allowed, must be one of: ' . implode(
                ', ',
                Constants::ALLOWED_PAYMENT_METHOD_TYPES
            );
            throw new \InvalidArgumentException($exception);
        }

        $this->type = $type;

        return $this;
    }

    /**
     * Gets the Payment method details
     *
     * @return PaymentMethodDetails
     */
    public function getDetails()
    {
        return $this->details;
    }

    /**
     * Sets the Payment method details
     *
     * @param PaymentMethodDetails $details
     *
     * @return PaymentMethod
     */
    public function setDetails($details)
    {
        $this->details = $details;

        return $this;
    }

    /**
     * Gets the Payment method first usage
     *
     * @return \DateTime|null
     */
    public function getFirstUsage()
    {
        return $this->first_usage;
    }

    /**
     * Sets the Payment method first usage
     *
     * @param \DateTime|null $first_usage
     *
     * @return PaymentMethod
     */
    public function setFirstUsage($first_usage)
    {
        $this->first_usage = $first_usage;

        return $this;
    }
}
