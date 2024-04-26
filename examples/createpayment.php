<?php
/**
 * Sample: creating a Payment Order
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

// Create a Payment Order
$payment_order = new PaymentOrder();
$payment_order->setReference('ABCDEF1234567890');
$payment_order->setConcept('Test payment using SDK');
$payment_order->setCurrency('EUR');
$payment_order->setAmount(1000); // 10.00 EUR

$time_24_hours_from_now_plus_10_minutes = new DateTime();
$time_24_hours_from_now_plus_10_minutes->add(new DateInterval('P1D'));
$time_24_hours_from_now_plus_10_minutes->add(new DateInterval('PT10M'));

// The payment should be, at least, 1 day greather than now
$payment_order->setExpirationDate(
    $time_24_hours_from_now_plus_10_minutes
);

$create_payment_request = $mymoid_client->createPaymentOrderRequest($payment_order);
$response_object = $create_payment_request->handle()->getResponse();

// Check if response_object is an instance of PaymentOrder
if (!$response_object instanceof PaymentOrder) {
    echo 'Error creating payment: ' . $response_object->getMessage() . PHP_EOL;

    // If the object has a details ErrorDetail array, iterate over it and show the errors
    if (is_array($response_object->getDetails())) {
        foreach ($response_object->getDetails() as $error) {
            echo 'Error creating payment: ' . $error->getMessage() . PHP_EOL;
        }
    }

    exit;
}

echo 'Payment created successfully. Visit: ' . $create_payment_request->getPaymentURL() . PHP_EOL . PHP_EOL;

// Show the Payment Order
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
