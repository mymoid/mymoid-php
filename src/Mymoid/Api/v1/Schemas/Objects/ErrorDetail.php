<?php
/**
 * Class ErrorDetail
 *
 * @author    MYMOID <support@mymoid.com>
 * @copyright 2024 MYMOID
 * @license   ISC https://opensource.org/license/isc-license-txt
 */

namespace Mymoid\Api\v1\Schemas\Objects;

use Mymoid\Traits\MymoidParser;

class ErrorDetail
{
    use MymoidParser;

    /** @var ?string */
    protected ?string $message = null;

    /**
     * Gets the error message
     *
     * @return ?string
     */
    public function getMessage(): ?string
    {
        return $this->message;
    }

    /**
     * Sets the error message
     *
     * @param string|null $message
     *
     * @return ErrorDetail
     */
    public function setMessage(?string $message): ErrorDetail
    {
        $this->message = $message;

        return $this;
    }
}
