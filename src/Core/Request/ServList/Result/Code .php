<?php

namespace getui\Core\Request\ServList\Result;

use getui\Protobuf\Type\PbEnum;

class Code extends PbEnum
{
    const successed = 0;
    const failed = 1;
    const busy = 2;
}