<?php
/**
 * Class PaymentOrderFilterRequest
 *
 * @author    MYMOID <support@mymoid.com>
 * @copyright 2024 MYMOID
 * @license   ISC https://opensource.org/license/isc-license-txt
 * @see       https://developers.mymoid.com/api-reference#/schemas/PaymentOrderFilterRequest
 */

namespace Mymoid\Api\v1\Schemas\Requests;

use Mymoid\Api\MymoidObject;
use Mymoid\Api\v1\Common\Constants;
use Mymoid\Traits\MymoidParser;

class PaymentOrderFilterRequest extends MymoidObject
{
    use MymoidParser;

    /** @var string Query to filter by text as concept, reference or short_code */
    protected $q;

    /** @var \DateTime|null Start date to filter by creation date */
    protected $start_date;

    /** @var \DateTime|null End date to filter by creation date */
    protected $end_date;

    /** @var int Minimum amount to filter by amount */
    protected $min_amount = 0;

    /** @var int Maximum amount to filter by amount */
    protected $max_amount = 0;

    /** @var array Must be one of Constants::ALLOWED_ORDER_STATUSES */
    protected $status = [];

    /** @var array Payment points arrays */
    protected $payment_points = [];

    /** @var int Number of items per page */
    protected $limit = 0;

    /** @var int Page number */
    protected $page = 0;

    /** @var string Organization ID */
    protected $organization_id = '';

    /** @var bool Some objects need the Date as ISO8601 */
    protected $usesISO8601 = true;

    /**
     * Gets the query value to filter by text as concept, reference or short_code
     *
     * @return string
     */
    public function getQ()
    {
        return $this->q;
    }

    /**
     * Sets the query value to filter by text as concept, reference or short_code
     *
     * @param string $q
     *
     * @return PaymentOrderFilterRequest
     */
    public function setQ($q)
    {
        $this->q = $q;

        return $this;
    }

    /**
     * Gets the start date to filter by creation date
     *
     * @return \DateTime|null
     */
    public function getStartDate()
    {
        return $this->start_date;
    }

    /**
     * Sets the start date to filter by creation date
     *
     * @param \DateTime|null $start_date
     *
     * @return PaymentOrderFilterRequest
     */
    public function setStartDate($start_date)
    {
        $this->start_date = $start_date;

        return $this;
    }

    /**
     * Gets the end date to filter by creation date
     *
     * @return \DateTime|null
     */
    public function getEndDate()
    {
        return $this->end_date;
    }

    /**
     * Sets the end date to filter by creation date
     *
     * @param \DateTime|null $end_date
     *
     * @return PaymentOrderFilterRequest
     */
    public function setEndDate($end_date)
    {
        $this->end_date = $end_date;

        return $this;
    }

    /**
     * Gets the minimum amount to filter by amount
     *
     * @return int
     */
    public function getMinAmount()
    {
        return $this->min_amount;
    }

    /**
     * Sets the minimum amount to filter by amount
     *
     * @param int $min_amount
     *
     * @return PaymentOrderFilterRequest
     */
    public function setMinAmount($min_amount)
    {
        $this->min_amount = $min_amount;

        return $this;
    }

    /**
     * Gets the maximum amount to filter by amount
     *
     * @return int
     */
    public function getMaxAmount()
    {
        return $this->max_amount;
    }

    /**
     * Sets the maximum amount to filter by amount
     *
     * @param int $max_amount
     *
     * @return PaymentOrderFilterRequest
     */
    public function setMaxAmount($max_amount)
    {
        $this->max_amount = $max_amount;

        return $this;
    }

    /**
     * Gets the status value to filter by status
     *
     * @return array
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Sets the status value to filter by status
     *
     * @param array $status
     *
     * @return PaymentOrderFilterRequest
     * @throws \InvalidArgumentException
     */
    public function setStatus($status)
    {
        foreach ($status as $value) {
            if (!in_array($value, Constants::ALLOWED_ORDER_STATUSES)) {
                $exception = 'Invalid status value. Must be one of: ' . implode(
                    ', ',
                    Constants::ALLOWED_ORDER_STATUSES
                ) . '. Given: ' . $value;
                throw new \InvalidArgumentException($exception);
            }
        }

        $this->status = $status;

        return $this;
    }

    /**
     * Gets the payment points value to filter by payment points
     *
     * @return array
     */
    public function getPaymentPoints()
    {
        return $this->payment_points;
    }

    /**
     * Sets the payment points value to filter by payment points
     *
     * @param array $payment_points
     *
     * @return PaymentOrderFilterRequest
     */
    public function setPaymentPoints($payment_points)
    {
        $this->payment_points = $payment_points;

        return $this;
    }

    /**
     * Gets the limit value to filter by limit
     *
     * @return int
     */
    public function getLimit()
    {
        return $this->limit;
    }

    /**
     * Sets the limit value to filter by limit
     *
     * @param int $limit
     *
     * @return PaymentOrderFilterRequest
     */
    public function setLimit($limit)
    {
        $this->limit = $limit;

        return $this;
    }

    /**
     * Gets the page value to filter by page
     *
     * @return int
     */
    public function getPage()
    {
        return $this->page;
    }

    /**
     * Sets the page value to filter by page
     *
     * @param int $page
     *
     * @return PaymentOrderFilterRequest
     */
    public function setPage($page)
    {
        $this->page = $page;

        return $this;
    }

    /**
     * Gets the organization ID value to filter by organization ID
     *
     * @return string
     */
    public function getOrganizationId()
    {
        return $this->organization_id;
    }

    /**
     * Sets the organization ID value to filter by organization ID
     *
     * @param string $organization_id
     *
     * @return PaymentOrderFilterRequest
     */
    public function setOrganizationId($organization_id)
    {
        $this->organization_id = $organization_id;

        return $this;
    }
}
