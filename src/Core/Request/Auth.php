<?php

namespace getui\Core\Request;

use getui\Protobuf\Message;

class Auth extends Message
{
    public $wired_type = Message::WIRED_LENGTH_DELIMITED;

    public function __construct($reader = null)
    {
        parent::__construct($reader);
        $this->fields["1"] = "\\getui\\Protobuf\\Type\\PbString";
        $this->values["1"] = "";
        $this->fields["2"] = "\\getui\\Protobuf\\Type\\PbString";
        $this->values["2"] = "";
        $this->fields["3"] = "\\getui\\Protobuf\\Type\\PbInt";
        $this->values["3"] = "";
        $this->fields["4"] = "\\getui\\Protobuf\\Type\\PbString";
        $this->values["4"] = "";
    }

    public function sign()
    {
        return $this->_get_value("1");
    }

    public function set_sign($value)
    {
        return $this->_set_value("1", $value);
    }

    public function appkey()
    {
        return $this->_get_value("2");
    }

    public function set_appkey($value)
    {
        return $this->_set_value("2", $value);
    }

    public function timestamp()
    {
        return $this->_get_value("3");
    }

    public function set_timestamp($value)
    {
        return $this->_set_value("3", $value);
    }

    public function seqId()
    {
        return $this->_get_value("4");
    }

    public function set_seqId($value)
    {
        return $this->_set_value("4", $value);
    }
}