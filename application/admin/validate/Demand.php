<?php

namespace app\admin\validate;

use think\Validate;

class Demand extends Validate
{
    /**
     * 验证规则
     */
    protected $rule = [
        'title'  =>  'require',
        'iteration'  =>  'require',
    ];
    /**
     * 提示消息
     */
    protected $message = [
        'title.require' => '标题必须填写',
        'iteration.require' => '版本号必须填写',
    ];
    /**
     * 验证场景
     */
    protected $scene = [
        'add'  => ['iteration'  =>  'require','title'  =>  'require'],
        'edit' => ['iteration'  =>  'require','title'  =>  'require'],
    ]; 
}
