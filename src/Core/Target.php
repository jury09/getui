<?php

namespace getui\Core;

class Target
{
    public $appId;

    public $clientId;

    public $alias;


    public function __construct()
    {

    }

    public function get_appId()
    {
        return $this->appId;
    }

    public function set_appId($appId)
    {
        return $this->appId = $appId;
    }

    public function get_clientId()
    {
        return $this->clientId;
    }

    public function set_clientId($clientId)
    {
        return $this->clientId = $clientId;
    }

    public function set_alias($alias)
    {
        return $this->alias = $alias;
    }

    public function get_alias()
    {
        return $this->alias;
    }
}