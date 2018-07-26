<?php

namespace getui\Core\Request;

use getui\Protobuf\Message;

class InnerFiled extends Message
{
    public $wired_type = Message::WIRED_LENGTH_DELIMITED;

    public function __construct($reader = null)
    {
        parent::__construct($reader);
        $this->fields["1"] = "\\getui\\Protobuf\\Type\\PbString";
        $this->values["1"] = "";
        $this->fields["2"] = "\\getui\\Protobuf\\Type\\PbString";
        $this->values["2"] = "";
        $this->fields["3"] = "\\getui\\Core\\Request\\InnerField\\Type";
        $this->values["3"] = "";
    }

    public function key()
    {
        return $this->_get_value("1");
    }

    public function set_key($value)
    {
        return $this->_set_value("1", $value);
    }

    public function val()
    {
        return $this->_get_value("2");
    }

    public function set_val($value)
    {
        return $this->_set_value("2", $value);
    }

    public function type()
    {
        return $this->_get_value("3");
    }

    public function set_type($value)
    {
        return $this->_set_value("3", $value);
    }
}