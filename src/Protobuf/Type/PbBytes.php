<?php

namespace getui\Protobuf\Type;

use getui\Protobuf\Message;

class PbBytes extends PbScalar
{
    public $wired_type = Message::WIRED_LENGTH_DELIMITED;

    /**
     * Parses the message for this type
     *
     * @param array
     */
    public function ParseFromArray()
    {
        $this->value = '';
        // first byte is length
        $length = $this->reader->next();

        // just extract the string
        $pointer = $this->reader->get_pointer();
        $this->reader->add_pointer($length);
        $this->value = $this->reader->get_message_from($pointer);
    }

    /**
     * Serializes type
     *
     * @param int $rec
     *
     * @return mixed
     */
    public function SerializeToString($rec = -1)
    {
        $string = '';

        if ($rec > -1) {
            $string .= $this->base128->set_value($rec << 3 | $this->wired_type);
        }

        $string .= $this->base128->set_value(strlen($this->value));
        $string .= $this->value;

        return $string;
    }
}