<?php
/**
 * Class PaymentOrderDetail
 *
 * @author    MYMOID <support@mymoid.com>
 * @copyright 2024 MYMOID
 * @license   ISC https://opensource.org/license/isc-license-txt
 * @see       https://developers.mymoid.com/api-reference#/schemas/PaymentOrderDetail
 */

namespace Mymoid\Api\v1\Schemas;

use Mymoid\Api\v1\Schemas\Response\PaymentOrderCreateResponse;
use Mymoid\Traits\MymoidParser;

class PaymentOrderDetail extends PaymentOrderCreateResponse
{
    use MymoidParser;

    /** @var PaymentPoint Payment Point identifier */
    protected PaymentPoint $payment_point;

    /**
     * Gets the Payment Point identifier
     *
     * @return PaymentPoint
     */
    public function getPaymentPoint(): PaymentPoint
    {
        return $this->payment_point;
    }

    /**
     * Sets the Payment Point identifier
     *
     * @param PaymentPoint $payment_point
     *
     * @return PaymentOrderDetail
     */
    public function setPaymentPoint(PaymentPoint $payment_point): PaymentOrderDetail
    {
        $this->payment_point = $payment_point;

        return $this;
    }
}
