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
    protected $authorization_code;

    /** @var string Transaction identifier in the processor */
    protected $conciliation_code;

    /** @var string Transaction error category from the processor */
    protected $error_category;

    /** @var string Transaction error code from the processor */
    protected $error_code;

    /** @var PaymentPoint PaymentPoint */
    protected $payment_point;

    /**
     * Gets the Transaction authorization code
     *
     * @return string|null
     */
    public function getAuthorizationCode()
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
    public function setAuthorizationCode($authorization_code)
    {
        $this->authorization_code = $authorization_code;

        return $this;
    }

    /**
     * Gets the Transaction conciliation code
     *
     * @return string|null
     */
    public function getConciliationCode()
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
    public function setConciliationCode($conciliation_code)
    {
        $this->conciliation_code = $conciliation_code;

        return $this;
    }

    /**
     * Gets the Transaction error category
     *
     * @return string|null
     */
    public function getErrorCategory()
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
    public function setErrorCategory($error_category)
    {
        $this->error_category = $error_category;

        return $this;
    }

    /**
     * Gets the Transaction error code
     *
     * @return string|null
     */
    public function getErrorCode()
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
    public function setErrorCode($error_code)
    {
        $this->error_code = $error_code;

        return $this;
    }

    /**
     * Gets the Transaction payment point
     *
     * @return PaymentPoint
     */
    public function getPaymentPoint()
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
    public function setPaymentPoint($payment_point)
    {
        $this->payment_point = $payment_point;

        return $this;
    }
}
