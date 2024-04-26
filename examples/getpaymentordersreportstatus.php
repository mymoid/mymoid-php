<?php
/**
 * Sample: getting a Payment Orders Report status
 *
 * @author    MYMOID <support@mymoid.com>
 * @copyright 2024 MYMOID
 * @license   ISC https://opensource.org/license/isc-license-txt
 */

use Mymoid\Api\v1\Client\MymoidClient;
use Mymoid\Api\v1\Client\MymoidConfiguration;
use Mymoid\Api\v1\Schemas\Report;
use Mymoid\Tools\LblTableDrawer;

require_once __DIR__ . '/../vendor/autoload.php';

$api_key = ''; // Set your API Key here
$organization_id = ''; // Set your Organization ID here, MANDATORY
$report_id = ''; // Set your Report ID here, MANDATORY
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

$get_payment_orders_report_status_request = $mymoid_client->getPaymentOrdersReportStatusRequest(
    $report_id,
    $organization_id
);
$response_object = $get_payment_orders_report_status_request->handle()->getResponse();

// Check if response_object is a Report
if (!$response_object instanceof Report) {
    echo 'Error getting report: ' . $response_object->getMessage() . PHP_EOL;

    // If the object has a details ErrorDetail array, iterate over it and show the errors
    if (is_array($response_object->getDetails())) {
        foreach ($response_object->getDetails() as $error) {
            echo 'Error getting report: ' . $error->getMessage() . PHP_EOL;
        }
    }

    exit;
}

// Show the Report
echo 'Report: ' . PHP_EOL . PHP_EOL;

$header_table = [
    'File ID',
    'Status',
    'File Path',
    'File Size'
];

$data_table = [
    [
        $response_object->getId(),
        $response_object->getStatus(),
        $response_object->getFilePath(),
        $response_object->getFileSize()
    ]
];

LblTableDrawer::drawTable($header_table, $data_table);
