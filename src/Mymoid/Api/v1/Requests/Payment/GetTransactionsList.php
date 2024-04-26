<?php
/**
 * Class GetTransactionsList
 *
 * @author    MYMOID <support@mymoid.com>
 * @copyright 2024 MYMOID
 * @license   ISC https://opensource.org/license/isc-license-txt
 */

namespace Mymoid\Api\v1\Requests\Payment;

use Mymoid\Api\v1\Requests\MymoidRequest;

class GetTransactionsList extends MymoidRequest
{
    protected $endpoint = '/transactions';
    protected $method = 'GET';
    protected $status_code = 0;
    protected $headers = [];
    protected $query_params = [
        'conciliation_ids' => null,
        'end_date' => null,
        'limit' => null,
        'max_amount' => null,
        'min_amount' => null,
        'page' => null,
        'payment_points' => null,
        'q' => null,
        'start_date' => null,
        'organization_id' => null,
        'card_brand' => null,
        'card_type' => null,
        'first_numbers' => null,
        'last_numbers' => null,
        'payment_method' => null,
        'type' => null,
    ];
}
