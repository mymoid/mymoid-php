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
    protected $id = '';

    /** @var string Must be one of Constants::ALLOWED_REPORT_FILE_STATUSES */
    protected $status = '';

    /** @var string File path */
    protected $file_path = '';

    /** @var string File size in bytes */
    protected $file_size = '';

    /**
     * Get file identifier
     *
     * @return string
     */
    public function getId()
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
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get must be one of Constants::ALLOWED_REPORT_FILE_STATUSES
     *
     * @return string
     */
    public function getStatus()
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
    public function setStatus($status)
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
    public function getFilePath()
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
    public function setFilePath($file_path)
    {
        $this->file_path = $file_path;

        return $this;
    }

    /**
     * Get file size in bytes
     *
     * @return string
     */
    public function getFileSize()
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
    public function setFileSize($file_size)
    {
        $this->file_size = $file_size;

        return $this;
    }
}
