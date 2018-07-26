<?php

namespace getui\Core\Request\PushList;

use getui\Protobuf\Message;

class Result extends Message
{
    public $wired_type = Message::WIRED_LENGTH_DELIMITED;

    public function __construct($reader = null)
    {
        parent::__construct($reader);
        $this->fields["1"] = "\\getui\\Core\\Request\\Push\\Result";
        $this->values["1"] = array();
    }

    public function results($offset)
    {
        return $this->_get_arr_value("1", $offset);
    }

    public function add_results()
    {
        return $this->_add_arr_value("1");
    }

    public function set_results($index, $value)
    {
        $this->_set_arr_value("1", $index, $value);
    }

    public function remove_last_results()
    {
        $this->_remove_last_arr_value("1");
    }

    public function results_size()
    {
        return $this->_get_arr_size("1");
    }
}