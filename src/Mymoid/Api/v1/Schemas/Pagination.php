<?php
/**
 * Class Pagination
 *
 * @author    MYMOID <support@mymoid.com>
 * @copyright 2024 MYMOID
 * @license   ISC https://opensource.org/license/isc-license-txt
 * @see       https://developers.mymoid.com/api-reference#/schemas/Pagination
 */

namespace Mymoid\Api\v1\Schemas;

use Mymoid\Api\MymoidObject;
use Mymoid\Traits\MymoidParser;

class Pagination extends MymoidObject
{
    use MymoidParser;

    /** @var int Maximum items to retrieve in the query */
    protected $limit = 0;

    /** @var int Index from which to retrieve items in queries */
    protected $page = 0;

    /** @var int Total elements for result of query */
    protected $total_elements = 0;

    /** @var int Number of elements contained in the array 'content' */
    protected $number_of_elements = 0;

    /** @var bool Flag to indicate if it is the last page of the search result */
    protected $last = false;

    /** @var bool Flag to indicate if it is the first page of the search result */
    protected $first = false;

    /** @var bool Flag to indicate that there are no results of the search */
    protected $empty = true;

    /** @var array Array of elements */
    protected $content = [];

    /**
     * Get maximum items to retrieve in the query
     *
     * @return int
     */
    public function getLimit()
    {
        return $this->limit;
    }

    /**
     * Set maximum items to retrieve in the query
     *
     * @param int $limit
     *
     * @return Pagination
     */
    public function setLimit($limit)
    {
        $this->limit = $limit;

        return $this;
    }

    /**
     * Get index from which to retrieve items in queries
     *
     * @return int
     */
    public function getPage()
    {
        return $this->page;
    }

    /**
     * Set index from which to retrieve items in queries
     *
     * @param int $page
     *
     * @return Pagination
     */
    public function setPage($page)
    {
        $this->page = $page;

        return $this;
    }

    /**
     * Get total elements for result of a query
     *
     * @return int
     */
    public function getTotalElements()
    {
        return $this->total_elements;
    }

    /**
     * Set total elements for result of a query
     *
     * @param int $total_elements
     *
     * @return Pagination
     */
    public function setTotalElements($total_elements)
    {
        $this->total_elements = $total_elements;

        return $this;
    }

    /**
     * Get number of elements contained in the array 'content'
     *
     * @return int
     */
    public function getNumberOfElements()
    {
        return $this->number_of_elements;
    }

    /**
     * Set number of elements contained in the array 'content'
     *
     * @param int $number_of_elements
     *
     * @return Pagination
     */
    public function setNumberOfElements($number_of_elements)
    {
        $this->number_of_elements = $number_of_elements;

        return $this;
    }

    /**
     * Get flag to indicate if it is the last page of the search result
     *
     * @return bool
     */
    public function isLast()
    {
        return $this->last;
    }

    /**
     * Set flag to indicate if it is the last page of the search result
     *
     * @param bool $last
     *
     * @return Pagination
     */
    public function setLast($last)
    {
        $this->last = $last;

        return $this;
    }

    /**
     * Get flag to indicate if it is the first page of the search result
     *
     * @return bool
     */
    public function isFirst()
    {
        return $this->first;
    }

    /**
     * Set flag to indicate if it is the first page of the search result
     *
     * @param bool $first
     *
     * @return Pagination
     */
    public function setFirst($first)
    {
        $this->first = $first;

        return $this;
    }

    /**
     * Get flag to indicate that there are no results of the search
     *
     * @return bool
     */
    public function isEmpty()
    {
        return $this->empty;
    }

    /**
     * Set flag to indicate that there are no results of the search
     *
     * @param bool $empty
     *
     * @return Pagination
     */
    public function setEmpty($empty)
    {
        $this->empty = $empty;

        return $this;
    }

    /**
     * Get array of elements
     *
     * @return array
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set array of elements
     *
     * @param array $content
     *
     * @return Pagination
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }
}
