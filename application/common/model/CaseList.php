<?php

namespace app\common\model;

use think\Model;

class CaseList extends Model
{
	// 开启自动写入时间戳字段
    protected $autoWriteTimestamp = 'int';
    // 定义时间戳字段名
    protected $createTime = 'buildtime';
    protected $updateTime = 'updatetime';

}