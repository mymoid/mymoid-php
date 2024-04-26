<?php
/**
 * Class TransactionFilterRequest
 *
 * @author    MYMOID <support@mymoid.com>
 * @copyright 2024 MYMOID
 * @license   ISC https://opensource.org/license/isc-license-txt
 * @see       https://developers.mymoid.com/api-reference#/schemas/TransactionFilterRequest
 */

namespace Mymoid\Api\v1\Schemas\Requests;

use Mymoid\Api\v1\Common\Constants;
use Mymoid\Traits\MymoidParser;

class TransactionFilterRequest
{
    use MymoidParser;

    /** @var string Query to filter by text as concept, reference or short_code */
    protected $q;

    /** @var \DateTime|null Start date to filter by creation date */
    protected $start_date;

    /** @var \DateTime|null End date to filter by creation date */
    protected $end_date;

    /** @var int|null Minimum amount to filter by amount */
    protected $min_amount;

    /** @var int|null Maximum amount to filter by amount */
    protected $max_amount;

    /** @var array Must be one of Constants::ALLOWED_ORDER_STATUSES */
    protected $status = [];

    /** @var array Payment points arrays */
    protected $payment_points = [];

    /** @var array Conciliation IDs */
    protected $conciliation_ids = [];

    /** @var int Number of items per page */
    protected $limit = 0;

    /** @var int Page number */
    protected $page = 0;

    /** @var string Organization ID */
    protected $organization_id = '';

    /** @var array Card brands */
    protected $card_brands = [];

    /** @var string Card type */
    protected $card_type;

    /** @var string Card first numbers */
    protected $first_numbers;

    /** @var string Card last numbers */
    protected $last_numbers;

    /** @var array Payment method */
    protected $payment_method = [];

    /** @var array Transaction type */
    protected $type = [];

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
     * @return TransactionFilterRequest
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
     * @return TransactionFilterRequest
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
     * @return TransactionFilterRequest
     */
    public function setEndDate($end_date)
    {
        $this->end_date = $end_date;

        return $this;
    }

    /**
     * Gets the minimum amount to filter by amount
     *
     * @return int|null
     */
    public function getMinAmount()
    {
        return $this->min_amount;
    }

    /**
     * Sets the minimum amount to filter by amount
     *
     * @param int|null $min_amount
     *
     * @return TransactionFilterRequest
     */
    public function setMinAmount($min_amount)
    {
        $this->min_amount = $min_amount;

        return $this;
    }

    /**
     * Gets the maximum amount to filter by amount
     *
     * @return int|null
     */
    public function getMaxAmount()
    {
        return $this->max_amount;
    }

    /**
     * Sets the maximum amount to filter by amount
     *
     * @param int|null $max_amount
     *
     * @return TransactionFilterRequest
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
     * @return TransactionFilterRequest
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
     * Gets the payment points arrays
     *
     * @return array
     */
    public function getPaymentPoints()
    {
        return $this->payment_points;
    }

    /**
     * Sets the payment points arrays
     *
     * @param array $payment_points
     *
     * @return TransactionFilterRequest
     */
    public function setPaymentPoints($payment_points)
    {
        $this->payment_points = $payment_points;

        return $this;
    }

    /**
     * Gets the conciliation IDs value to filter by conciliation IDs
     *
     * @return array
     */
    public function getConciliationIds()
    {
        return $this->conciliation_ids;
    }

    /**
     * Sets the conciliation IDs value to filter by conciliation IDs
     *
     * @param array $conciliation_ids
     *
     * @return TransactionFilterRequest
     */
    public function setConciliationIds($conciliation_ids)
    {
        $this->conciliation_ids = $conciliation_ids;

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
     * @return TransactionFilterRequest
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
     * @return TransactionFilterRequest
     */
    public function setPage($page)
    {
        $this->page = $page;

        return $this;
    }

    /**
     * Gets the organization ID
     *
     * @return string
     */
    public function getOrganizationId()
    {
        return $this->organization_id;
    }

    /**
     * Sets the organization ID
     *
     * @param string $organization_id
     *
     * @return TransactionFilterRequest
     */
    public function setOrganizationId($organization_id)
    {
        $this->organization_id = $organization_id;

        return $this;
    }

    /**
     * Gets the card brands
     *
     * @return array
     */
    public function getCardBrands()
    {
        return $this->card_brands;
    }

    /**
     * Sets the card brands
     *
     * @param array $card_brands
     *
     * @return TransactionFilterRequest
     */
    public function setCardBrands($card_brands)
    {
        foreach ($card_brands as $value) {
            if (!in_array($value, Constants::ALLOWED_CARD_BRANDS)) {
                $exception = 'Invalid card brand value. Must be one of: ' . implode(
                    ', ',
                    Constants::ALLOWED_CARD_BRANDS
                ) . '. Given: ' . $value;
                throw new \InvalidArgumentException($exception);
            }
        }

        $this->card_brands = $card_brands;

        return $this;
    }

    /**
     * Gets the card type
     *
     * @return string
     */
    public function getCardType()
    {
        return $this->card_type;
    }

    /**
     * Sets the card type
     *
     * @param string $card_type
     *
     * @return TransactionFilterRequest
     */
    public function setCardType($card_type)
    {
        if (!in_array($card_type, Constants::ALLOWED_CARD_TYPES)) {
            $exception = 'Invalid card type value. Must be one of: ' . implode(
                ', ',
                Constants::ALLOWED_CARD_TYPES
            ) . '. Given: ' . $card_type;
            throw new \InvalidArgumentException($exception);
        }

        $this->card_type = $card_type;

        return $this;
    }

    /**
     * Gets the card first numbers
     *
     * @return string
     */
    public function getFirstNumbers()
    {
        return $this->first_numbers;
    }

    /**
     * Sets the card first numbers
     *
     * @param string $first_numbers
     *
     * @return TransactionFilterRequest
     */
    public function setFirstNumbers($first_numbers)
    {
        $this->first_numbers = $first_numbers;

        return $this;
    }

    /**
     * Gets the card last numbers
     *
     * @return string
     */
    public function getLastNumbers()
    {
        return $this->last_numbers;
    }

    /**
     * Sets the card last numbers
     *
     * @param string $last_numbers
     *
     * @return TransactionFilterRequest
     */
    public function setLastNumbers($last_numbers)
    {
        $this->last_numbers = $last_numbers;

        return $this;
    }

    /**
     * Gets the payment method
     *
     * @return array
     */
    public function getPaymentMethod()
    {
        return $this->payment_method;
    }

    /**
     * Sets the payment method
     *
     * @param array $payment_method
     *
     * @return TransactionFilterRequest
     */
    public function setPaymentMethod($payment_method)
    {
        foreach ($payment_method as $value) {
            if (!is_array($value) && !in_array($value, Constants::ALLOWED_PAYMENT_METHOD_TYPES)) {
                $exception = 'Invalid payment method value. Must be one of: ' . implode(
                    ', ',
                    Constants::ALLOWED_PAYMENT_METHOD_TYPES
                ) . '. Given: ' . $value;
                throw new \InvalidArgumentException($exception);
            }
        }

        $this->payment_method = $payment_method;

        return $this;
    }

    /**
     * Gets the type
     *
     * @return array
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Sets the type
     *
     * @param array $type
     *
     * @return TransactionFilterRequest
     */
    public function setType($type)
    {
        foreach ($type as $value) {
            if (!in_array($value, Constants::ALLOWED_TRANSACTION_TYPES)) {
                $exception = 'Invalid type value. Must be one of: ' . implode(
                    ', ',
                    Constants::ALLOWED_TRANSACTION_TYPES
                ) . '. Given: ' . $value;
                throw new \InvalidArgumentException($exception);
            }
        }

        $this->type = $type;

        return $this;
    }
}
