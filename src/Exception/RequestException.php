<?php

namespace getui\Exception;

use Exception;

/**
 * Class RequestException
 * @package getui\Exception
 */
class RequestException extends Exception implements ExceptionInterface
{
    var $requestId;

    public function __construct($requestId, $message, $e)
    {
        parent::__construct($message, $e);
        $this->requestId = $requestId;
    }

    public function getRequestId()
    {
        return $this->requestId;
    }
}