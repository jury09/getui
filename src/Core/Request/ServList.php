<?php

namespace getui\Core\Request;

use getui\Protobuf\Message;

class ServList extends Message
{
    public $wired_type = Message::WIRED_LENGTH_DELIMITED;

    public function __construct($reader = null)
    {
        parent::__construct($reader);
        $this->fields["1"] = "\\getui\\Protobuf\\Type\\PbString";
        $this->values["1"] = "";
        $this->fields["3"] = "\\getui\\Protobuf\\Type\\PbInt";
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

    public function timestamp()
    {
        return $this->_get_value("3");
    }

    public function set_timestamp($value)
    {
        return $this->_set_value("3", $value);
    }
}