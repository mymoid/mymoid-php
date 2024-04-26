<?php
/**
 * Class MymoidException
 *
 * @author    MYMOID <support@mymoid.com>
 * @copyright 2024 MYMOID
 * @license   ISC https://opensource.org/license/isc-license-txt
 */

namespace Mymoid\Api\v1\Exceptions;

use Exception;

class MymoidException extends Exception
{
    /** @var Exception */
    private Exception $previous;

    /**
     * MymoidException constructor
     *
     * @param string $message
     * @param int $code
     * @param Exception|null $previous
     */
    public function __construct(string $message, int $code = 0, Exception $previous = null)
    {
        $this->message = $message;
        $this->code = $code;

        if (!is_null($previous)) {
            $this->previous = $previous;
        }

        parent::__construct($message, $code, $previous);

        header('HTTP/1.1 ' . $code . ' Bad Request');
        echo json_encode([
            'code' => $code,
            'message' => $message,
            'error' => $message,
        ]);
    }

    /**
     * String representation of the exception
     *
     * @return string
     */
    public function __toString()
    {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }
}
