<?php
/**
 * Class Transaction
 *
 * @author    MYMOID <support@mymoid.com>
 * @copyright 2024 MYMOID
 * @license   ISC https://opensource.org/license/isc-license-txt
 * @see       https://developers.mymoid.com/api-reference#/schemas/Transaction
 */

namespace Mymoid\Api\v1\Schemas;

use DateTime;
use Mymoid\Api\MymoidObject;
use Mymoid\Api\v1\Common\Constants;
use Mymoid\Traits\MymoidParser;

class Transaction extends MymoidObject
{
    use MymoidParser;

    /** @var string Transaction ID >=64 chars & <=64 chars */
    protected ?string $id = null;

    /** @var int Payment Order's amount. This should be an integer value and represents the value in cents */
    protected int $amount = 0;

    /** @var DateTime Payment Order's creation Date. Format yyyy-MM-dd HH:mm:ss */
    protected ?DateTime $creation_date = null;

    /** @var string The type of currency associated to the payment order (EUR, MXN, PLN, ARS) */
    protected ?string $currency = null;

    /** @var string Allowed types must be one of Constants::ALLOWED_TRANSACTION_TYPES */
    protected ?string $type = null;

    /** @var string Transaction identifier in the processor */
    protected ?string $purchase_order = null;

    /** @var PaymentMethod PaymentMethod */
    protected ?PaymentMethod $payment_method = null;

    /** @var PaymentOrder PaymentOrder */
    protected ?PaymentOrder $payment_order = null;

    /**
     * Gets the Transaction ID
     *
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * Sets the Transaction ID
     *
     * @param string|null $id
     *
     * @return Transaction
     * @throws \InvalidArgumentException
     */
    public function setId(?string $id): Transaction
    {
        if (mb_strlen($id) !== 64 && !is_null($id)) {
            throw new \InvalidArgumentException('Transaction ID must be >=64 chars & <=64 chars');
        }

        $this->id = $id;

        return $this;
    }

    /**
     * Gets the Transaction amount
     *
     * @return int
     */
    public function getAmount(): int
    {
        return $this->amount;
    }

    /**
     * Sets the Transaction amount
     *
     * @param int $amount
     *
     * @return Transaction
     * @throws \InvalidArgumentException
     */
    public function setAmount(int $amount): Transaction
    {
        if ($amount < 0 || $amount > Constants::MAX_ORDER_AMOUNT) {
            throw new \InvalidArgumentException('Transaction amount must be >=0 & <=9999999');
        }

        $this->amount = $amount;

        return $this;
    }

    /**
     * Gets the Transaction creation date
     *
     * @return DateTime|null
     */
    public function getCreationDate(): ?DateTime
    {
        return $this->creation_date;
    }

    /**
     * Sets the Transaction creation date
     *
     * @param DateTime|null $creation_date
     *
     * @return Transaction
     */
    public function setCreationDate(?DateTime $creation_date): Transaction
    {
        $this->creation_date = $creation_date;

        return $this;
    }

    /**
     * Gets the Transaction currency
     *
     * @return string|null
     */
    public function getCurrency(): ?string
    {
        return $this->currency;
    }

    /**
     * Sets the Transaction currency
     *
     * @param string|null $currency
     *
     * @return Transaction
     * @throws \InvalidArgumentException
     */
    public function setCurrency(?string $currency): Transaction
    {
        if (!in_array($currency, Constants::ALLOWED_CURRENCIES) && !is_null($currency)) {
            $exception = 'Transaction currency must be one of ' . implode(', ', Constants::ALLOWED_CURRENCIES)
                . '. Given: ' . $currency;
            throw new \InvalidArgumentException($exception);
        }

        $this->currency = $currency;

        return $this;
    }

    /**
     * Gets the Transaction type
     *
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * Sets the Transaction type
     *
     * @param string|null $type
     *
     * @return Transaction
     * @throws \InvalidArgumentException
     */
    public function setType(?string $type): Transaction
    {
        if (!in_array($type, Constants::ALLOWED_TRANSACTION_TYPES) && !is_null($type)) {
            $exception = 'Transaction type must be one of ' . implode(', ', Constants::ALLOWED_TRANSACTION_TYPES)
                . '. Given: ' . $type;
            throw new \InvalidArgumentException($exception);
        }

        $this->type = $type;

        return $this;
    }

    /**
     * Gets the Transaction purchase order
     *
     * @return string|null
     */
    public function getPurchaseOrder(): ?string
    {
        return $this->purchase_order;
    }

    /**
     * Sets the Transaction purchase order
     *
     * @param string|null $purchase_order
     *
     * @return Transaction
     */
    public function setPurchaseOrder(?string $purchase_order): Transaction
    {
        $this->purchase_order = $purchase_order;

        return $this;
    }

    /**
     * Gets the Transaction payment method
     *
     * @return PaymentMethod
     */
    public function getPaymentMethod(): PaymentMethod
    {
        return $this->payment_method;
    }

    /**
     * Sets the Transaction payment method
     *
     * @param PaymentMethod $payment_method
     *
     * @return Transaction
     */
    public function setPaymentMethod(PaymentMethod $payment_method): Transaction
    {
        $this->payment_method = $payment_method;

        return $this;
    }

    /**
     * Gets the Transaction payment order
     *
     * @return PaymentOrder
     */
    public function getPaymentOrder(): PaymentOrder
    {
        return $this->payment_order;
    }

    /**
     * Sets the Transaction payment order
     *
     * @param PaymentOrder $payment_order
     *
     * @return Transaction
     */
    public function setPaymentOrder(PaymentOrder $payment_order): Transaction
    {
        $this->payment_order = $payment_order;

        return $this;
    }
}
