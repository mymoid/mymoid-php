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

    /** @var string */
    protected ?string $field_name = null;

    /** @var string */
    protected ?string $code = null;

    /** @var string */
    protected ?string $message = null;

    /** @var array */
    protected array $params = [];

    /** @var array */
    protected array $processor = [];

    /**
     * Gets the field name
     *
     * @deprecated
     *
     * @return ?string
     */
    public function getFieldName(): ?string
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
    public function setFieldName(?string $fieldName): ErrorDetailLegacy
    {
        $this->field_name = $fieldName;

        return $this;
    }

    /**
     * Gets the error code
     *
     * @deprecated
     *
     * @return ?string
     */
    public function getCode(): ?string
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
    public function setCode(?string $code): ErrorDetailLegacy
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Gets the error message
     *
     * @deprecated
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
     * @deprecated
     *
     * @param string|null $message
     *
     * @return ErrorDetailLegacy
     */
    public function setMessage(?string $message): ErrorDetailLegacy
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
    public function getParams(): array
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
    public function setParams(array $params): ErrorDetailLegacy
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
    public function getProcessor(): array
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
    public function setProcessor(array $processor): ErrorDetailLegacy
    {
        $this->processor = $processor;

        return $this;
    }
}
