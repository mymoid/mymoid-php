<?php
/**
 * Class PaymentMethodDetails
 *
 * @author    MYMOID <support@mymoid.com>
 * @copyright 2024 MYMOID
 * @license   ISC https://opensource.org/license/isc-license-txt
 * @see       https://developers.mymoid.com/api-reference#/schemas/PaymentMethodDetails
 */

namespace Mymoid\Api\v1\Schemas;

use Mymoid\Api\v1\Schemas\Bines;
use Mymoid\Traits\MymoidParser;

class PaymentMethodDetails
{
    use MymoidParser;

    /** @var string Holder of the card used to pay */
    protected ?string $holder_name = null;

    /** @var string First numbers from credit card */
    protected ?string $first_numbers = null;

    /** @var string Last numbers from credit card */
    protected ?string $last_numbers = null;

    /** @var string Brand of card used to pay */
    protected ?string $card_brand = null;

    /** @var string Type of card used to pay */
    protected ?string $card_type = null;

    /** @var string Holder of the card used to pay */
    protected ?string $card_holder = null;

    /** @var string $issuer_bank Name of the issuer bank */
    protected ?string $issuer_bank = null;

    /** @var string Name of the issuer country */
    protected ?string $issuer_country = null;

    /** @var string Identifier card fingerprint */
    protected ?string $card_fingerprint = null;

    /** @var string Identifier card fingerprint */
    protected ?string $finger_print = null;

    /** @var string Type level card */
    protected ?string $card_level = null;

    /** @var string Transaction expiration Date */
    protected ?string $expiration_date = null;

    /** @var Bines Bank BIN details */
    protected Bines $bines;

    /**
     * Get the holder of the card used to pay
     *
     * @return string|null
     */
    public function getHolderName(): ?string
    {
        return $this->holder_name;
    }

    /**
     * Set the holder of the card used to pay
     *
     * @param string|null $holder_name
     *
     * @return PaymentMethodDetails
     */
    public function setHolderName(?string $holder_name): PaymentMethodDetails
    {
        $this->holder_name = $holder_name;

        return $this;
    }

    /**
     * Get the identifier card fingerprint
     *
     * @return string|null
     */
    public function getFingerPrint(): ?string
    {
        return $this->finger_print;
    }

    /**
     * Set the identifier card fingerprint
     *
     * @param string|null $finger_print
     */
    public function setFingerPrint(?string $finger_print): PaymentMethodDetails
    {
        $this->finger_print = $finger_print;

        return $this;
    }

    /**
     * Get the first numbers from credit card
     *
     * @return string|null
     */
    public function getFirstNumbers(): ?string
    {
        return $this->first_numbers;
    }

    /**
     * Set the first numbers from credit card
     *
     * @param string|null $first_numbers
     *
     * @return PaymentMethodDetails
     */
    public function setFirstNumbers(?string $first_numbers): PaymentMethodDetails
    {
        $this->first_numbers = $first_numbers;

        return $this;
    }

    /**
     * Get the last numbers from credit card
     *
     * @return string|null
     */
    public function getLastNumbers(): ?string
    {
        return $this->last_numbers;
    }

    /**
     * Set the last numbers from credit card
     *
     * @param string|null $last_numbers
     *
     * @return PaymentMethodDetails
     */
    public function setLastNumbers(?string $last_numbers): PaymentMethodDetails
    {
        $this->last_numbers = $last_numbers;

        return $this;
    }

    /**
     * Get the brand of card used to pay
     *
     * @return string|null
     */
    public function getCardBrand(): ?string
    {
        return $this->card_brand;
    }

    /**
     * Set the brand of card used to pay
     *
     * @param string|null $card_brand
     *
     * @return PaymentMethodDetails
     */
    public function setCardBrand(?string $card_brand): PaymentMethodDetails
    {
        $this->card_brand = $card_brand;

        return $this;
    }

    /**
     * Get the type of card used to pay
     *
     * @return string|null
     */
    public function getCardType(): ?string
    {
        return $this->card_type;
    }

    /**
     * Set the type of card used to pay
     *
     * @param string|null $card_type
     *
     * @return PaymentMethodDetails
     */
    public function setCardType(?string $card_type): PaymentMethodDetails
    {
        $this->card_type = $card_type;

        return $this;
    }

    /**
     * Get the holder of the card used to pay
     *
     * @return string|null
     */
    public function getCardHolder(): ?string
    {
        return $this->card_holder;
    }

    /**
     * Set the holder of the card used to pay
     *
     * @param string|null $card_holder
     *
     * @return PaymentMethodDetails
     */
    public function setCardHolder(?string $card_holder): PaymentMethodDetails
    {
        $this->card_holder = $card_holder;

        return $this;
    }

    /**
     * Get the name of the issuer bank
     *
     * @return string|null
     */
    public function getIssuerBank(): ?string
    {
        return $this->issuer_bank;
    }

    /**
     * Set the name of the issuer bank
     *
     * @param string|null $issuer_bank
     *
     * @return PaymentMethodDetails
     */
    public function setIssuerBank(?string $issuer_bank): PaymentMethodDetails
    {
        $this->issuer_bank = $issuer_bank;

        return $this;
    }

    /**
     * Get the name of the issuer country
     *
     * @return string|null
     */
    public function getIssuerCountry(): ?string
    {
        return $this->issuer_country;
    }

    /**
     * Set the name of the issuer country
     *
     * @param string|null $issuer_country
     *
     * @return PaymentMethodDetails
     */
    public function setIssuerCountry(?string $issuer_country): PaymentMethodDetails
    {
        $this->issuer_country = $issuer_country;

        return $this;
    }

    /**
     * Get the identifier card fingerprint
     *
     * @return string|null
     */
    public function getCardFingerprint(): ?string
    {
        return $this->card_fingerprint;
    }

    /**
     * Set the identifier card fingerprint
     *
     * @param string|null $card_fingerprint
     *
     * @return PaymentMethodDetails
     */
    public function setCardFingerprint(?string $card_fingerprint): PaymentMethodDetails
    {
        $this->card_fingerprint = $card_fingerprint;

        return $this;
    }

    /**
     * Get the type level card
     *
     * @return string
     */
    public function getCardLevel(): string
    {
        return $this->card_level;
    }

    /**
     * Set the type level card
     *
     * @param string|null $card_level
     *
     * @return PaymentMethodDetails
     */
    public function setCardLevel(?string $card_level): PaymentMethodDetails
    {
        $this->card_level = $card_level;

        return $this;
    }

    /**
     * Get the transaction expiration Date
     *
     * @return string
     */
    public function getExpirationDate(): string
    {
        return $this->expiration_date;
    }

    /**
     * Set the transaction expiration Date
     *
     * @param ?string $expiration_date
     *
     * @return PaymentMethodDetails
     */
    public function setExpirationDate(?string $expiration_date): PaymentMethodDetails
    {
        $this->expiration_date = $expiration_date;

        return $this;
    }

    /**
     * Gets the Bank BIN details
     *
     * @return Bines
     */
    public function getBines(): Bines
    {
        return $this->bines;
    }

    /**
     * Sets the Bank BIN details
     *
     * @param Bines $bines
     *
     * @return PaymentMethodDetails
     */
    public function setBines(Bines $bines): PaymentMethodDetails
    {
        $this->bines = $bines;

        return $this;
    }
}
