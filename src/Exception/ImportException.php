<?php

namespace ImportFrame\Exception;

use Exception;
use Throwable;

/**
 * class ImportException
 *
 * Exception is the base class for
 * all Exceptions in ImportFrame package.
 *
 *
 * @author MishaK<mixapiy@yandex.ru>
 * @version 1.0
 * @package ImportFrame
 */

class ImportException extends Exception implements IException
{
    const ERROR_UNKNOWN = 0;
    const ERROR_RUN = 1;

    /**
     * Dictionary code error => text error
     * @see ImportException::getText()
     * @var array
     */
    protected $dictionary;

    /**
     * Returns a text message from the dictionary by code
     * @param $code integer
     * @return string
     */
    protected function getText($code)
    {
        if (array_key_exists($code, $this->dictionary)) {
            return $this->dictionary[$code];
        }
        return $this->dictionary[self::ERROR_UNKNOWN];
    }

    /**
     * The resulting text message is collected
     * @param $message 'text error'
     * @param $val 'value error'
     * @return string
     */
    protected function buildMessage($message, $val)
    {
        if ($val) {
            return $message . "\n" . $val;
        }
        return $message;
    }

    /**
     * Method initializes dictionary
     */
    protected function initializeDictionaryError()
    {
        $this->dictionary = [
            self::ERROR_UNKNOWN => "Unknown import Error.",
            self::ERROR_RUN => "Run error.",
        ];
    }

    /**
     * Get dictionary
     * @return array
     */
    protected function getDictionary()
    {
        return $this->dictionary;
    }

    /**
     * ImportException constructor.
     * @param string $val error value
     * @param int $code error code
     * @param Throwable|null $previous
     */
    function __construct($val = '', $code = 0,Throwable $previous = null)
    {
        $this->initializeDictionaryError();
        parent::__construct($this->buildMessage($this->getText($code), $val), $code, $previous);
    }
}