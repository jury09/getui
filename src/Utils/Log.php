<?php

namespace getui\Utils;

class Log
{
    static $debug = true;

    public static function debug($log)
    {
        if (Log::$debug)
        {
            echo date('y-m-d h:i:s', time()) . ($log) . "\r\n";
        }
    }
}