<?php
/**
 * Class GetPaymentOrdersReportStatus
 *
 * @author    MYMOID <support@mymoid.com>
 * @copyright 2024 MYMOID
 * @license   ISC https://opensource.org/license/isc-license-txt
 */

namespace Mymoid\Api\v1\Requests\Payment;

use Mymoid\Api\v1\Common\Constants;
use Mymoid\Api\v1\Requests\MymoidRequest;

class GetPaymentOrdersReportStatus extends MymoidRequest
{
    protected $endpoint = '/payment-orders/reports/{report_id}';
    protected $method = 'GET';
    protected $status_code = 0;
    protected $headers = [];
    protected $query_params = [
        'organization_id' => null,
    ];
    protected $path_params = [
        'report_id' => '',
    ];

    public function __construct(
        $report_id,
        $organization_id,
        $mmclient,
        $object,
        $object_response = null
    ) {
        $this->mmclient = $mmclient;
        $this->object = $object;
        $this->object_type = get_class($object);

        if (!is_null($object_response)) {
            $this->object_type_response = get_class($object_response);
        }

        $this->setPathParam('report_id', $report_id);
        $this->setQueryParam('organization_id', $organization_id);

        if ($this->mmclient->getConfiguration()->isSandbox()) {
            $this->url = Constants::SANDBOX_SERVER . Constants::MYMOID_API_VERSION . $this->endpoint;
        } else {
            $this->url = Constants::PRODUCTION_SERVER . Constants::MYMOID_API_VERSION . $this->endpoint;
        }
    }
}
