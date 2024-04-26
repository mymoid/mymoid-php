<?php
/**
 * Class Bines
 *
 * @author    MYMOID <support@mymoid.com>
 * @copyright 2024 MYMOID
 * @license   ISC https://opensource.org/license/isc-license-txt
 */

namespace Mymoid\Api\v1\Schemas;

use Mymoid\Api\MymoidObject;
use Mymoid\Traits\MymoidParser;

class Bines extends MymoidObject
{
    use MymoidParser;

    /** @var ?string Card brand */
    protected ?string $card_brand = null;

    /** @var ?string Issuer Bank name */
    protected ?string $issuer_bank = null;

    /** @var ?string Card issuer country */
    protected ?string $issuer_country = null;

    /**
     * Get the card brand
     *
     * @return string|null
     */
    public function getCardBrand(): ?string
    {
        return $this->card_brand;
    }

    /**
     * Set the card brand
     *
     * @param string|null $card_brand
     *
     * @return Bines
     */
    public function setCardBrand(?string $card_brand): Bines
    {
        $this->card_brand = $card_brand;

        return $this;
    }

    /**
     * Get the issuer bank
     *
     * @return string|null
     */
    public function getIssuerBank(): ?string
    {
        return $this->issuer_bank;
    }

    /**
     * Set the issuer bank
     *
     * @param string|null $issuer_bank
     *
     * @return Bines
     */
    public function setIssuerBank(?string $issuer_bank): Bines
    {
        $this->issuer_bank = $issuer_bank;

        return $this;
    }

    /**
     * Get the issuer country
     *
     * @return string|null
     */
    public function getIssuerCountry(): ?string
    {
        return $this->issuer_country;
    }

    /**
     * Set the issuer country
     *
     * @param string|null $issuer_country
     *
     * @return Bines
     */
    public function setIssuerCountry(?string $issuer_country): Bines
    {
        $this->issuer_country = $issuer_country;

        return $this;
    }
}
