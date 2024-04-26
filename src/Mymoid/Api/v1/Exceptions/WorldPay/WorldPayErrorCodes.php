<?php
/**
 * Class WorldPayErrorCodes
 *
 * @author    MYMOID <support@mymoid.com>
 * @copyright 2024 MYMOID
 * @license   ISC https://opensource.org/license/isc-license-txt
 * @see       https://developers.mymoid.com/guides/processor-error-code
 */

namespace Mymoid\Api\v1\Exceptions\WorldPay;

class WorldPayErrorCodes
{
    private array $error_codes = [
        2 => 'Invalid payment amount',
        3 => 'Invalid currency code',
        4 => 'Invalid card number',
        5 => 'Invalid expiry date',
        6 => 'Invalid issue number',
        7 => 'Invalid CVV number',
        8 => 'Invalid card type',
        9 => 'Invalid cardholder name',
        10 => 'Invalid address',
        11 => 'Invalid postcode',
        12 => 'Invalid country code',
        13 => 'Invalid email address',
        14 => 'Invalid telephone number',
        15 => 'Invalid transaction ID',
        16 => 'Invalid authorization code',
        17 => 'Invalid response code',
        18 => 'Invalid settlement date',
        19 => 'Invalid batch number',
        20 => 'Invalid transaction type',
        21 => 'Invalid merchant number',
        22 => 'Invalid store number',
        23 => 'Invalid terminal ID',
        24 => 'Invalid transaction status',
        25 => 'Invalid account number',
        26 => 'Invalid routing number',
        27 => 'Invalid card status',
        28 => 'Invalid card issuer',
        29 => 'Invalid card scheme',
        30 => 'Invalid card acquirer',
    ];

    /**
     * Gets the error message by code
     *
     * @param int $code
     *
     * @return string
     */
    public function getErrorMessageByCode(int $code): string
    {
        return $this->error_codes[$code] ?? 'Unknown error';
    }
}
