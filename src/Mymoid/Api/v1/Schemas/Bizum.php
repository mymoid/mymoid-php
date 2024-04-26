<?php
/**
 * Class Bizum
 *
 * @author    MYMOID <support@mymoid.com>
 * @copyright 2024 MYMOID
 * @license   ISC https://opensource.org/license/isc-license-txt
 * @see       https://developers.mymoid.com/api-reference#/schemas/Bizum
 */

namespace Mymoid\Api\v1\Schemas;

use Mymoid\Api\v1\Common\Constants;
use Mymoid\Traits\MymoidParser;

class Bizum
{
    use MymoidParser;

    /** @var string Must be one of Constants::ALLOWED_BIZUM_VALUES */
    protected ?string $type;

    /**
     * Gets the Bizum type
     *
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * Sets the Bizum type
     *
     * @param string|null $type
     *
     * @return Bizum
     * @throws \InvalidArgumentException
     */
    public function setType(string $type): Bizum
    {
        if (!in_array($type, Constants::ALLOWED_BIZUM_VALUES) && !is_null($type)) {
            $exception = 'Invalid Bizum type. Allowed types are: ' . implode(', ', Constants::ALLOWED_BIZUM_VALUES)
                . '. Given: ' . $type;
            throw new \InvalidArgumentException($exception);
        }

        $this->type = $type;

        return $this;
    }
}
