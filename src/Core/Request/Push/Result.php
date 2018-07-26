<?php

namespace getui\Core\Request\Push;

use getui\Protobuf\Message;

class Result extends Message
{
    public $wired_type = Message::WIRED_LENGTH_DELIMITED;

    public function __construct($reader = null)
    {
        parent::__construct($reader);
        $this->fields["1"] = "\\getui\\Core\\Request\\Push\\Result\\EPush";
        $this->values["1"] = "";
        $this->fields["2"] = "\\getui\\Protobuf\\Type\\PbString";
        $this->values["2"] = "";
        $this->fields["3"] = "\\getui\\Protobuf\\Type\\PbString";
        $this->values["3"] = "";
        $this->fields["4"] = "\\getui\\Protobuf\\Type\\PbString";
        $this->values["4"] = "";
        $this->fields["5"] = "\\getui\\Protobuf\\Type\\PbString";
        $this->values["5"] = "";
        $this->fields["6"] = "\\getui\\Protobuf\\Type\\PbString";
        $this->values["6"] = "";
        $this->fields["7"] = "\\getui\\Protobuf\\Type\\PbString";
        $this->values["7"] = "";
    }

    public function result()
    {
        return $this->_get_value("1");
    }

    public function set_result($value)
    {
        return $this->_set_value("1", $value);
    }

    public function taskId()
    {
        return $this->_get_value("2");
    }

    public function set_taskId($value)
    {
        return $this->_set_value("2", $value);
    }

    public function messageId()
    {
        return $this->_get_value("3");
    }

    public function set_messageId($value)
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

    public function target()
    {
        return $this->_get_value("5");
    }

    public function set_target($value)
    {
        return $this->_set_value("5", $value);
    }

    public function info()
    {
        return $this->_get_value("6");
    }

    public function set_info($value)
    {
        return $this->_set_value("6", $value);
    }

    public function traceId()
    {
        return $this->_get_value("7");
    }

    public function set_traceId($value)
    {
        return $this->_set_value("7", $value);
    }
}