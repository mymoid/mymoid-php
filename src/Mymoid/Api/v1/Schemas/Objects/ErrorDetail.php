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

    /** @var string|null */
    protected $message;

    /**
     * Gets the error message
     *
     * @return string|null
     */
    public function getMessage()
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
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }
}
