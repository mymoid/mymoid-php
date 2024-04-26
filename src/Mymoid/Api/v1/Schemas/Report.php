<?php
/**
 * Class Report
 *
 * @author    MYMOID <support@mymoid.com>
 * @copyright 2024 MYMOID
 * @license   ISC https://opensource.org/license/isc-license-txt
 * @see       https://developers.mymoid.com/api-reference
 */

namespace Mymoid\Api\v1\Schemas;

use Mymoid\Api\MymoidObject;
use Mymoid\Api\v1\Common\Constants;
use Mymoid\Traits\MymoidParser;

class Report extends MymoidObject
{
    use MymoidParser;

    /** @var string File identifier */
    protected string $id = '';

    /** @var string Must be one of Constants::ALLOWED_REPORT_FILE_STATUSES */
    protected string $status = '';

    /** @var string File path */
    protected string $file_path = '';

    /** @var string File size in bytes */
    protected string $file_size = '';

    /**
     * Get file identifier
     *
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * Set file identifier
     *
     * @param string $id
     *
     * @return Report
     */
    public function setId(string $id): Report
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get must be one of Constants::ALLOWED_REPORT_FILE_STATUSES
     *
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * Set must be one of Constants::ALLOWED_REPORT_FILE_STATUSES
     *
     * @param string $status
     *
     * @return Report
     * @throws \InvalidArgumentException
     */
    public function setStatus(string $status): Report
    {
        if (!in_array($status, Constants::ALLOWED_REPORT_FILE_STATUSES)) {
            throw new \InvalidArgumentException('Invalid status');
        }

        $this->status = $status;

        return $this;
    }

    /**
     * Get file path
     *
     * @return string
     */
    public function getFilePath(): string
    {
        return $this->file_path;
    }

    /**
     * Set file path
     *
     * @param string $file_path
     *
     * @return Report
     */
    public function setFilePath(string $file_path): Report
    {
        $this->file_path = $file_path;

        return $this;
    }

    /**
     * Get file size in bytes
     *
     * @return string
     */
    public function getFileSize(): string
    {
        return $this->file_size;
    }

    /**
     * Set file size in bytes
     *
     * @param string $file_size
     *
     * @return Report
     */
    public function setFileSize(string $file_size): Report
    {
        $this->file_size = $file_size;

        return $this;
    }
}
