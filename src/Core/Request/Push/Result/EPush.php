<?php
namespace getui\Core\Request\Push\Result;

use getui\Protobuf\Type\PbEnum;

class EPush extends PbEnum
{
    const successed_online = 0;
    const successed_offline = 1;
    const successed_ignore = 2;
    const failed = 3;
    const busy = 4;
    const success_startBatch = 5;
    const success_endBatch = 6;
}