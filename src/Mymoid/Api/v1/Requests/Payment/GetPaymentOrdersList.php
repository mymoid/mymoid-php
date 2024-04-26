<?php
/**
 * Class GetPaymentOrdersList
 *
 * @author    MYMOID <support@mymoid.com>
 * @copyright 2024 MYMOID
 * @license   ISC https://opensource.org/license/isc-license-txt
 */

namespace Mymoid\Api\v1\Requests\Payment;

use Mymoid\Api\v1\Requests\MymoidRequest;

class GetPaymentOrdersList extends MymoidRequest
{
    protected string $endpoint = '/payment-orders';
    protected string $method = 'GET';
    protected int $status_code = 0;
    protected array $headers = [];
    protected array $query_params = [
        'end_date' => null,
        'limit' => null,
        'max_amount' => null,
        'min_amount' => null,
        'page' => null,
        'payment_points' => null,
        'q' => null,
        'start_date' => null,
        'organization_id' => null,
        'status' => null,
    ];
}
