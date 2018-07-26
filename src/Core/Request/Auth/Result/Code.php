<?php

namespace getui\Core\Request\Auth\Result;

use getui\Protobuf\Type\PbEnum;

class Code extends PbEnum
{
    const successed = 0;
    const failed_noSign = 1;
    const failed_noAppkey = 2;
    const failed_noTimestamp = 3;
    const failed_AuthIllegal = 4;
    const redirect = 5;
}