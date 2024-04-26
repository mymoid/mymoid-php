<?php
/**
 * Sample: getting a Payment Order details
 *
 * @author    MYMOID <support@mymoid.com>
 * @copyright 2024 MYMOID
 * @license   ISC https://opensource.org/license/isc-license-txt
 */

use Mymoid\Api\v1\Client\MymoidClient;
use Mymoid\Api\v1\Client\MymoidConfiguration;
use Mymoid\Api\v1\Schemas\PaymentOrder;
use Mymoid\Tools\LblTableDrawer;

require_once __DIR__ . '/../vendor/autoload.php';

$api_key = ''; // Set your API Key here
$organization_id = ''; // Set your Organization ID here, MANDATORY
$payment_order_id = ''; // MANDATORY
$payment_point_id = ''; // Set your Payment Point ID here, not mandatory
$sandbox = true; // Set to false to use Production environment

// Instantiate the client and configure it
$mymoid_client = new MymoidClient(
    new MymoidConfiguration(
        $api_key,
        $organization_id,
        $payment_point_id,
        $sandbox
    )
);

$get_payment_orders_detail_request = $mymoid_client->getPaymentOrdersDetailRequest(
    $payment_order_id,
    $organization_id
);

$response_object = $get_payment_orders_detail_request->handle()->getResponse();

// Check if response_object is an instance of PaymentOrder
if (!$response_object instanceof PaymentOrder) {
    echo 'Error getting order detail: ' . $response_object->getMessage() . PHP_EOL;

    // If the object has a details ErrorDetail array, iterate over it and show the errors
    if (is_array($response_object->getDetails())) {
        foreach ($response_object->getDetails() as $error) {
            echo 'Error getting order detail: ' . $error->getMessage() . PHP_EOL;
        }
    }

    exit;
}

// Show the Payment Order details
echo 'Payment Order: ' . PHP_EOL . PHP_EOL;

$header_table = [
    'Payment Order ID',
    'Reference',
    'Concept',
    'Currency',
    'Amount',
    'Creation Date',
    'Expiration Date',
    'Status',
    'Short Code'
];

$rows_table = [
    [
        $response_object->getPaymentOrderId(),
        $response_object->getReference(),
        $response_object->getConcept(),
        $response_object->getCurrency(),
        $response_object->getAmount(),
        $response_object->getCreationDate()?->format('Y-m-d H:i:s'),
        $response_object->getExpirationDate()?->format('Y-m-d H:i:s'),
        $response_object->getStatus(),
        $response_object->getShortCode()
    ]
];

LblTableDrawer::drawTable($header_table, $rows_table);

dump($response_object);
