<?php

namespace getui\Protobuf\Type;

use getui\Protobuf\Message;

class PbScalar extends Message
{
    /**
     * Set scalar value
     *
     * @param mixed $value
     */
    public function set_value($value)
    {
        $this->value = $value;
    }

    /**
     * Get the scalar value
     */
    public function get_value()
    {
        return $this->value;
    }
}