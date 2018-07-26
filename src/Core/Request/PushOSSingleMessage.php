<?php

namespace getui\Core\Request;

use getui\Protobuf\Message;

class PushOSSingleMessage extends Message
{
    public $wired_type = Message::WIRED_LENGTH_DELIMITED;

    public function __construct($reader = null)
    {
        parent::__construct($reader);
        $this->fields["1"] = "\\getui\\Protobuf\\Type\\PbString";
        $this->values["1"] = "";
        $this->fields["2"] = "\\getui\\Core\\Request\\OSMessage";
        $this->values["2"] = "";
        $this->fields["3"] = "\\getui\\Core\\Request\\Target";
        $this->values["3"] = "";
    }

    public function seqId()
    {
        return $this->_get_value("1");
    }

    public function set_seqId($value)
    {
        return $this->_set_value("1", $value);
    }

    public function message()
    {
        return $this->_get_value("2");
    }

    public function set_message($value)
    {
        return $this->_set_value("2", $value);
    }

    public function target()
    {
        return $this->_get_value("3");
    }

    public function set_target($value)
    {
        return $this->_set_value("3", $value);
    }
}