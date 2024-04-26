<?php
/**
 * Class MymoidClient
 *
 * @author    MYMOID <support@mymoid.com>
 * @copyright 2024 MYMOID
 * @license   ISC https://opensource.org/license/isc-license-txt
 */

namespace Mymoid\Api\v1\Client;

use Http\Client\Curl\Client;
use Mymoid\Api\v1\Requests\Payment\CancelPaymentOrder;
use Mymoid\Api\v1\Requests\Payment\CreatePaymentOrder;
use Mymoid\Api\v1\Requests\Payment\GeneratePaymentOrdersReport;
use Mymoid\Api\v1\Requests\Payment\GetPaymentMethod;
use Mymoid\Api\v1\Requests\Payment\GetPaymentOrdersDetail;
use Mymoid\Api\v1\Requests\Payment\GetPaymentOrdersList;
use Mymoid\Api\v1\Requests\Payment\GetPaymentOrdersReportStatus;
use Mymoid\Api\v1\Requests\Payment\GetTransactionsDetail;
use Mymoid\Api\v1\Requests\Payment\GetTransactionsList;
use Mymoid\Api\v1\Requests\Payment\PayWithToken;
use Mymoid\Api\v1\Requests\Payment\RefundPaymentOrder;
use Mymoid\Api\v1\Schemas\Body\PayWithTokenBody;
use Mymoid\Api\v1\Schemas\Body\RefundPaymentBody;
use Mymoid\Api\v1\Schemas\Pagination;
use Mymoid\Api\v1\Schemas\PaymentMethod;
use Mymoid\Api\v1\Schemas\PaymentOrder;
use Mymoid\Api\v1\Schemas\Report;
use Mymoid\Api\v1\Schemas\Requests\PaymentOrderFilterRequest;
use Mymoid\Api\v1\Schemas\TransactionDetail;
use Nyholm\Psr7\Factory\Psr17Factory;
use Psr\Http\Message\RequestInterface;

class MymoidClient
{
    /** @var MymoidConfiguration */
    private MymoidConfiguration $configuration;

    /** @var Client HTTP Client implementation */
    private Client $client;

    /** @var Psr17Factory PSR-17 factory implementation */
    private Psr17Factory $factory;

    /** @var RequestInterface Request object */
    private RequestInterface $request;

    public function __construct(
        MymoidConfiguration $configuration
    ) {
        $this->configuration = $configuration;
        $this->factory = new Psr17Factory();
        $this->client = new Client($this->factory);
    }

    /**
     * Get the Mymoid Configuration
     *
     * @return MymoidConfiguration
     */
    public function getConfiguration(): MymoidConfiguration
    {
        return $this->configuration;
    }

    /**
     * Get the HTTP Client implementation
     *
     * @return Client
     */
    public function getClient(): Client
    {
        return $this->client;
    }

    /**
     * Get the PSR-17 factory implementation
     *
     * @return Psr17Factory
     */
    public function getFactory(): Psr17Factory
    {
        return $this->factory;
    }

    /**
     * Get the Request object
     *
     * @return RequestInterface
     */
    public function getRequest(): RequestInterface
    {
        return $this->request;
    }

    /**
     * Create a Payment Order Request
     *
     * @param PaymentOrder $payment_order
     *
     * @return CreatePaymentOrder
     */
    public function createPaymentOrderRequest(
        PaymentOrder $payment_order
    ): CreatePaymentOrder {
        $payment_request = new CreatePaymentOrder(
            $this,
            $payment_order
        );

        return $payment_request;
    }

    /**
     * Get a Payment Orders List Request
     *
     * @param PaymentOrderFilterRequest $filter
     * @param Pagination $pagination
     *
     * @return GetPaymentOrdersList
     */
    public function getPaymentOrdersListRequest(
        PaymentOrderFilterRequest $filter
    ): GetPaymentOrdersList {
        $payment_orders_list_request = new GetPaymentOrdersList(
            $this,
            $filter,
            new Pagination()
        );

        return $payment_orders_list_request;
    }

    /**
     * Get a Payment Order Request
     *
     * @param string $payment_order_id
     * @param string $organization_id
     *
     * @return PaymentOrder
     */
    public function getPaymentOrdersDetailRequest(
        string $payment_order_id,
        string $organization_id
    ): GetPaymentOrdersDetail {
        $payment_order_detail_request = new GetPaymentOrdersDetail(
            $payment_order_id,
            $organization_id,
            $this,
            new PaymentOrder()
        );

        return $payment_order_detail_request;
    }

    /**
     * Get a Transaction Detail Request
     *
     * @param string $transaction_id
     * @param string $organization_id
     *
     * @return GetTransactionsDetail
     */
    public function getTransactionsDetailRequest(
        $transaction_id,
        $organization_id
    ): GetTransactionsDetail {
        $transactions_detail_request = new GetTransactionsDetail(
            $transaction_id,
            $organization_id,
            $this,
            new TransactionDetail()
        );

        return $transactions_detail_request;
    }

    /**
     * Pay a Payment Order with a Token
     *
     * @param string $payment_order_id
     * @param string $payment_token
     *
     * @return PayWithToken
     */
    public function payWithTokenRequest(
        string $payment_order_id,
        string $payment_token
    ): PayWithToken {
        $pay_with_token_request = new PayWithToken(
            $payment_order_id,
            $this,
            (new PayWithTokenBody())->setPaymentMethodId($payment_token),
            new PaymentOrder()
        );

        return $pay_with_token_request;
    }

    /**
     * Refund a Payment Order
     *
     * @param string $payment_order_id
     * @param int $amount
     *
     * @return RefundPaymentOrder
     */
    public function refundPaymentOrderRequest(
        string $payment_order_id,
        int $amount
    ): RefundPaymentOrder {
        $refund_payment_order_request = new RefundPaymentOrder(
            $payment_order_id,
            $this,
            (new RefundPaymentBody())->setAmount($amount),
            new PaymentOrder()
        );

        return $refund_payment_order_request;
    }

    /**
     * Cancel a Payment Order
     *
     * @param string $payment_order_id
     *
     * @return CancelPaymentOrder
     */
    public function cancelPaymentOrderRequest(
        string $payment_order_id
    ): CancelPaymentOrder {
        $cancel_payment_order_request = new CancelPaymentOrder(
            $payment_order_id,
            $this,
            new PaymentOrder()
        );

        return $cancel_payment_order_request;
    }

    /**
     * Generate a Payment Orders Report
     *
     * @param PaymentOrderFilterRequest $filter
     *
     * @return GeneratePaymentOrdersReport
     */
    public function generatePaymentOrdersReportRequest(
        PaymentOrderFilterRequest $filter
    ) {
        $payment_orders_report_request = new GeneratePaymentOrdersReport(
            $this,
            $filter,
            new Report()
        );

        return $payment_orders_report_request;
    }

    /**
     * Get a Payment Orders Report Status
     *
     * @param string $report_id
     * @param string $organization_id
     *
     * @return GetPaymentOrdersReportStatus
     */
    public function getPaymentOrdersReportStatusRequest(
        string $report_id,
        string $organization_id
    ) {
        $payment_orders_report_status_request = new GetPaymentOrdersReportStatus(
            $report_id,
            $organization_id,
            $this,
            new Report()
        );

        return $payment_orders_report_status_request;
    }

    /**
     * Get a Payment Method Request
     *
     * @param string $payment_method_id
     *
     * @return GetPaymentMethod
     */
    public function getPaymentMethodRequest(
        string $payment_method_id
    ): GetPaymentMethod {
        $payment_method_request = new GetPaymentMethod(
            $payment_method_id,
            $this,
            new PaymentMethod()
        );

        return $payment_method_request;
    }

    /**
     * @param GetTransactionsList $filter
     *
     * @return GetTransactionsList
     */
    public function getTransactionsListRequest(
        GetTransactionsList $filter
    ): GetTransactionsList {
        $transactions_list_request = new GetTransactionsList(
            $this,
            $filter,
            new Pagination()
        );

        return $transactions_list_request;
    }
}
