<?php
namespace getui\Core\Request\InnerField;

use getui\Protobuf\Type\PbEnum;

class Type extends PbEnum
{
    const str = 0;
    const int32 = 1;
    const int64 = 2;
    const floa = 3;
    const doub = 4;
    const bool = 5;
}