<?php
/**
 * Class TransactionDetail
 *
 * @author    MYMOID <support@mymoid.com>
 * @copyright 2024 MYMOID
 * @license   ISC https://opensource.org/license/isc-license-txt
 * @see       https://developers.mymoid.com/api-reference#/schemas/TransactionDetail
 */

namespace Mymoid\Api\v1\Schemas;

class TransactionDetail extends Transaction
{
    /** @var string Transaction identifier in the processor */
    protected ?string $authorization_code = null;

    /** @var string Transaction identifier in the processor */
    protected ?string $conciliation_code = null;

    /** @var string Transaction error category from the processor */
    protected ?string $error_category = null;

    /** @var string Transaction error code from the processor */
    protected ?string $error_code = null;

    /** @var PaymentPoint PaymentPoint */
    protected PaymentPoint $payment_point;

    /**
     * Gets the Transaction authorization code
     *
     * @return string|null
     */
    public function getAuthorizationCode(): ?string
    {
        return $this->authorization_code;
    }

    /**
     * Sets the Transaction authorization code
     *
     * @param string|null $authorization_code
     *
     * @return TransactionDetail
     */
    public function setAuthorizationCode(?string $authorization_code): TransactionDetail
    {
        $this->authorization_code = $authorization_code;

        return $this;
    }

    /**
     * Gets the Transaction conciliation code
     *
     * @return string|null
     */
    public function getConciliationCode(): ?string
    {
        return $this->conciliation_code;
    }

    /**
     * Sets the Transaction conciliation code
     *
     * @param string|null $conciliation_code
     *
     * @return TransactionDetail
     */
    public function setConciliationCode(?string $conciliation_code): TransactionDetail
    {
        $this->conciliation_code = $conciliation_code;

        return $this;
    }

    /**
     * Gets the Transaction error category
     *
     * @return string|null
     */
    public function getErrorCategory(): ?string
    {
        return $this->error_category;
    }

    /**
     * Sets the Transaction error category
     *
     * @param string|null $error_category
     *
     * @return TransactionDetail
     */
    public function setErrorCategory(?string $error_category): TransactionDetail
    {
        $this->error_category = $error_category;

        return $this;
    }

    /**
     * Gets the Transaction error code
     *
     * @return string|null
     */
    public function getErrorCode(): ?string
    {
        return $this->error_code;
    }

    /**
     * Sets the Transaction error code
     *
     * @param string|null $error_code
     *
     * @return TransactionDetail
     */
    public function setErrorCode(?string $error_code): TransactionDetail
    {
        $this->error_code = $error_code;

        return $this;
    }

    /**
     * Gets the Transaction payment point
     *
     * @return PaymentPoint
     */
    public function getPaymentPoint(): PaymentPoint
    {
        return $this->payment_point;
    }

    /**
     * Sets the Transaction payment point
     *
     * @param PaymentPoint $payment_point
     *
     * @return TransactionDetail
     */
    public function setPaymentPoint(PaymentPoint $payment_point): TransactionDetail
    {
        $this->payment_point = $payment_point;

        return $this;
    }
}
