<?php
/**
 * Class Crypto
 *
 * @author    MYMOID <support@mymoid.com>
 * @copyright 2024 MYMOID
 * @license   ISC https://opensource.org/license/isc-license-txt
 * @see       https://developers.mymoid.com/guides/webhooks
 */

namespace Mymoid\Api\v1\Common;

use Mymoid\Api\v1\Exceptions\MymoidException;

class Crypto
{
    /**
     * Sign payload using HMAC SHA256
     *
     * @param array $payload
     *
     * @return string
     * @throws MymoidException
     */
    public function sign($payload)
    {
        if (!$this->isValidPayload($payload)) {
            throw new \InvalidArgumentException('Invalid payload');
        }

        try {
            // 1. Generate the SHA-256 hash of the JSON as a string
            $hash = hash('sha256', json_encode($payload));

            // 2. Convert the generated hash to hexadecimal form
            $hex = bin2hex(hex2bin($hash));

            // 3. Encode the hexadecimal signature in Base64
            return base64_encode($hex);
        } catch (\Exception $e) {
            throw new MymoidException('Error generating signature: ' . $e->getMessage(), $e->getCode(), $e);
        }
    }

    /**
     * Verify the payload with the given signature
     *
     * @param array $payload
     * @param string $signature
     *
     * @return bool
     * @throws MymoidException|\InvalidArgumentException
     */
    public function verify($payload, $signature)
    {
        if (!$this->isValidPayload($payload)) {
            throw new \InvalidArgumentException('Invalid payload');
        }

        $calculatedSignature = $this->sign($payload);

        return hash_equals($calculatedSignature, $signature);
    }

    /**
     * Validate the payload
     *
     * @param array $payload
     *
     * @return bool
     */
    private function isValidPayload($payload)
    {
        if (
            !isset($payload['payment_order_id'])
            || !isset($payload['status'])
            || !isset($payload['reference'])
            || !isset($payload['amount'])
            || !isset($payload['currency'])
            || !isset($payload['creation_date'])
            || !isset($payload['purchase_order'])
            || !isset($payload['payment_method_id'])
            || !isset($payload['payment_method_type'])
            || !isset($payload['app_sign_key'])
        ) {
            return false;
        }

        return true;
    }
}
