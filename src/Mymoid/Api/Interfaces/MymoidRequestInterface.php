<?php
/**
 * Interface MymoidRequestInterface
 *
 * @author    MYMOID <support@mymoid.com>
 * @copyright 2024 MYMOID
 * @license   ISC https://opensource.org/license/isc-license-txt
 */

namespace Mymoid\Api\Interfaces;

interface MymoidRequestInterface
{
    public function handle();
    public function getEndpoint();
    public function getMethod();
    public function getStatusCode();
    public function getHeaders();
    public function getResponse();
}
