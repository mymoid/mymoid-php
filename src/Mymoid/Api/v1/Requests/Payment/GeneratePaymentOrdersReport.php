<?php
/**
 * Class GeneratePaymentOrdersReport
 *
 * @author    MYMOID <support@mymoid.com>
 * @copyright 2024 MYMOID
 * @license   ISC https://opensource.org/license/isc-license-txt
 */

namespace Mymoid\Api\v1\Requests\Payment;

use Mymoid\Api\v1\Requests\MymoidRequest;

class GeneratePaymentOrdersReport extends MymoidRequest
{
    protected string $endpoint = '/payment-orders/reports';
    protected string $method = 'POST';
    protected int $status_code = 0;
    protected array $headers = [];
    protected array $query_params = [
        'organization_id' => null,
    ];
}
