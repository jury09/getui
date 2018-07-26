<?php

namespace getui\Core\Request\ServerNotify;

use getui\Protobuf\Type\PbEnum;

class NotifyType extends PbEnum
{
    const normal = 0;
    const serverListChanged = 1;
    const exception = 2;
}