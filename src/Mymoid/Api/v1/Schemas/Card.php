<?php
/**
 * Class Card
 *
 * @author    MYMOID <support@mymoid.com>
 * @copyright 2024 MYMOID
 * @license   ISC https://opensource.org/license/isc-license-txt
 * @see       https://developers.mymoid.com/api-reference#/schemas/Card
 */

namespace Mymoid\Api\v1\Schemas;

use Mymoid\Api\v1\Common\Constants;
use Mymoid\Api\v1\Schemas\Objects\PaymentMethodDetail;
use Mymoid\Traits\MymoidParser;

class Card
{
    use MymoidParser;

    /** @var string Must be one of Constants::ALLOWED_CARD_VALUES */
    protected string $type;

    /** @var PaymentMethodDetail PaymentMethodDetail */
    protected PaymentMethodDetail $payment_method_detail;

    /**
     * Gets the Card type
     *
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * Sets the Card type
     *
     * @param string|null $type
     *
     * @return Card
     * @throws \InvalidArgumentException
     */
    public function setType(?string $type): Card
    {
        if (!in_array($type, Constants::ALLOWED_CARD_VALUES) && !is_null($type)) {
            $exception = 'Invalid Card type. Must be one of: ' . implode(', ', Constants::ALLOWED_CARD_VALUES)
                . '. Given: ' . $type;
            throw new \InvalidArgumentException($exception);
        }

        $this->type = $type;

        return $this;
    }

    /**
     * Gets the PaymentMethodDetail
     *
     * @return PaymentMethodDetail
     */
    public function getPaymentMethodDetail(): PaymentMethodDetail
    {
        return $this->payment_method_detail;
    }

    /**
     * Sets the PaymentMethodDetail
     *
     * @param PaymentMethodDetail $payment_method_detail
     *
     * @return Card
     */
    public function setPaymentMethodDetail(PaymentMethodDetail $payment_method_detail): Card
    {
        $this->payment_method_detail = $payment_method_detail;

        return $this;
    }
}
