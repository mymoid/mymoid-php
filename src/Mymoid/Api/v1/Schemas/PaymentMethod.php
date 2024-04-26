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

use DateTime;
use Mymoid\Api\MymoidObject;
use Mymoid\Api\v1\Common\Constants;
use Mymoid\Api\v1\Schemas\PaymentMethodDetails;
use Mymoid\Traits\MymoidParser;

class PaymentMethod extends MymoidObject
{
    use MymoidParser;

    /** @var string Payment method Identifier. Must be >=64 && <=64 chars */
    protected ?string $id = null;

    /** @var string Allowed types must be one of Constants::ALLOWED_PAYMENT_METHOD_TYPES */
    protected ?string $type = null;

    /** @var DateTime */
    protected ?DateTime $first_usage = null;

    /** @var PaymentMethodDetails */
    protected ?PaymentMethodDetails $details = null;

    /**
     * Gets the Payment method Identifier
     *
     * @return string|null
     */
    public function getId(): ?string
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
    public function setId(?string $id): PaymentMethod
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
    public function getType(): ?string
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
    public function setType(?string $type): PaymentMethod
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
    public function getDetails(): PaymentMethodDetails
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
    public function setDetails(PaymentMethodDetails $details): PaymentMethod
    {
        $this->details = $details;

        return $this;
    }

    /**
     * Gets the Payment method first usage
     *
     * @return DateTime|null
     */
    public function getFirstUsage(): ?DateTime
    {
        return $this->first_usage;
    }

    /**
     * Sets the Payment method first usage
     *
     * @param DateTime|null $first_usage
     *
     * @return PaymentMethod
     */
    public function setFirstUsage(?DateTime $first_usage): PaymentMethod
    {
        $this->first_usage = $first_usage;

        return $this;
    }
}
