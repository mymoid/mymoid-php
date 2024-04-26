<?php
/**
 * Sample: paying with token
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
$payment_order_id = ''; // Your Payment Order ID (create a payment order first)
$token = ''; // The token to pay with
$organization_id = ''; // Set your Organization ID here, not mandatory
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

$pay_with_token_request = $mymoid_client->payWithTokenRequest($payment_order_id, $token);
$response_object = $pay_with_token_request->handle()->getResponse();

// Check if response_object is an instance of PaymentOrder
if (!$response_object instanceof PaymentOrder) {
    echo 'Error paying with token: ' . $response_object->getMessage() . PHP_EOL;

    // If the object has a details ErrorDetail array, iterate over it and show the errors
    if (is_array($response_object->getDetails())) {
        foreach ($response_object->getDetails() as $error) {
            echo 'Error paying with token: ' . $error->getMessage() . PHP_EOL;
        }
    }

    exit;
}

// Show the payment order details
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
        $response_object->getCreationDate() ? $response_object->getCreationDate()->format('Y-m-d H:i:s') : null,
        $response_object->getExpirationDate() ? $response_object->getExpirationDate()->format('Y-m-d H:i:s') : null,
        $response_object->getStatus(),
        $response_object->getShortCode()
    ]
];

LblTableDrawer::drawTable($header_table, $rows_table);

dump($response_object);