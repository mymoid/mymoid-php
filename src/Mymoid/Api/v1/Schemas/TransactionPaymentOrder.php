<?php
/**
 * Class TransactionPaymentOrder
 *
 * @author    MYMOID <support@mymoid.com>
 * @copyright 2024 MYMOID
 * @license   ISC https://opensource.org/license/isc-license-txt
 * @see       https://developers.mymoid.com/api-reference#/schemas/TransactionPaymentOrder
 */

namespace Mymoid\Api\v1\Schemas;

use Mymoid\Traits\MymoidParser;

class TransactionPaymentOrder
{
    use MymoidParser;

    /** @var string Payment order Identifier, must be >=64 && <=64 */
    protected ?string $id = null;

    /** @var string Short code >=6 && <=6 */
    protected ?string $short_code = null;

    /**
     * Gets the Payment order Identifier
     *
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * Sets the Payment order Identifier
     *
     * @param string|null $id
     *
     * @return TransactionPaymentOrder
     * @throws \InvalidArgumentException
     */
    public function setId(?string $id): TransactionPaymentOrder
    {
        if (mb_strlen($id) !== 64 && !is_null($id)) {
            throw new \InvalidArgumentException('Payment order ID must be >=64 && <=64 chars');
        }

        $this->id = $id;

        return $this;
    }

    /**
     * Gets the Payment order short code
     *
     * @return string|null
     */
    public function getShortCode(): ?string
    {
        return $this->short_code;
    }

    /**
     * Sets the Payment order short code
     *
     * @param string|null $short_code
     *
     * @return TransactionPaymentOrder
     * @throws \InvalidArgumentException
     */
    public function setShortCode(?string $short_code): TransactionPaymentOrder
    {
        if (mb_strlen($short_code) !== 6 && !is_null($short_code)) {
            throw new \InvalidArgumentException('Payment order short code must be >=6 && <=6 chars');
        }

        $this->short_code = $short_code;

        return $this;
    }
}
