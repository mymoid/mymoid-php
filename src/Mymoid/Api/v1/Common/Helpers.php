<?php
/**
 * Class Helpers
 *
 * @author    MYMOID <support@mymoid.com>
 * @copyright 2024 MYMOID
 * @license   ISC https://opensource.org/license/isc-license-txt
 */

namespace Mymoid\Api\v1\Common;

class Helpers
{
    /**
     * Convert snake_case to camelCase
     *
     * @param string $snake_case
     *
     * @return string
     */
    public static function snakeCaseToCamelCase($snake_case)
    {
        return lcfirst(str_replace('_', '', ucwords($snake_case, '_')));
    }

    /**
     * Convert snake_case to PascaleCase
     *
     * @param string $snake_case
     *
     * @return string
     */
    public static function snakeCaseToPascalCase($snake_case)
    {
        return str_replace('_', '', ucwords($snake_case, '_'));
    }

    /**
     * Check if method is a magic method
     *
     * @param string $method
     *
     * @return bool
     *
     * @see https://owasp.org/www-community/vulnerabilities/PHP_Object_Injection
     */
    public static function isMagicMethod($method)
    {
        return in_array($method, [
            '__construct',
            '__destruct',
            '__call',
            '__callStatic',
            '__get',
            '__set',
            '__isset',
            '__unset',
            '__sleep',
            '__wakeup',
            '__toString',
            '__invoke',
            '__set_state',
            '__clone',
            '__debugInfo',
        ]);
    }
}
