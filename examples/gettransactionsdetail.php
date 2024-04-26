<?php
/**
 * Sample: getting a Transaction details
 *
 * @author    MYMOID <support@mymoid.com>
 * @copyright 2024 MYMOID
 * @license   ISC https://opensource.org/license/isc-license-txt
 */

use Mymoid\Api\v1\Client\MymoidClient;
use Mymoid\Api\v1\Client\MymoidConfiguration;
use Mymoid\Api\v1\Schemas\TransactionDetail;
use Mymoid\Tools\LblTableDrawer;

require_once __DIR__ . '/../vendor/autoload.php';

$api_key = ''; // Set your API Key here
$organization_id = ''; // Set your Organization ID here, MANDATORY
$transaction_id = ''; // MANDATORY
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

$get_transactions_detail_request = $mymoid_client->getTransactionsDetailRequest(
    $transaction_id,
    $organization_id
);

$response_object = $get_transactions_detail_request->handle()->getResponse();

// Check if response_object is an instance of TransactionDetail
if (!$response_object instanceof TransactionDetail) {
    echo 'Error getting transaction detail: ' . $response_object->getMessage() . PHP_EOL;

    // If the object has a details ErrorDetail array, iterate over it and show the errors
    if (is_array($response_object->getDetails())) {
        foreach ($response_object->getDetails() as $error) {
            echo 'Error getting transaction detail: ' . $error->getMessage() . PHP_EOL;
        }
    }

    exit;
}

// Show the Transaction
echo 'Transaction: ' . PHP_EOL . PHP_EOL;

$header_table = [
    'Transaction ID',
    'Amount',
    'Creation Date',
    'Currency',
    'Type',
    'Purchase Order',
    'Authorization Code',
    'Payment Method',
];

$rows_table = [
    [
        $response_object->getId(),
        $response_object->getAmount(),
        $response_object->getCreationDate() ? $response_object->getCreationDate()->format('Y-m-d H:i:s') : null,
        $response_object->getCurrency(),
        $response_object->getType(),
        $response_object->getPurchaseOrder(),
        $response_object->getAuthorizationCode(),
        $response_object->getPaymentMethod()->getType(),
    ]
];

LblTableDrawer::drawTable($header_table, $rows_table);

dump($response_object);
