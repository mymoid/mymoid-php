<?php
/**
 * Class PaymentPoint
 *
 * @author    MYMOID <support@mymoid.com>
 * @copyright 2024 MYMOID
 * @license   ISC https://opensource.org/license/isc-license-txt
 * @see       https://developers.mymoid.com/api-reference#/schemas/PaymentPoint
 */

namespace Mymoid\Api\v1\Schemas;

use Mymoid\Traits\MymoidParser;

class PaymentPoint
{
    use MymoidParser;

    /** @var string Payment Point Identifier */
    protected ?string $id = null;

    /**
     * Gets the Payment Point Identifier
     *
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * Sets the Payment Point Identifier
     *
     * @param string|null $id
     *
     * @return PaymentPoint
     */
    public function setId(?string $id): PaymentPoint
    {
        $this->id = $id;

        return $this;
    }
}
