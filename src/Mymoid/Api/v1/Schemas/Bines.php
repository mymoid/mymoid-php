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

    /** @var string|null Card brand */
    protected $card_brand;

    /** @var string|null Issuer Bank name */
    protected $issuer_bank;

    /** @var string|null Card issuer country */
    protected $issuer_country;

    /**
     * Get the card brand
     *
     * @return string|null
     */
    public function getCardBrand()
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
    public function setCardBrand($card_brand)
    {
        $this->card_brand = $card_brand;

        return $this;
    }

    /**
     * Get the issuer bank
     *
     * @return string|null
     */
    public function getIssuerBank()
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
    public function setIssuerBank($issuer_bank)
    {
        $this->issuer_bank = $issuer_bank;

        return $this;
    }

    /**
     * Get the issuer country
     *
     * @return string|null
     */
    public function getIssuerCountry()
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
    public function setIssuerCountry($issuer_country)
    {
        $this->issuer_country = $issuer_country;

        return $this;
    }
}
