<?php

namespace app\admin\validate;

use think\Validate;

class CaseList extends Validate
{
    /**
     * 验证规则
     */
    protected $rule = [
        'casetitle'  =>  'require',
        'demand'  =>  'require',
    ];
    /**
     * 提示消息
     */
    protected $message = [
        'casetitle.require' => '标题必须填写',
        'demand.require' => '需求必须填写',
    ];
    /**
     * 验证场景
     */
    protected $scene = [
        'add'  => ['casetitle'  =>  'require','demand'  =>  'require'],
        'edit' => ['casetitle'  =>  'require','demand'  =>  'require'],
    ]; 
}
