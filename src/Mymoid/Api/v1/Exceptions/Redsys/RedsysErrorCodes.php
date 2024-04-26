<?php
/**
 * Class RedsysErrorCodes
 *
 * @author    MYMOID <support@mymoid.com>
 * @copyright 2024 MYMOID
 * @license   ISC https://opensource.org/license/isc-license-txt
 * @see       https://developers.mymoid.com/guides/processor-error-code
 */

namespace Mymoid\Api\v1\Exceptions\Redsys;

class RedsysErrorCodes
{
    private array $error_codes = [
        'SIS0001' => 'Card expired',
        'SIS0002' => 'Card number incorrect',
        'SIS0003' => 'CVV Incorrect',
        'SIS0004' => 'Card type not accepted',
        'SIS0005' => 'Insufficient funds',
        'SIS0006' => 'Suspect fraud',
        'SIS0007' => 'Cardholder dispute',
        'SIS0008' => 'Transaction not allowed',
        'SIS0009' => 'Duplicate transaction',
        'SIS0010' => 'Invalid amount',
        'SIS0011' => 'Invalid merchant',
        'SIS0012' => 'Invalid currency',
        'SIS0013' => 'Authentication failed',
        'SIS0014' => 'Invalid card issuer',
        'SIS0015' => 'Getway error',
    ];

    /**
     * Gets the error message by code
     *
     * @param string $code
     *
     * @return string
     */
    public function getErrorMessageByCode(string $code): string
    {
        return $this->error_codes[$code] ?? 'Unknown error';
    }
}
