<?php

namespace getui\Core\Request;

use getui\Protobuf\Message;

class NotifyInfo extends Message
{
    public $wired_type = Message::WIRED_LENGTH_DELIMITED;

    public function __construct($reader = null)
    {
        parent::__construct($reader);
        $this->fields["1"] = "\\getui\\Protobuf\\Type\\PbString";
        $this->values["1"] = "";
        $this->fields["2"] = "\\getui\\Protobuf\\Type\\PbString";
        $this->values["2"] = "";
        $this->fields["3"] = "\\getui\\Protobuf\\Type\\PbString";
        $this->values["3"] = "";
    }

    public function title()
    {
        return $this->_get_value("1");
    }

    public function set_title($value)
    {
        return $this->_set_value("1", $value);
    }

    public function content()
    {
        return $this->_get_value("2");
    }

    public function set_content($value)
    {
        return $this->_set_value("2", $value);
    }

    public function payload()
    {
        return $this->_get_value("3");
    }

    public function set_payload($value)
    {
        return $this->_set_value("3", $value);
    }
}