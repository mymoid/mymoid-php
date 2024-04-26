<?php
/**
 * Class MymoidConfiguration
 *
 * @author    MYMOID <support@mymoid.com>
 * @copyright 2024 MYMOID
 * @license   ISC https://opensource.org/license/isc-license-txt
 */

namespace Mymoid\Api\v1\Client;

class MymoidConfiguration
{
    /** @var string Api key (token for authorization) */
    private $x_api_key = '';

    /** @var string Organization identifier. Example: 3b60bd86-4c4f-4c25-8a64-3b5fbb065d61 */
    private $x_organization_id = '';

    /** @var string Payment point id */
    private $x_payment_point_id = '';

    /** @var bool Sandbox mode */
    private $sandbox = false;

    public function __construct(
        $x_api_key,
        $x_organization_id,
        $x_payment_point_id,
        $sandbox = false
    ) {
        $this->x_api_key = $x_api_key;
        $this->x_organization_id = $x_organization_id;
        $this->x_payment_point_id = $x_payment_point_id;
        $this->sandbox = $sandbox;
    }

    /**
     * Get the API key
     *
     * @return string
     */
    public function getApiKey()
    {
        return $this->x_api_key;
    }

    /**
     * Get the organization identifier
     *
     * @return string
     */
    public function getOrganizationId()
    {
        return $this->x_organization_id;
    }

    /**
     * Get the payment point identifier
     *
     * @return string
     */
    public function getPaymentPointId()
    {
        return $this->x_payment_point_id;
    }

    /**
     * Get the sandbox mode
     *
     * @return bool
     */
    public function isSandbox()
    {
        return $this->sandbox;
    }
}
