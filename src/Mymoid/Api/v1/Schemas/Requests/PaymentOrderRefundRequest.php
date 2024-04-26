<?php
/**
 * Class PaymentOrderRefundRequest
 *
 * @author    MYMOID <support@mymoid.com>
 * @copyright 2024 MYMOID
 * @license   ISC https://opensource.org/license/isc-license-txt
 * @see       https://developers.mymoid.com/api-reference#/schemas/PaymentOrderRequest
 */

namespace Mymoid\Api\v1\Schemas\Requests;

use Mymoid\Traits\MymoidParser;

class PaymentOrderRefundRequest
{
    use MymoidParser;

    /** @var int Refund amount. This should be an integer value and represents the value in cents */
    protected int $amount = 0;

    /**
     * Gets the Refund amount
     *
     * @return int
     */
    public function getAmount(): int
    {
        return $this->amount;
    }

    /**
     * Sets the Refund amount
     *
     * @param int $amount
     *
     * @return PaymentOrderRefundRequest
     * @throws InvalidArgumentException
     */
    public function setAmount(int $amount): PaymentOrderRefundRequest
    {
        if ($amount < 0) {
            throw new \InvalidArgumentException('Amount must be greater than 0.');
        }

        $this->amount = $amount;

        return $this;
    }
}
