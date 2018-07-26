<?php

namespace getui\Core;

class Message
{
    public $isOffline;
    /*
     * 过多久该消息离线失效（单位毫秒） 支持1-72小时*3600000秒，默认1小时
     */
    public $offlineExpireTime;

    /**
     * 0:联网方式不限;1:仅wifi;2:仅4G/3G/2G
     */
    public $pushNetWorkType = 0;

    public $data;

    public function __construct()
    {
    }

    public function get_isOffline()
    {
        return $this->isOffline;
    }

    public function set_isOffline($isOffline)
    {
        return $this->isOffline = $isOffline;
    }

    public function get_offlineExpireTime()
    {
        return $this->offlineExpireTime;
    }

    public function set_offlineExpireTime($offlineExpireTime)
    {
        return $this->offlineExpireTime = $offlineExpireTime;
    }

    public function get_pushNetWorkType()
    {
        return $this->pushNetWorkType;
    }

    public function set_pushNetWorkType($pushNetWorkType)
    {
        return $this->pushNetWorkType = $pushNetWorkType;
    }

    public function get_data()
    {
        return $this->data;
    }

    public function set_data($data)
    {
        return $this->data = $data;
    }
}