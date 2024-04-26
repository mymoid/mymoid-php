<?php
/**
 * Sample: deserialization of a JSON string
 *
 * @author    MYMOID <support@mymoid.com>
 * @copyright 2024 MYMOID
 * @license   ISC https://opensource.org/license/isc-license-txt
 */

use Mymoid\Api\v1\Schemas\Requests\TransactionFilterRequest;

require_once __DIR__ . '/../vendor/autoload.php';

$data_sample = [
    'q' => 'my query',
    'start_date' => '2017-07-21T17:32:28Z',
    'end_date' => '2022-12-03T10:15:30Z',
    'min_amount' => 0,
    'max_amount' => 9999999,
    'status' => [
        'AVAILABLE'
    ],
    'payment_points' => [
        '847d62498cc6205c9ee4f6d3bd98799a0bc8305fc74d89b7b534af6d264c1656',
        '68a8e51ee5b5165db2013b579dfeea51ce2556d678c1d34ab743ca71bf9fe074',
        'aff1bb835a4de57030c9019ce40beaf6f31ab268449b6472d61635cde16b9721'
    ],
    'payment_method' => [
        'type' => 'CREDITCARD',
        'payment_method_detail' => [
            'card_type' => 'DEBIT',
            'card_brand' => 'MASTERCARD',
            'first_number' => 'string',
            'last_number' => 'string'
        ]
    ]
];

// Deserialization of a JSON string
$transaction_filter_request = new TransactionFilterRequest();
$transaction_filter_request->parseFromArray($data_sample);

// Show the result
dump($transaction_filter_request);

// Show the result as JSON
dump($transaction_filter_request->toJson());
