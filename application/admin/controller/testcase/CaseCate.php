<?php

namespace app\admin\controller\testcase;

use app\common\controller\Backend;

/**
 * 分类管理
 *
 * @icon fa fa-list
 * @remark 用于统一管理网站的所有分类,分类可进行无限级分类
 */
class CaseCate extends Backend
{

    protected $model = null;

    public function _initialize()
    {
        parent::_initialize();
        $this->model = model('CaseList');
    }

    /**
     * 查看
     */
    public function index()
    {
       
        return $this->view->fetch();
    }

}
