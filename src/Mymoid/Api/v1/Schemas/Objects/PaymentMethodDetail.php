<?php
/**
 * Class PaymentMethodDetails
 *
 * @author    MYMOID <support@mymoid.com>
 * @copyright 2024 MYMOID
 * @license   ISC https://opensource.org/license/isc-license-txt
 */

namespace Mymoid\Api\v1\Schemas\Objects;

use Mymoid\Api\v1\Common\Constants;
use Mymoid\Traits\MymoidParser;

class PaymentMethodDetail
{
    use MymoidParser;

    /** @var string Must be one of Constants::ALLOWED_CARD_TYPES */
    protected ?string $card_type = null;

    /** @var string Must be one of Constants::ALLOWED_CARD_BRANDS */
    protected ?string $card_brand = null;

    /** @var string */
    protected ?string $first_number = null;

    /** @var string */
    protected ?string $last_number = null;

    /**
     * Gets the Card Type
     *
     * @return ?string
     */
    public function getCardType(): ?string
    {
        return $this->card_type;
    }

    /**
     * Sets the Card Type
     *
     * @param string|null $card_type
     *
     * @return PaymentMethodDetail
     * @throws \InvalidArgumentException
     */
    public function setCardType(?string $card_type): PaymentMethodDetail
    {
        if (!in_array($card_type, Constants::ALLOWED_CARD_TYPES) && !is_null($card_type)) {
            $exception = 'Invalid card type. Must be one of ' . implode(', ', Constants::ALLOWED_CARD_TYPES)
                . '. Given: ' . $card_type;
            throw new \InvalidArgumentException($exception);
        }

        $this->card_type = $card_type;

        return $this;
    }

    /**
     * Gets the Card Brand
     *
     * @return ?string
     */
    public function getCardBrand(): ?string
    {
        return $this->card_brand;
    }

    /**
     * Sets the Card Brand
     *
     * @param string|null $card_brand
     *
     * @return PaymentMethodDetail
     * @throws \InvalidArgumentException
     */
    public function setCardBrand(?string $card_brand): PaymentMethodDetail
    {
        if (!in_array($card_brand, Constants::ALLOWED_CARD_BRANDS) && !is_null($card_brand)) {
            $exception = 'Invalid card brand. Must be one of ' . implode(', ', Constants::ALLOWED_CARD_BRANDS)
                . '. Given: ' . $card_brand;
            throw new \InvalidArgumentException($exception);
        }

        $this->card_brand = $card_brand;

        return $this;
    }

    /**
     * Gets the Card First Number
     *
     * @return ?string
     */
    public function getFirstNumber(): ?string
    {
        return $this->first_number;
    }

    /**
     * Sets the Card First Number
     *
     * @param string|null $first_number
     *
     * @return PaymentMethodDetail
     */
    public function setFirstNumber(?string $first_number): PaymentMethodDetail
    {
        $this->first_number = $first_number;

        return $this;
    }

    /**
     * Gets the Card Last Number
     *
     * @return ?string
     */
    public function getLastNumber(): ?string
    {
        return $this->last_number;
    }

    /**
     * Sets the Card Last Number
     *
     * @param string|null $last_number
     *
     * @return PaymentMethodDetail
     */
    public function setLastNumber(?string $last_number): PaymentMethodDetail
    {
        $this->last_number = $last_number;

        return $this;
    }
}
