<?php

namespace getui\Core;

class TagMessage extends Message
{

    public $appIdList;
    public $tag;
    public $speed = 0;

    public function __construct()
    {
        parent::__construct();
    }

    public function get_appIdList()
    {
        return $this->appIdList;
    }

    public function set_appIdList($appIdList)
    {
        $this->appIdList = $appIdList;
    }

    public function get_tag()
    {
        return $this->tag;
    }

    public function set_tag($tag)
    {
        $this->tag = $tag;
    }

    public function get_speed()
    {
        return $this->speed;
    }

    public function set_speed($speed)
    {
        $this->speed = $speed;
    }
}