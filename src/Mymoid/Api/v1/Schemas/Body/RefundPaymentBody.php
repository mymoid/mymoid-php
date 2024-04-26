<?php
/**
 * Class RefundPaymentBody
 *
 * @author    MYMOID <support@mymoid.com>
 * @copyright 2024 MYMOID
 * @license   ISC https://opensource.org/license/isc-license-txt
 */

namespace Mymoid\Api\v1\Schemas\Body;

use Mymoid\Api\MymoidObject;
use Mymoid\Traits\MymoidParser;

class RefundPaymentBody extends MymoidObject
{
    use MymoidParser;

    /** @var int */
    protected int $amount = 0;

    /**
     * Gets the amount for the refund
     *
     * @return int
     */
    public function getAmount(): int
    {
        return $this->amount;
    }

    /**
     * Sets the amount for the refund
     *
     * @param int $amount
     *
     * @return RefundPaymentBody
     */
    public function setAmount(int $amount): RefundPaymentBody
    {
        $this->amount = $amount;

        return $this;
    }
}
