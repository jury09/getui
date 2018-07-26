<?php
namespace getui\Protobuf\Type;

use getui\Protobuf\Message;

class PbBool extends PbInt
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
        $this->value = ($this->value != 0) ? 1 : 0;
    }
}