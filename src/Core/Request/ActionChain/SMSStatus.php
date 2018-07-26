<?php
namespace getui\Core\Request\ActionChain;

use getui\Protobuf\Type\PbEnum;

class SMSStatus extends PbEnum
{
    const unread = 0;
    const read = 1;
}