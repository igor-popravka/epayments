<?php

namespace Console\Exception;

use Throwable;

class ConsoleException extends \Exception implements ExceptionInterface
{
    /**
     * Create new exception instance
     *
     * @param string $message
     * @param int $code
     * @param Throwable|null $previous
     *
     * @return static
     * @author Igor Popravka <igor.popravka@tstechpro.com>
     */
    public static function create($message = "", $code = 0, Throwable $previous = null)
    {
        return new static($message, $code, $previous);
    }
}