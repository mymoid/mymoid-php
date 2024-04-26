<?php
/**
 * Class PaymentOrderRequest
 *
 * @author    MYMOID <support@mymoid.com>
 * @copyright 2024 MYMOID
 * @license   ISC https://opensource.org/license/isc-license-txt
 * @see       https://developers.mymoid.com/api-reference#/schemas/PaymentOrderRequest
 */

namespace Mymoid\Api\v1\Schemas\Requests;

use Mymoid\Api\v1\Common\Constants;
use Mymoid\Traits\MymoidParser;

class PaymentOrderRequest
{
    use MymoidParser;

    /** @var string|null Payment Order’s reference */
    protected $reference;

    /** @var string|null Payment Order’s concept */
    protected $concept;

    /** @var int Payment Order’s amount in cents */
    protected $amount = 0;

    /** @var string|null Currency type */
    protected $currency;

    /** @var DateTime|null Payment Order’s expiration Date */
    protected $expiration_date;

    /**
     * Gets the Payment Order reference
     *
     * @return string|null
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * Sets the Payment Order reference
     *
     * @param string|null $reference
     *
     * @return PaymentOrder
     * @throws InvalidArgumentException
     */
    public function setReference($reference)
    {
        if (mb_strlen($reference) > 150) {
            throw new \InvalidArgumentException('Reference must be 150 characters or less.');
        }

        $this->reference = $reference;

        return $this;
    }

    /**
     * Gets the Payment Order concept
     *
     * @return string|null
     */
    public function getConcept()
    {
        return $this->concept;
    }

    /**
     * Sets the Payment Order concept
     *
     * @param string $concept
     *
     * @return PaymentOrder
     * @throws InvalidArgumentException
     */
    public function setConcept($concept)
    {
        if (mb_strlen($concept) > 100) {
            throw new \InvalidArgumentException('Concept must be 100 characters or less.');
        }

        $this->concept = $concept;

        return $this;
    }

    /**
     * Gets the Payment Order amount
     *
     * @return int
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Sets the Payment Order amount
     *
     * @param int $amount
     *
     * @return PaymentOrder
     * @throws InvalidArgumentException
     */
    public function setAmount($amount)
    {
        if ($amount > Constants::MAX_ORDER_AMOUNT) {
            throw new \InvalidArgumentException('Amount must be ' . Constants::MAX_ORDER_AMOUNT . ' or less.');
        }

        $this->amount = $amount;

        return $this;
    }

    /**
     * Gets the Payment Order currency
     *
     * @return string|null
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * Sets the Payment Order currency, must be one of Constants::ALLOWED_CURRENCIES
     *
     * @param string|null $currency
     *
     * @return PaymentOrder
     * @throws InvalidArgumentException
     */
    public function setCurrency($currency)
    {
        if (!in_array($currency, Constants::ALLOWED_CURRENCIES) && !empty($currency)) {
            $exception = 'Currency must be one of ' . implode(', ', Constants::ALLOWED_CURRENCIES)
                . '. Given: ' . $currency;
            throw new \InvalidArgumentException($exception);
        }

        $this->currency = $currency;

        return $this;
    }

    /**
     * Gets the Payment Order expiration date
     *
     * @return \DateTime|null
     */
    public function getExpirationDate()
    {
        return $this->expiration_date;
    }

    /**
     * Sets the Payment Order expiration date
     *
     * @param \DateTime $expiration_date
     *
     * @return PaymentOrderRequest
     * @throws InvalidArgumentException
     */
    public function setExpirationDate($expiration_date)
    {
        $this->expiration_date = $expiration_date;

        return $this;
    }
}
