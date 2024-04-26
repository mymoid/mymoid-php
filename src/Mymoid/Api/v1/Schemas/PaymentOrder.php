<?php
/**
 * Class PaymentOrder
 *
 * @author    MYMOID <support@mymoid.com>
 * @copyright 2024 MYMOID
 * @license   ISC https://opensource.org/license/isc-license-txt
 * @see       https://developers.mymoid.com/api-reference#/schemas/PaymentOrder
 */

namespace Mymoid\Api\v1\Schemas;

use DateTime;
use Mymoid\Api\MymoidObject;
use Mymoid\Api\v1\Common\Constants;
use Mymoid\Traits\MymoidParser;

class PaymentOrder extends MymoidObject
{
    use MymoidParser;

    /** @var string Payment Order ID >=64 chars & <=64 chars */
    protected ?string $payment_order_id = null;

    /** @var int Payment Order's amount. This should be an integer value and represents the value in cents */
    protected int $amount = 0;

    /** @var string The merchant concept to this payment order <=100 chars */
    protected ?string $concept = null;

    /** @var DateTime Payment Order's creation Date. Format yyyy-MM-dd HH:mm:ss */
    protected ?DateTime $creation_date = null;

    /** @var DateTime Payment Order's expiration Date */
    protected ?DateTime $expiration_date = null;

    /** @var string The type of currency associated to the payment order (EUR, MXN, PLN, ARS) */
    protected ?string $currency = null;

    /** @var string The merchant reference to this payment order <=150 chars */
    protected ?string $reference = null;

    /** @var string Short Code >=6 chars / <=6 chars */
    protected ?string $short_code = null;

    /** @var string Status must be one of Constants::ALLOWED_ORDER_STATUSES **/
    protected ?string $status = null;

    /** @var bool $usesISO8601 If true, dates will be parsed as ISO8601 */
    protected bool $usesISO8601 = true;

    /**
     * Gets the Payment Order ID
     *
     * @return string|null
     */
    public function getPaymentOrderId(): ?string
    {
        return $this->payment_order_id;
    }

    /**
     * Sets the Payment Order ID
     *
     * @param string|null $payment_order_id
     *
     * @return PaymentOrder
     * @throws \InvalidArgumentException
     */
    public function setPaymentOrderId(?string $payment_order_id): PaymentOrder
    {
        if (mb_strlen($payment_order_id) !== 64 && !is_null($payment_order_id)) {
            throw new \InvalidArgumentException('Payment Order ID must be 64 chars length');
        }

        $this->payment_order_id = $payment_order_id;

        return $this;
    }

    /**
     * Gets the Payment Order's amount
     *
     * @return int
     */
    public function getAmount(): int
    {
        return $this->amount;
    }

    /**
     * Sets the Payment Order's amount
     *
     * @param int $amount
     *
     * @return PaymentOrder
     */
    public function setAmount(int $amount): PaymentOrder
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Gets the Payment Order's concept
     *
     * @return string|null
     */
    public function getConcept(): ?string
    {
        return $this->concept;
    }

    /**
     * Sets the Payment Order's concept
     *
     * @param string|null $concept
     *
     * @return PaymentOrder
     */
    public function setConcept(?string $concept): PaymentOrder
    {
        $this->concept = $concept;

        return $this;
    }

    /**
     * Gets the Payment Order's creation date
     *
     * @return DateTime|null
     */
    public function getCreationDate(): ?DateTime
    {
        return $this->creation_date;
    }

    /**
     * Sets the Payment Order's creation date
     *
     * @param DateTime|null $creation_date
     *
     * @return PaymentOrder
     */
    public function setCreationDate(?DateTime $creation_date): PaymentOrder
    {
        $this->creation_date = $creation_date;

        return $this;
    }

    /**
     * Gets the Payment Order's expiration date
     *
     * @return DateTime|null
     */
    public function getExpirationDate(): ?DateTime
    {
        return $this->expiration_date;
    }

    /**
     * Sets the Payment Order's expiration date
     *
     * @param DateTime|null $expiration_date
     *
     * @return PaymentOrder
     */
    public function setExpirationDate(?DateTime $expiration_date): PaymentOrder
    {
        $this->expiration_date = $expiration_date;

        return $this;
    }

    /**
     * Gets the Payment Order's currency
     *
     * @return string|null
     */
    public function getCurrency(): ?string
    {
        return $this->currency;
    }

    /**
     * Sets the Payment Order's currency
     *
     * @param string|null $currency
     *
     * @return PaymentOrder
     * @throws \InvalidArgumentException
     */
    public function setCurrency(?string $currency): PaymentOrder
    {
        if (!in_array($currency, Constants::ALLOWED_CURRENCIES) && !is_null($currency)) {
            $exception = 'Currency not allowed. Allowed currencies: ' . implode(', ', Constants::ALLOWED_CURRENCIES)
                . '. Given: ' . $currency;
            throw new \InvalidArgumentException($exception);
        }

        $this->currency = $currency;

        return $this;
    }

    /**
     * Gets the Payment Order's reference
     *
     * @return string|null
     */
    public function getReference(): ?string
    {
        return $this->reference;
    }

    /**
     * Sets the Payment Order's reference
     *
     * @param string|null $reference
     *
     * @return PaymentOrder
     * @throws \InvalidArgumentException
     */
    public function setReference(?string $reference): PaymentOrder
    {
        if (mb_strlen($reference) > 150 && !is_null($reference)) {
            throw new \InvalidArgumentException('Reference must be <= 150 chars length');
        }

        $this->reference = $reference;

        return $this;
    }

    /**
     * Gets the Payment Order's short code
     *
     * @return string|null
     */
    public function getShortCode(): ?string
    {
        return $this->short_code;
    }

    /**
     * Sets the Payment Order's short code
     *
     * @param string|null $short_code
     *
     * @return PaymentOrder
     * @throws \InvalidArgumentException
     */
    public function setShortCode(?string $short_code): PaymentOrder
    {
        if (mb_strlen($short_code) !== 6 && !is_null($short_code)) {
            throw new \InvalidArgumentException('Short Code must be 6 chars length');
        }

        $this->short_code = $short_code;

        return $this;
    }

    /**
     * Gets the Payment Order's status
     *
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * Sets the Payment Order's status
     *
     * @param string|null $status
     *
     * @return PaymentOrder
     * @throws \InvalidArgumentException
     */
    public function setStatus(?string $status): PaymentOrder
    {
        if (!in_array($status, Constants::ALLOWED_ORDER_STATUSES) && !is_null($status)) {
            $exception = 'Status not allowed. Allowed statuses: ' . implode(', ', Constants::ALLOWED_ORDER_STATUSES)
                . '. Given: ' . $status;
            throw new \InvalidArgumentException($exception);
        }

        $this->status = $status;

        return $this;
    }
}
