<?php

namespace getui\Utils;

class ApiRespect
{
    static $appkeyAndFasterHost = array();
    static $appKeyAndHost = array();
    static $appkeyAndLastExecuteTime = array();

    public static function getFastest($appkey, $hosts)
    {
        if ($hosts == null || count($hosts) == 0) {
            throw new \Exception("Hosts cann't be null or size must greater than 0");
        }
        if (isset(ApiRespect::$appkeyAndFasterHost[$appkey]) && count(array_diff($hosts, isset(ApiRespect::$appKeyAndHost[$appkey]) ? ApiRespect::$appKeyAndHost[$appkey] : null)) == 0) {
            return ApiRespect::$appkeyAndFasterHost[$appkey];
        } else {
            $fastest = ApiRespect::getFastestRealTime($hosts);
            ApiRespect::$appKeyAndHost[$appkey] = $hosts;
            ApiRespect::$appkeyAndFasterHost[$appkey] = $fastest;
            return $fastest;
        }
    }

    public static function getFastestRealTime($hosts)
    {
        $mint = 60.0;
        $s_url = "";
        for ($i = 0; $i < count($hosts); $i++) {
            $start = array_sum(explode(" ", microtime()));
            try {
                $homepage = Http::httpHead($hosts[$i]);
            } catch (\Exception $e) {
                echo($e);
            }
            $ends = array_sum(explode(" ", microtime()));
            $diff = $ends - $start;
            if ($mint > $diff) {
                $mint = $diff;
                $s_url = $hosts[$i];
            }
        }
        return $s_url;
    }
}