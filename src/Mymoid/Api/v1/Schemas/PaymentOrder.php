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

use Mymoid\Api\MymoidObject;
use Mymoid\Api\v1\Common\Constants;
use Mymoid\Traits\MymoidParser;

class PaymentOrder extends MymoidObject
{
    use MymoidParser;

    /** @var string Payment Order ID >=64 chars & <=64 chars */
    protected $payment_order_id;

    /** @var int Payment Order's amount. This should be an integer value and represents the value in cents */
    protected $amount = 0;

    /** @var string The merchant concept to this payment order <=100 chars */
    protected $concept;

    /** @var DateTime Payment Order's creation Date. Format yyyy-MM-dd HH:mm:ss */
    protected $creation_date;

    /** @var DateTime Payment Order's expiration Date */
    protected $expiration_date;

    /** @var string The type of currency associated to the payment order (EUR, MXN, PLN, ARS) */
    protected $currency;

    /** @var string The merchant reference to this payment order <=150 chars */
    protected $reference;

    /** @var string Short Code >=6 chars / <=6 chars */
    protected $short_code;

    /**
     * @var string Status must be one of Constants::ALLOWED_ORDER_STATUSES
     **/
    protected $status;

    /**
     * @var bool If true, dates will be parsed as ISO8601
     */
    protected $usesISO8601 = true;

    /**
     * Gets the Payment Order ID
     *
     * @return string|null
     */
    public function getPaymentOrderId()
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
    public function setPaymentOrderId($payment_order_id)
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
    public function getAmount()
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
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Gets the Payment Order's concept
     *
     * @return string|null
     */
    public function getConcept()
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
    public function setConcept($concept)
    {
        $this->concept = $concept;

        return $this;
    }

    /**
     * Gets the Payment Order's creation date
     *
     * @return \DateTime|null
     */
    public function getCreationDate()
    {
        return $this->creation_date;
    }

    /**
     * Sets the Payment Order's creation date
     *
     * @param \DateTime|null $creation_date
     *
     * @return PaymentOrder
     */
    public function setCreationDate($creation_date)
    {
        $this->creation_date = $creation_date;

        return $this;
    }

    /**
     * Gets the Payment Order's expiration date
     *
     * @return \DateTime|null
     */
    public function getExpirationDate()
    {
        return $this->expiration_date;
    }

    /**
     * Sets the Payment Order's expiration date
     *
     * @param \DateTime|null $expiration_date
     *
     * @return PaymentOrder
     */
    public function setExpirationDate($expiration_date)
    {
        $this->expiration_date = $expiration_date;

        return $this;
    }

    /**
     * Gets the Payment Order's currency
     *
     * @return string|null
     */
    public function getCurrency()
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
    public function setCurrency($currency)
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
    public function getReference()
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
    public function setReference($reference)
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
    public function getShortCode()
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
    public function setShortCode($short_code)
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
    public function getStatus()
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
    public function setStatus($status)
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
