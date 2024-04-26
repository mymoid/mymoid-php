<?php
/**
 * Sample: getting a list of Payment Orders
 *
 * @author    MYMOID <support@mymoid.com>
 * @copyright 2024 MYMOID
 * @license   ISC https://opensource.org/license/isc-license-txt
 */

use Mymoid\Api\v1\Client\MymoidClient;
use Mymoid\Api\v1\Client\MymoidConfiguration;
use Mymoid\Api\v1\Schemas\Pagination;
use Mymoid\Api\v1\Schemas\PaymentOrder;
use Mymoid\Api\v1\Schemas\Requests\PaymentOrderFilterRequest;
use Mymoid\Tools\LblTableDrawer;

require_once __DIR__ . '/../vendor/autoload.php';

$api_key = ''; // Set your API Key here
$organization_id = ''; // Set your Organization ID here, MANDATORY
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

// Create a filter to get the list of Payment Orders
$filter = new PaymentOrderFilterRequest();
$filter->setOrganizationId($organization_id);
//$filter->setQ('Text to search');
$filter->setStatus(['EXPIRED', 'AVAILABLE']);

$get_payment_orders_list_request = $mymoid_client->getPaymentOrdersListRequest($filter);
$response_object = $get_payment_orders_list_request->handle()->getResponse();

// Check if response_object is an instance of Pagination
if (!$response_object instanceof Pagination) {
    echo 'Error listing orders: ' . $response_object->getMessage() . PHP_EOL;

    // If the object has a details ErrorDetail array, iterate over it and show the errors
    if (is_array($response_object->getDetails())) {
        foreach ($response_object->getDetails() as $error) {
            echo 'Error listing orders: ' . $error->getMessage() . PHP_EOL;
        }
    }

    exit;
}

if ($response_object->getTotalElements() == 0) {
    echo 'No Payment Orders found';

    exit;
}

// Show the total number of Payment Orders
echo 'Total Payment Orders: ' . $response_object->getTotalElements() . PHP_EOL . PHP_EOL;

// Get the list of Payment Orders
$payment_content = $response_object->getContent();
$payments_array = [];

foreach ($payment_content as $payment) {
    $payments_array[] = (new PaymentOrder())->parseFromArray($payment);
}

$first_payment = array_shift($payments_array);

// Show the first Payment Order
echo 'First Payment Order: ' . PHP_EOL;

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

$rows_table = [];

// We need to loop over the pagination content to get the Payment Orders
foreach ($payments_array as $payment) {
    array_push($rows_table, [
        $payment->getPaymentOrderId(),
        $payment->getReference(),
        $payment->getConcept(),
        $payment->getCurrency(),
        $payment->getAmount(),
        $payment->getCreationDate()?->format('Y-m-d H:i:s'),
        $payment->getExpirationDate()?->format('Y-m-d H:i:s'),
        $payment->getStatus(),
        $payment->getShortCode()
    ]);
}

LblTableDrawer::drawTable($header_table, $rows_table);

dump($first_payment);
