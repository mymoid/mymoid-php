<?php
/**
 * Class PaymentOrderPayWithTokenRequest
 *
 * @author    MYMOID <support@mymoid.com>
 * @copyright 2024 MYMOID
 * @license   ISC https://opensource.org/license/isc-license-txt
 * @see       https://developers.mymoid.com/api-reference#/schemas/PaymentPoint
 */

namespace Mymoid\Api\v1\Schemas\Requests;

use Mymoid\Traits\MymoidParser;

class PaymentOrderPayWithTokenRequest
{
    use MymoidParser;

    /** @var string Payment method id (Token for pay reuse) */
    protected ?string $payment_method_id = null;

    /**
     * Gets the Payment method id
     *
     * @return ?string
     */
    public function getPaymentMethodId(): ?string
    {
        return $this->payment_method_id;
    }

    /**
     * Sets the Payment method id
     *
     * @param string|null $payment_method_id
     *
     * @return PaymentOrderPayWithTokenRequest
     */
    public function setPaymentMethodId(?string $payment_method_id): PaymentOrderPayWithTokenRequest
    {
        $this->payment_method_id = $payment_method_id;

        return $this;
    }
}
