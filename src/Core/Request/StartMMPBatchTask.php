<?php

namespace getui\Core\Request;

use getui\Protobuf\Message;

class StartMMPBatchTask extends Message
{
    public $wired_type = Message::WIRED_LENGTH_DELIMITED;

    public function __construct($reader = null)
    {
        parent::__construct($reader);
        $this->fields["1"] = "\\getui\\Core\\Request\\MMPMessage";
        $this->values["1"] = "";
        $this->fields["2"] = "\\getui\\Protobuf\\Type\\PbInt";
        $this->values["2"] = "";
        $this->fields["3"] = "\\getui\\Protobuf\\Type\\PbString";
        $this->values["3"] = "";
    }

    public function message()
    {
        return $this->_get_value("1");
    }

    public function set_message($value)
    {
        return $this->_set_value("1", $value);
    }

    public function expire()
    {
        return $this->_get_value("2");
    }

    public function set_expire($value)
    {
        return $this->_set_value("2", $value);
    }

    public function seqId()
    {
        return $this->_get_value("3");
    }

    public function set_seqId($value)
    {
        return $this->_set_value("3", $value);
    }
}
