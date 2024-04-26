<?php
/**
 * Sample: getting a Payment Method
 *
 * @author    MYMOID <support@mymoid.com>
 * @copyright 2024 MYMOID
 * @license   ISC https://opensource.org/license/isc-license-txt
 */

use Mymoid\Api\v1\Client\MymoidClient;
use Mymoid\Api\v1\Client\MymoidConfiguration;
use Mymoid\Api\v1\Schemas\PaymentMethod;
use Mymoid\Tools\LblTableDrawer;

require_once __DIR__ . '/../vendor/autoload.php';

$api_key = ''; // Set your API Key here
$organization_id = ''; // Set your Organization ID here
$payment_method_id = ''; // MANDATORY
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

$get_payment_method_request = $mymoid_client->getPaymentMethodRequest($payment_method_id);
$response_object = $get_payment_method_request->handle()->getResponse();

// Check if response_object is an instance of PaymentMethod
if (!$response_object instanceof PaymentMethod) {
    echo 'Error getting payment method: ' . $response_object->getMessage() . PHP_EOL;

    // If the object has a details ErrorDetail array, iterate over it and show the errors
    if (is_array($response_object->getDetails())) {
        foreach ($response_object->getDetails() as $error) {
            echo 'Error getting payment method: ' . $error->getMessage() . PHP_EOL;
        }
    }

    exit;
}

// Show the Payment Method
echo 'Payment Method: ' . PHP_EOL . PHP_EOL;

$header_table = [
    'ID',
    'Type',
    'First Usage',
    'Details'
];

$rows_table = [
    [
        $response_object->getId(),
        $response_object->getType(),
        $response_object->getFirstUsage()->format('Y-m-d H:i:s'),
        $response_object->getDetails()->getCardBrand() . ' ' . $response_object->getDetails()->getCardType()
        . ' ' . $response_object->getDetails()->getFirstNumbers() . '...'
        . $response_object->getDetails()->getLastNumbers()
    ]
];

LblTableDrawer::drawTable($header_table, $rows_table);

dump($response_object);
