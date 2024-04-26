<?php
/**
 * Class LblTableDrawer
 *
 * @author    MYMOID <support@mymoid.com>
 * @copyright 2024 MYMOID
 * @license   ISC https://opensource.org/license/isc-license-txt
 */

namespace Mymoid\Tools;

class LblTableDrawer
{
    /**
     * Draw a table for the console
     *
     * @param array $headers
     * @param array $rows
     *
     * @return void
     */
    public static function drawTable(array $headers, array $rows)
    {
        $widths = array_map('mb_strlen', $headers);
        foreach ($rows as $row) {
            foreach ($headers as $key => $header) {
                $value = (isset($row[$key]) && $row[$key] !== '' && $row[$key] !== null) ? $row[$key] : '-';
                $widths[$key] = max($widths[$key], mb_strlen($value));
            }
        }

        $line = '+';
        foreach ($widths as $width) {
            $line .= str_repeat('-', $width + 2) . '+';
        }

        echo $line . "\n";
        echo "\033[47;30m| " . implode(' | ', array_map(function ($header, $width) {
            return mb_str_pad($header, $width);
        }, $headers, $widths)) . " |\033[0m\n";
        echo $line . "\n";

        foreach ($rows as $row) {
            $formattedRow = array_map(function ($key) use ($row, $widths) {
                $value = (isset($row[$key]) && $row[$key] !== '' && $row[$key] !== null) ? $row[$key] : '-';
                return mb_str_pad($value, $widths[$key]);
            }, array_keys($headers));

            echo "| " . implode(' | ', $formattedRow) . " |\n";
        }

        echo $line . "\n";
    }
}
