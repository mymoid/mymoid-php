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

use DateTime;
use Mymoid\Api\v1\Common\Constants;
use Mymoid\Traits\MymoidParser;

class TransactionFilterRequest
{
    use MymoidParser;

    /** @var string Query to filter by text as concept, reference or short_code */
    protected ?string $q = null;

    /** @var DateTime|null Start date to filter by creation date */
    protected ?DateTime $start_date = null;

    /** @var DateTime|null End date to filter by creation date */
    protected ?DateTime $end_date = null;

    /** @var int|null Minimum amount to filter by amount */
    protected ?int $min_amount = null;

    /** @var int|null Maximum amount to filter by amount */
    protected ?int $max_amount = null;

    /** @var array Must be one of Constants::ALLOWED_ORDER_STATUSES */
    protected array $status = [];

    /** @var array Payment points arrays */
    protected array $payment_points = [];

    /** @var array Conciliation IDs */
    protected array $conciliation_ids = [];

    /** @var int Number of items per page */
    protected int $limit = 0;

    /** @var int Page number */
    protected int $page = 0;

    /** @var string Organization ID */
    protected string $organization_id = '';

    /** @var array Card brands */
    protected array $card_brands = [];

    /** @var string Card type */
    protected string $card_type;

    /** @var string Card first numbers */
    protected string $first_numbers;

    /** @var string Card last numbers */
    protected string $last_numbers;

    /** @var array Payment method */
    protected array $payment_method = [];

    /** @var array Transaction type */
    protected array $type = [];

    /** @var bool Some objects need the Date as ISO8601 */
    protected bool $usesISO8601 = true;

    /**
     * Gets the query value to filter by text as concept, reference or short_code
     *
     * @return ?string
     */
    public function getQ(): ?string
    {
        return $this->q;
    }


    /**
     * Sets the query value to filter by text as concept, reference or short_code
     *
     * @param ?string $q
     *
     * @return TransactionFilterRequest
     */
    public function setQ(?string $q): TransactionFilterRequest
    {
        $this->q = $q;

        return $this;
    }

    /**
     * Gets the start date to filter by creation date
     *
     * @return ?DateTime
     */
    public function getStartDate(): ?DateTime
    {
        return $this->start_date;
    }

    /**
     * Sets the start date to filter by creation date
     *
     * @param ?DateTime $start_date
     *
     * @return TransactionFilterRequest
     */
    public function setStartDate(?DateTime $start_date): TransactionFilterRequest
    {
        $this->start_date = $start_date;

        return $this;
    }

    /**
     * Gets the end date to filter by creation date
     *
     * @return ?DateTime
     */
    public function getEndDate(): ?DateTime
    {
        return $this->end_date;
    }

    /**
     * Sets the end date to filter by creation date
     *
     * @param ?DateTime $end_date
     *
     * @return TransactionFilterRequest
     */
    public function setEndDate(?DateTime $end_date): TransactionFilterRequest
    {
        $this->end_date = $end_date;

        return $this;
    }

    /**
     * Gets the minimum amount to filter by amount
     *
     * @return ?int
     */
    public function getMinAmount(): ?int
    {
        return $this->min_amount;
    }

    /**
     * Sets the minimum amount to filter by amount
     *
     * @param ?int $min_amount
     *
     * @return TransactionFilterRequest
     */
    public function setMinAmount(?int $min_amount): TransactionFilterRequest
    {
        $this->min_amount = $min_amount;

        return $this;
    }

    /**
     * Gets the maximum amount to filter by amount
     *
     * @return ?int
     */
    public function getMaxAmount(): ?int
    {
        return $this->max_amount;
    }

    /**
     * Sets the maximum amount to filter by amount
     *
     * @param ?int $max_amount
     *
     * @return TransactionFilterRequest
     */
    public function setMaxAmount(?int $max_amount): TransactionFilterRequest
    {
        $this->max_amount = $max_amount;

        return $this;
    }

    /**
     * Gets the status value to filter by status
     *
     * @return array
     */
    public function getStatus(): array
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
    public function setStatus(array $status): TransactionFilterRequest
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
    public function getPaymentPoints(): array
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
    public function setPaymentPoints(array $payment_points): TransactionFilterRequest
    {
        $this->payment_points = $payment_points;

        return $this;
    }

    /**
     * Gets the conciliation IDs value to filter by conciliation IDs
     *
     * @return array
     */
    public function getConciliationIds(): array
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
    public function setConciliationIds(array $conciliation_ids): TransactionFilterRequest
    {
        $this->conciliation_ids = $conciliation_ids;

        return $this;
    }

    /**
     * Gets the limit value to filter by limit
     *
     * @return int
     */
    public function getLimit(): int
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
    public function setLimit(int $limit)
    {
        $this->limit = $limit;

        return $this;
    }

    /**
     * Gets the page value to filter by page
     *
     * @return int
     */
    public function getPage(): int
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
    public function setPage(int $page): TransactionFilterRequest
    {
        $this->page = $page;

        return $this;
    }

    /**
     * Gets the organization ID
     *
     * @return string
     */
    public function getOrganizationId(): string
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
    public function setOrganizationId(string $organization_id): TransactionFilterRequest
    {
        $this->organization_id = $organization_id;

        return $this;
    }

    /**
     * Gets the card brands
     *
     * @return array
     */
    public function getCardBrands(): array
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
    public function setCardBrands(array $card_brands): TransactionFilterRequest
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
    public function getCardType(): string
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
    public function setCardType(string $card_type): TransactionFilterRequest
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
    public function getFirstNumbers(): string
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
    public function setFirstNumbers(string $first_numbers): TransactionFilterRequest
    {
        $this->first_numbers = $first_numbers;

        return $this;
    }

    /**
     * Gets the card last numbers
     *
     * @return string
     */
    public function getLastNumbers(): string
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
    public function setLastNumbers(string $last_numbers): TransactionFilterRequest
    {
        $this->last_numbers = $last_numbers;

        return $this;
    }

    /**
     * Gets the payment method
     *
     * @return array
     */
    public function getPaymentMethod(): array
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
    public function setPaymentMethod(array $payment_method): TransactionFilterRequest
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
    public function getType(): array
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
    public function setType(array $type): TransactionFilterRequest
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
