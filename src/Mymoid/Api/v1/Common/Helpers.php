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
    public static function snakeCaseToCamelCase(string $snake_case): string
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
    public static function snakeCaseToPascalCase(string $snake_case): string
    {
        return str_replace('_', '', ucwords($snake_case, '_'));
    }

    /**
     * Check if method is a magic method
     *
     * @param string $method
     *
     * @return bool
     */
    public static function isMagicMethod(string $method): bool
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
