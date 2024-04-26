<?php
/**
 * Class ErrorDetailLegacy
 *
 * @author    MYMOID <support@mymoid.com>
 * @copyright 2024 MYMOID
 * @license   ISC https://opensource.org/license/isc-license-txt
 */

namespace Mymoid\Api\v1\Schemas\Objects;

use Mymoid\Traits\MymoidParser;

class ErrorDetailLegacy
{
    use MymoidParser;

    /** @var string|null */
    protected $field_name;

    /** @var string|null */
    protected $code;

    /** @var string|null */
    protected $message;

    /** @var array */
    protected $params = [];

    /** @var array */
    protected $processor = [];

    /**
     * Gets the field name
     *
     * @deprecated
     *
     * @return string|null
     */
    public function getFieldName()
    {
        return $this->field_name;
    }

    /**
     * Sets the field name
     *
     * @deprecated
     *
     * @param string|null $fieldName
     *
     * @return ErrorDetailLegacy
     */
    public function setFieldName($fieldName)
    {
        $this->field_name = $fieldName;

        return $this;
    }

    /**
     * Gets the error code
     *
     * @deprecated
     *
     * @return string|null
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Sets the error code
     *
     * @deprecated
     *
     * @param string|null $code
     *
     * @return ErrorDetailLegacy
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Gets the error message
     *
     * @deprecated
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
     * @deprecated
     *
     * @param string|null $message
     *
     * @return ErrorDetailLegacy
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Gets the error params
     *
     * @deprecated
     *
     * @return array
     */
    public function getParams()
    {
        return $this->params;
    }

    /**
     * Sets the error params
     *
     * @deprecated
     *
     * @param array $params
     *
     * @return ErrorDetailLegacy
     */
    public function setParams($params)
    {
        $this->params = $params;

        return $this;
    }

    /**
     * Gets the error processor
     *
     * @deprecated
     *
     * @return array
     */
    public function getProcessor()
    {
        return $this->processor;
    }

    /**
     * Sets the error processor
     *
     * @deprecated
     *
     * @param array $processor
     *
     * @return ErrorDetailLegacy
     */
    public function setProcessor($processor)
    {
        $this->processor = $processor;

        return $this;
    }
}
