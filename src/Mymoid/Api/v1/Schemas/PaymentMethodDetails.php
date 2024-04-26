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

use Mymoid\Traits\MymoidParser;

class PaymentMethodDetails
{
    use MymoidParser;

    /** @var string|null Holder of the card used to pay */
    protected $holder_name;

    /** @var string|null First numbers from credit card */
    protected $first_numbers;

    /** @var string|null Last numbers from credit card */
    protected $last_numbers;

    /** @var string|null Brand of card used to pay */
    protected $card_brand;

    /** @var string|null Type of card used to pay */
    protected $card_type;

    /** @var string|null Holder of the card used to pay */
    protected $card_holder;

    /** @var string|null Name of the issuer bank */
    protected $issuer_bank;

    /** @var string|null Name of the issuer country */
    protected $issuer_country;

    /** @var string|null Identifier card fingerprint */
    protected $card_fingerprint;

    /** @var string|null Identifier card fingerprint */
    protected $finger_print;

    /** @var string|null Type level card */
    protected $card_level;

    /** @var string|null Transaction expiration Date */
    protected $expiration_date;

    /** @var Bines Bank BIN details */
    protected $bines;

    /**
     * Get the holder of the card used to pay
     *
     * @return string|null
     */
    public function getHolderName()
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
    public function setHolderName($holder_name)
    {
        $this->holder_name = $holder_name;

        return $this;
    }

    /**
     * Get the identifier card fingerprint
     *
     * @return string|null
     */
    public function getFingerPrint()
    {
        return $this->finger_print;
    }

    /**
     * Set the identifier card fingerprint
     *
     * @param string|null $finger_print
     */
    public function setFingerPrint($finger_print)
    {
        $this->finger_print = $finger_print;

        return $this;
    }

    /**
     * Get the first numbers from credit card
     *
     * @return string|null
     */
    public function getFirstNumbers()
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
    public function setFirstNumbers($first_numbers)
    {
        $this->first_numbers = $first_numbers;

        return $this;
    }

    /**
     * Get the last numbers from credit card
     *
     * @return string|null
     */
    public function getLastNumbers()
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
    public function setLastNumbers($last_numbers)
    {
        $this->last_numbers = $last_numbers;

        return $this;
    }

    /**
     * Get the brand of card used to pay
     *
     * @return string|null
     */
    public function getCardBrand()
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
    public function setCardBrand($card_brand)
    {
        $this->card_brand = $card_brand;

        return $this;
    }

    /**
     * Get the type of card used to pay
     *
     * @return string|null
     */
    public function getCardType()
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
    public function setCardType($card_type)
    {
        $this->card_type = $card_type;

        return $this;
    }

    /**
     * Get the holder of the card used to pay
     *
     * @return string|null
     */
    public function getCardHolder()
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
    public function setCardHolder($card_holder)
    {
        $this->card_holder = $card_holder;

        return $this;
    }

    /**
     * Get the name of the issuer bank
     *
     * @return string|null
     */
    public function getIssuerBank()
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
    public function setIssuerBank($issuer_bank)
    {
        $this->issuer_bank = $issuer_bank;

        return $this;
    }

    /**
     * Get the name of the issuer country
     *
     * @return string|null
     */
    public function getIssuerCountry()
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
    public function setIssuerCountry($issuer_country)
    {
        $this->issuer_country = $issuer_country;

        return $this;
    }

    /**
     * Get the identifier card fingerprint
     *
     * @return string|null
     */
    public function getCardFingerprint()
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
    public function setCardFingerprint($card_fingerprint)
    {
        $this->card_fingerprint = $card_fingerprint;

        return $this;
    }

    /**
     * Get the type level card
     *
     * @return string|null
     */
    public function getCardLevel()
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
    public function setCardLevel($card_level)
    {
        $this->card_level = $card_level;

        return $this;
    }

    /**
     * Get the transaction expiration Date
     *
     * @return string|null
     */
    public function getExpirationDate()
    {
        return $this->expiration_date;
    }

    /**
     * Set the transaction expiration Date
     *
     * @param string|null $expiration_date
     *
     * @return PaymentMethodDetails
     */
    public function setExpirationDate($expiration_date)
    {
        $this->expiration_date = $expiration_date;

        return $this;
    }

    /**
     * Gets the Bank BIN details
     *
     * @return Bines
     */
    public function getBines()
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
    public function setBines($bines)
    {
        $this->bines = $bines;

        return $this;
    }
}
