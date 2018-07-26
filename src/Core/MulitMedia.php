<?php

namespace getui\Core;

class MultiMedia
{
    /**
     * @var int $rid
     */
    public $rid;
    /**
     * @var string $url 资源url
     */
    public $url;

    /**
     * @var string $type 资源类型
     */
    public $type;

    /**
     * @var bool $onlywifi 是否只支持wifi下发
     */
    public $onlywifi = 0;

    public function __construct()
    {
    }

    public function get_rid()
    {
        return $this->rid;
    }

    public function set_rid($rid)
    {
        $this->rid = $rid;
        return $this;
    }

    public function get_url()
    {
        return $this->url;
    }

    public function set_url($url)
    {
        $this->url = $url;
        return $this;
    }

    public function get_type()
    {
        return $this->type;
    }

    public function set_type($type)
    {
        $this->type = $type;
        return $this;
    }

    public function set_onlywifi($onlywifi)
    {
        $this->onlywifi = $onlywifi ? 1 : 0;
        return $this;
    }

    public function get_onlywifi()
    {
        return $this->onlywifi;
    }
}