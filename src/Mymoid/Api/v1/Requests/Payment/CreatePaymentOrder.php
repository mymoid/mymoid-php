<?php
/**
 * Class CreatePaymentOrder
 *
 * @author    MYMOID <support@mymoid.com>
 * @copyright 2024 MYMOID
 * @license   ISC https://opensource.org/license/isc-license-txt
 */

namespace Mymoid\Api\v1\Requests\Payment;

use Mymoid\Api\v1\Common\Constants;
use Mymoid\Api\v1\Exceptions\MymoidException;
use Mymoid\Api\v1\Requests\MymoidRequest;
use Mymoid\Api\v1\Schemas\PaymentOrder;

class CreatePaymentOrder extends MymoidRequest
{
    protected $endpoint = '/payment-orders';
    protected $method = 'POST';
    protected $status_code = 0;
    protected $headers = [];

    /**
     * Returns the Payment URL to redirect the user to complete the payment
     *
     * @return string
     * @throws MymoidException
     */
    public function getPaymentURL()
    {
        $response_object = $this->getResponse();

        // Check if response_object is an instance of PaymentOrder
        if (!$response_object instanceof PaymentOrder) {
            throw new MymoidException('A payment must be created before getting the payment URL');
        }

        if ($this->mmclient->getConfiguration()->isSandbox()) {
            return Constants::SANDBOX_TPV_URL . '/?' . Constants::TPV_SHORTCODE_PARAM
                . '=' . $response_object->getShortCode();
        }

        return Constants::PRODUCTION_TPV_URL . '/?' . Constants::TPV_SHORTCODE_PARAM
            . '=' . $response_object->getShortCode();
    }
}
