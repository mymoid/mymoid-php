<?php
/**
 * Class ApiError
 *
 * @author    MYMOID <support@mymoid.com>
 * @copyright 2024 MYMOID
 * @license   ISC https://opensource.org/license/isc-license-txt
 * @see https://developers.mymoid.com/api-reference#/schemas/ApiError
 */

namespace Mymoid\Api\v1\Schemas;

use Mymoid\Api\v1\Common\ApiErrorMessage;
use Mymoid\Api\v1\Common\Constants;
use Mymoid\Traits\MymoidParser;

class ApiError
{
    use MymoidParser;

    /** @var string Internal error code */
    protected ?string $code = null;

    /** @var string Error message summary */
    protected ?string $message = null;

    /** @var int Http status error code */
    protected int $status = 0;

    /** @var string Origin error can be in MYMOID or PROCESSOR */
    protected ?string $origin = null;

    /** @var array<ApiErrorMessage> Error message details */
    protected array $details = [];

    /**
     * Get internal error code
     *
     * @return ?string
     */
    public function getCode(): ?string
    {
        return $this->code;
    }

    /**
     * Set internal error code
     *
     * @param string|null $code
     *
     * @return ApiError
     */
    public function setCode(?string $code): ApiError
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get error message summary
     *
     * @return ?string
     */
    public function getMessage(): ?string
    {
        return $this->message;
    }

    /**
     * Set error message summary
     *
     * @param string|null $message
     *
     * @return ApiError
     */
    public function setMessage(?string $message): ApiError
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get Http status error code
     *
     * @return int
     */
    public function getStatus(): int
    {
        return $this->status;
    }

    /**
     * Set Http status error code
     *
     * @param int $status
     *
     * @return ApiError
     * @throws \InvalidArgumentException
     */
    public function setStatus(int $status): ApiError
    {
        if (!in_array($status, Constants::ALLOWED_HTTP_ERROR_STATUSES) && $status !== 0) {
            $exception = 'Status must be one of ' . implode(', ', Constants::ALLOWED_HTTP_ERROR_STATUSES)
                . '. Given: ' . $status;
            throw new \InvalidArgumentException($exception);
        }

        $this->status = $status;

        return $this;
    }

    /**
     * Get origin error can be in MYMOID or PROCESSOR
     *
     * @return string|null
     */
    public function getOrigin(): ?string
    {
        return $this->origin;
    }

    /**
     * Set origin error can be in MYMOID or PROCESSOR
     *
     * @param string|null $origin
     *
     * @return ApiError
     * @throws \InvalidArgumentException
     */
    public function setOrigin(?string $origin): ApiError
    {
        if (!in_array($origin, Constants::ALLOWED_ORIGINS) && $origin !== null) {
            $exception = 'Origin must be one of ' . implode(', ', Constants::ALLOWED_ORIGINS)
                . '. Given: ' . $origin;
            throw new \InvalidArgumentException($exception);
        }

        $this->origin = $origin;

        return $this;
    }

    /**
     * Get error message details
     *
     * @return array<ErrorDetail>
     */
    public function getDetails(): array
    {
        return $this->details;
    }

    /**
     * Set error message details
     *
     * @param array<ErrorDetail> $details
     *
     * @return ApiError
     */
    public function setDetails(array $details): ApiError
    {
        $this->details = $details;

        return $this;
    }
}
