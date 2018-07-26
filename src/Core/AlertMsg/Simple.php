<?php

namespace getui\Core\AlertMsg;

class Simple implements AlertMsgInterface
{
    public $alertMsg;

    public function getAlertMsg()
    {
        return $this->alertMsg;
    }
}