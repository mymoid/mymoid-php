<?php
/**
 * Class ApiErrorLegacy
 *
 * @author    MYMOID <support@mymoid.com>
 * @copyright 2024 MYMOID
 * @license   ISC https://opensource.org/license/isc-license-txt
 * @deprecated
 * @see       https://developers.mymoid.com/api-reference#/schemas/ApiErrorLegacy
 */

namespace Mymoid\Api\v1\Schemas;

use Mymoid\Api\v1\Schemas\ApiError;

class ApiErrorLegacy extends ApiError
{
    /**
     * Get error message details
     *
     * @return array<ErrorDetailLegacy>
     */
    public function getDetails(): array
    {
        return $this->details;
    }

    /**
     * Set error message details
     *
     * @param array<ErrorDetailLegacy> $details
     *
     * @return ApiError
     */
    public function setDetails(array $details): ApiError
    {
        $this->details = $details;

        return $this;
    }
}
