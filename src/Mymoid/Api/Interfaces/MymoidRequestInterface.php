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
    public function handle(): self;
    public function getEndpoint(): string;
    public function getMethod(): string;
    public function getStatusCode(): int;
    public function getHeaders(): array;
    public function getResponse(): mixed;
}
