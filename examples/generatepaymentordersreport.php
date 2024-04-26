<?php
/**
 * Sample: generating a Payment Orders Report
 *
 * @author    MYMOID <support@mymoid.com>
 * @copyright 2024 MYMOID
 * @license   ISC https://opensource.org/license/isc-license-txt
 */

use Mymoid\Api\v1\Client\MymoidClient;
use Mymoid\Api\v1\Client\MymoidConfiguration;
use Mymoid\Api\v1\Schemas\Report;
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
$filter->setStartDate(new DateTime('2021-01-01 00:00:00'));
$filter->setEndDate(new DateTime());

$generate_payment_orders_report_request = $mymoid_client->generatePaymentOrdersReportRequest($filter);
$response_object = $generate_payment_orders_report_request->handle()->getResponse();

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

$report_data = [
    [
        $response_object->getId(),
        $response_object->getStatus(),
        $response_object->getFilePath(),
        $response_object->getFileSize()
    ]
];

LblTableDrawer::drawTable($header_table, $report_data);

// Download the report
echo PHP_EOL . 'Downloading report...' . PHP_EOL;

$report_file = file_get_contents($response_object->getFilePath());
file_put_contents(basename(__DIR__ . '/'. $response_object->getFilePath()), $report_file);

echo 'Report downloaded to ' . basename(__DIR__ . '/'. $response_object->getFilePath()) . PHP_EOL;
