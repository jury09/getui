<?php

namespace getui\Core\Request\Push;

use getui\Protobuf\Message;

class Info extends Message
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
        $this->fields["4"] = "\\getui\\Protobuf\\Type\\PbString";
        $this->values["4"] = "";
        $this->fields["5"] = "\\getui\\Protobuf\\Type\\PbString";
        $this->values["5"] = "";
        $this->fields["6"] = "\\getui\\Protobuf\\Type\\PbString";
        $this->values["6"] = "";
        $this->fields["7"] = "\\getui\\Protobuf\\Type\\PbString";
        $this->values["7"] = "";
        $this->fields["8"] = "\\getui\\Protobuf\\Type\\PbString";
        $this->values["8"] = "";
        $this->fields["9"] = "\\getui\\Protobuf\\Type\\PbString";
        $this->values["9"] = "";
        $this->fields["10"] = "\\getui\\Protobuf\\Type\\PbInt";
        $this->values["10"] = "";
        $this->fields["11"] = "\\getui\\Protobuf\\Type\\PbBool";
        $this->values["11"] = "";
        $this->fields["12"] = "\\getui\\Protobuf\\Type\\PbString";
        $this->values["12"] = "";
        $this->fields["13"] = "\\getui\\Protobuf\\Type\\PbBool";
        $this->values["13"] = "";
        $this->fields["14"] = "\\getui\\Protobuf\\Type\\PbString";
        $this->values["14"] = "";
        $this->fields["15"] = "\\getui\\Protobuf\\Type\\PbBool";
        $this->values["15"] = "";
        $this->fields["16"] = "NotifyInfo";
        $this->values["16"] = "";
    }

    public function message()
    {
        return $this->_get_value("1");
    }

    public function set_message($value)
    {
        return $this->_set_value("1", $value);
    }

    public function actionKey()
    {
        return $this->_get_value("2");
    }

    public function set_actionKey($value)
    {
        return $this->_set_value("2", $value);
    }

    public function sound()
    {
        return $this->_get_value("3");
    }

    public function set_sound($value)
    {
        return $this->_set_value("3", $value);
    }

    public function badge()
    {
        return $this->_get_value("4");
    }

    public function set_badge($value)
    {
        return $this->_set_value("4", $value);
    }

    public function payload()
    {
        return $this->_get_value("5");
    }

    public function set_payload($value)
    {
        return $this->_set_value("5", $value);
    }

    public function locKey()
    {
        return $this->_get_value("6");
    }

    public function set_locKey($value)
    {
        return $this->_set_value("6", $value);
    }

    public function locArgs()
    {
        return $this->_get_value("7");
    }

    public function set_locArgs($value)
    {
        return $this->_set_value("7", $value);
    }

    public function actionLocKey()
    {
        return $this->_get_value("8");
    }

    public function set_actionLocKey($value)
    {
        return $this->_set_value("8", $value);
    }

    public function launchImage()
    {
        return $this->_get_value("9");
    }

    public function set_launchImage($value)
    {
        return $this->_set_value("9", $value);
    }

    public function contentAvailable()
    {
        return $this->_get_value("10");
    }

    public function set_contentAvailable($value)
    {
        return $this->_set_value("10", $value);
    }

    public function invalidAPN()
    {
        return $this->_get_value("11");
    }

    public function set_invalidAPN($value)
    {
        return $this->_set_value("11", $value);
    }

    public function apnJson()
    {
        return $this->_get_value("12");
    }

    public function set_apnJson($value)
    {
        return $this->_set_value("12", $value);
    }

    public function invalidMPN()
    {
        return $this->_get_value("13");
    }

    public function set_invalidMPN($value)
    {
        return $this->_set_value("13", $value);
    }

    public function mpnXml()
    {
        return $this->_get_value("14");
    }

    public function set_mpnXml($value)
    {
        return $this->_set_value("14", $value);
    }

    public function validNotify()
    {
        return $this->_get_value("15");
    }

    public function set_validNotify($value)
    {
        return $this->_set_value("15", $value);
    }

    public function notifyInfo()
    {
        return $this->_get_value("16");
    }

    public function set_notifyInfo($value)
    {
        return $this->_set_value("16", $value);
    }
}