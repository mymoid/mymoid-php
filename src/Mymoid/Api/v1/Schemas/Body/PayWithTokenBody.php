<?php
/**
 * Class PayWithTokenBody
 *
 * @author    MYMOID <support@mymoid.com>
 * @copyright 2024 MYMOID
 * @license   ISC https://opensource.org/license/isc-license-txt
 */

namespace Mymoid\Api\v1\Schemas\Body;

use Mymoid\Api\MymoidObject;
use Mymoid\Traits\MymoidParser;

class PayWithTokenBody extends MymoidObject
{
    use MymoidParser;

    /** @var string|null */
    protected $payment_method_id;

    /**
     * Gets the Payment method Identifier
     *
     * @return string|null
     */
    public function getPaymentMethodId()
    {
        return $this->payment_method_id;
    }

    /**
     * Sets the Payment method Identifier
     *
     * @param string|null $payment_method_id
     *
     * @return PayWithTokenBody
     */
    public function setPaymentMethodId($payment_method_id)
    {
        $this->payment_method_id = $payment_method_id;

        return $this;
    }
}
