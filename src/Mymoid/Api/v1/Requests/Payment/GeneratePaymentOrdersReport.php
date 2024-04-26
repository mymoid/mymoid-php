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
    protected $endpoint = '/payment-orders/reports';
    protected $method = 'POST';
    protected $status_code = 0;
    protected $headers = [];
    protected $query_params = [
        'organization_id' => null,
    ];
}
