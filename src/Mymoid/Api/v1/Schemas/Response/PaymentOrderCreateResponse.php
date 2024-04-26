<?php
/**
 * Class PaymentOrderCreateResponse
 *
 * @author    MYMOID <support@mymoid.com>
 * @copyright 2024 MYMOID
 * @license   ISC https://opensource.org/license/isc-license-txt
 * @see       https://developers.mymoid.com/api-reference#/schemas/PaymentOrderCreateResponse
 */

namespace Mymoid\Api\v1\Schemas\Response;

use DateTime;
use Mymoid\Api\v1\Schemas\PaymentOrder;
use Mymoid\Traits\MymoidParser;

class PaymentOrderCreateResponse extends PaymentOrder
{
    use MymoidParser;

    /** @var DateTime Payment Order's expiration Date. Format yyyy-MM-dd HH:mm:ss */
    protected ?DateTime $expiration_date = null;

    /**
     * Gets the Payment Order expiration date
     *
     * @return DateTime|null
     */
    public function getExpirationDate(): ?DateTime
    {
        return $this->expiration_date;
    }

    /**
     * Sets the Payment Order expiration date
     *
     * @param DateTime|null $expiration_date
     *
     * @return PaymentOrderCreateResponse
     * @throws InvalidArgumentException
     */
    public function setExpirationDate(?DateTime $expiration_date): PaymentOrderCreateResponse
    {
        if (is_null($expiration_date)) {
            $this->expiration_date = null;

            return $this;
        }

        $this->expiration_date = $expiration_date;

        return $this;
    }
}
