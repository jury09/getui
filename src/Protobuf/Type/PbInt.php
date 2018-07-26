<?php

namespace getui\Protobuf\Type;

use getui\Protobuf\Message;

class PbInt extends PbScalar
{
    public $wired_type = Message::WIRED_VARINT;

    /**
     * Parses the message for this type
     *
     * @param array
     */
    public function ParseFromArray()
    {
        $this->value = $this->reader->next();
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
        // first byte is length byte
        $string = '';

        if ($rec > -1) {
            $string .= $this->base128->set_value($rec << 3 | $this->wired_type);
        }

        $value = $this->base128->set_value($this->value);
        $string .= $value;

        return $string;
    }
}