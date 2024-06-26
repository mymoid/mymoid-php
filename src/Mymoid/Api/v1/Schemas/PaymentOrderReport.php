<?php
/**
 * Class PaymentOrderReport
 *
 * @author    MYMOID <support@mymoid.com>
 * @copyright 2024 MYMOID
 * @license   ISC https://opensource.org/license/isc-license-txt
 * @see       https://developers.mymoid.com/api-reference#/schemas/PaymentOrder
 */

namespace Mymoid\Api\v1\Schemas;

use Mymoid\Api\v1\Common\Constants;
use Mymoid\Traits\MymoidParser;

class PaymentOrderReport
{
    use MymoidParser;

    /** @var string File identifier */
    protected ?string $id = null;

    /** @var string File Status. Must be one of Constants::ALLOWED_FILE_STATUSES */
    protected ?string $status = null;

    /** @var string File path */
    protected ?string $file_path = null;

    /** @var int File size in bytes */
    protected int $file_size = 0;

    /**
     * Gets the File identifier
     *
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * Sets the File identifier
     *
     * @param string|null $id
     *
     * @return PaymentOrderReport
     */
    public function setId(?string $id): PaymentOrderReport
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Gets the File Status
     *
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * Sets the File Status
     *
     * @param string|null $status
     *
     * @return PaymentOrderReport
     * @throws InvalidArgumentException
     */
    public function setStatus(?string $status): PaymentOrderReport
    {
        if (!in_array($status, Constants::ALLOWED_REPORT_FILE_STATUSES) && !is_null($status)) {
            $exception = 'Status not allowed. Allowed statuses: ' .
                implode(', ', Constants::ALLOWED_REPORT_FILE_STATUSES) . '. Given: ' . $status;
            throw new \InvalidArgumentException($exception);
        }

        $this->status = $status;

        return $this;
    }

    /**
     * Gets the File path
     *
     * @return string|null
     */
    public function getFilePath(): ?string
    {
        return $this->file_path;
    }

    /**
     * Sets the File path
     *
     * @param string|null $file_path
     *
     * @return PaymentOrderReport
     */
    public function setFilePath(?string $file_path): PaymentOrderReport
    {
        $this->file_path = $file_path;

        return $this;
    }

    /**
     * Gets the File size in bytes
     *
     * @return int
     */
    public function getFileSize(): int
    {
        return $this->file_size;
    }

    /**
     * Sets the File size in bytes
     *
     * @param int $file_size
     *
     * @return PaymentOrderReport
     */
    public function setFileSize(int $file_size): PaymentOrderReport
    {
        $this->file_size = $file_size;

        return $this;
    }
}
