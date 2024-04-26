<?php
/**
 * Class Constants
 *
 * @author    MYMOID <support@mymoid.com>
 * @copyright 2024 MYMOID
 * @license   ISC https://opensource.org/license/isc-license-txt
 */

namespace Mymoid\Api\v1\Common;

final class Constants
{
    public const MYMOID_API_VERSION = 'v1';

    public const MYMOID_CLIENT_VERSION = '1.0.0';

    public const SANDBOX_SERVER = 'https://apis.san.mymoid.com/payments/';

    public const PRODUCTION_SERVER = 'https://apis.mymoid.com/payments/';

    public const SANDBOX_TPV_URL = 'https://sandbox-tpv.mymoid.com';

    public const PRODUCTION_TPV_URL = 'https://tpv.mymoid.com';

    public const TPV_SHORTCODE_PARAM = 'p';

    public const ALLOWED_ORDER_STATUSES = [
        'AVAILABLE',
        'PARTIALLY_PREAUTH',
        'PREAUTH',
        'PREAUTH_REFUNDED',
        'PREAUTH_EXPIRED',
        'PAID',
        'PARTIALLY_REFUNDED',
        'REFUNDED',
        'CANCELLED',
        'EXPIRED',
    ];

    public const ALLOWED_HTTP_ERROR_STATUSES = [
        400,
        401,
        403,
        404,
        500,
    ];

    public const ALLOWED_ORIGINS = [
        'MYMOID',
        'PROCESSOR',
        'API_GATEWAY',
    ];

    public const ALLOWED_REPORT_FILE_STATUSES = [
        'PENDING',
        'SUCCESS',
        'UPLOADED',
    ];

    public const ALLOWED_PAYMENT_METHOD_TYPES = [
        'CREDITCARD',
        'CARD',
        'BIZUM',
    ];

    public const ALLOWED_CARD_VALUES = [
        'CREDITCARD',
    ];

    public const ALLOWED_CARD_TYPES = [
        'DEBIT',
        'CREDIT',
    ];

    public const ALLOWED_CARD_BRANDS = [
        'MASTERCARD',
        'VISA',
        'MAESTRO',
    ];

    public const ALLOWED_BIZUM_VALUES = [
        'BIZUM',
    ];

    public const ALLOWED_TRANSACTION_TYPES = [
        'PAYMENT',
        'DENIAL',
        'REFUND',
    ];

    public const ALLOWED_CURRENCIES = [
        'EUR',
        'MXN',
        'PLN',
        'ARS',
    ];

    public const CURRENCIES_SYMBOLS = [
        'EUR' => '€', // euro
        'MXN' => '$', // mexican peso
        'PLN' => 'zł', // zloty
        'ARS' => '$', // argentinian peso
    ];

    public const MAX_ORDER_AMOUNT = 9999999;

    public const DATE_VARIABLE_NAMES = [
        'start_date',
        'end_date',
        'expiration_date',
        'creation_date',
        'first_usage',
    ];
}
