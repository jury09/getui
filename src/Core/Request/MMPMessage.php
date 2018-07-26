<?php

namespace getui\Core\Request;

use getui\Protobuf\Message;
use getui\Protobuf\Type\PbBool;

class MMPMessage extends Message
{
    public $wired_type = Message::WIRED_LENGTH_DELIMITED;

    public function __construct($reader = null)
    {
        parent::__construct($reader);
        $this->fields["2"] = "\\getui\\Core\\Request\\Transparent";
        $this->values["2"] = "";
        $this->fields["3"] = "\\getui\\Protobuf\\Type\\PbString";
        $this->values["3"] = "";
        $this->fields["4"] = "\\getui\\Protobuf\\Type\\PbInt";
        $this->values["4"] = "";
        $this->fields["5"] = "\\getui\\Protobuf\\Type\\PbInt";
        $this->values["5"] = "";
        $this->fields["6"] = "\\getui\\Protobuf\\Type\\PbInt";
        $this->values["6"] = "";
        $this->fields["7"] = "\\getui\\Protobuf\\Type\\PbBool";
        $this->values["7"] = "";
        $this->values["7"] = new PbBool();
        $this->values["7"]->value = true;
        $this->fields["8"] = "\\getui\\Protobuf\\Type\\PbInt";
        $this->values["8"] = "";
    }

    public function transparent()
    {
        return $this->_get_value("2");
    }

    public function set_transparent($value)
    {
        return $this->_set_value("2", $value);
    }

    public function extraData()
    {
        return $this->_get_value("3");
    }

    public function set_extraData($value)
    {
        return $this->_set_value("3", $value);
    }

    public function msgType()
    {
        return $this->_get_value("4");
    }

    public function set_msgType($value)
    {
        return $this->_set_value("4", $value);
    }

    public function msgTraceFlag()
    {
        return $this->_get_value("5");
    }

    public function set_msgTraceFlag($value)
    {
        return $this->_set_value("5", $value);
    }

    public function msgOfflineExpire()
    {
        return $this->_get_value("6");
    }

    public function set_msgOfflineExpire($value)
    {
        return $this->_set_value("6", $value);
    }

    public function isOffline()
    {
        return $this->_get_value("7");
    }

    public function set_isOffline($value)
    {
        return $this->_set_value("7", $value);
    }

    public function priority()
    {
        return $this->_get_value("8");
    }

    public function set_priority($value)
    {
        return $this->_set_value("8", $value);
    }
}