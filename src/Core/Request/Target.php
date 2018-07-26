<?php

namespace getui\Core\Request;

use getui\Protobuf\Message;

class Target extends Message
{
    public $wired_type = Message::WIRED_LENGTH_DELIMITED;

    public function __construct($reader = null)
    {
        parent::__construct($reader);
        $this->fields["1"] = "\\getui\\Protobuf\\Type\\PbString";
        $this->values["1"] = "";
        $this->fields["2"] = "\\getui\\Protobuf\\Type\\PbString";
        $this->values["2"] = "";
    }

    public function appId()
    {
        return $this->_get_value("1");
    }

    public function set_appId($value)
    {
        return $this->_set_value("1", $value);
    }

    public function clientId()
    {
        return $this->_get_value("2");
    }

    public function set_clientId($value)
    {
        return $this->_set_value("2", $value);
    }
}