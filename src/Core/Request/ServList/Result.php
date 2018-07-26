<?php

namespace getui\Core\Request\ServList;

use getui\Protobuf\Message;

class Result extends Message
{
    public $wired_type = Message::WIRED_LENGTH_DELIMITED;

    public function __construct($reader = null)
    {
        parent::__construct($reader);
        $this->fields["1"] = "\\getui\\Protobuf\\Type\\PbInt";
        $this->values["1"] = "";
        $this->fields["2"] = "\\getui\\Protobuf\\Type\\PbString";
        $this->values["2"] = array();
        $this->fields["3"] = "\\getui\\Protobuf\\Type\\PbString";
        $this->values["3"] = "";
    }

    public function code()
    {
        return $this->_get_value("1");
    }

    public function set_code($value)
    {
        return $this->_set_value("1", $value);
    }

    public function host($offset)
    {
        $v = $this->_get_arr_value("2", $offset);
        return $v->get_value();
    }

    public function append_host($value)
    {
        $v = $this->_add_arr_value("2");
        $v->set_value($value);
    }

    public function set_host($index, $value)
    {
        /**
         * @var \getui\Protobuf\Type\PbString $v
         */
        $v = new $this->fields["2"]();
        $v->set_value($value);
        $this->_set_arr_value("2", $index, $v);
    }

    public function remove_last_host()
    {
        $this->_remove_last_arr_value("2");
    }

    public function host_size()
    {
        return $this->_get_arr_size("2");
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