<?php

namespace app\admin\controller\testcase;

use app\common\controller\Backend;
use app\common\model\CaseList as CaseListModel;

/**
 * 分类管理
 *
 * @icon fa fa-list
 * @remark 用于统一管理网站的所有分类,分类可进行无限级分类
 */
class CaseList extends Backend
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
        if ($this->request->isAjax())
        {   
            list($where, $sort, $order, $offset, $limit) = $this->buildparams();
            $total = $this->model
                    ->where($where)
                    ->order($sort, $order)
                    ->count();

            $list = $this->model
                    ->where($where)
                    ->order($sort, $order)
                    ->limit($offset, $limit)
                    ->select();
            $result = array("total" => $total, "rows" => $list);
            return json($result);
        }
        
        return $this->view->fetch();
    }
    
    /**
     * 添加
     */
    public function add()
    {
        if ($this->request->isAjax())
        {
            $this->error();
        }
        return $this->view->fetch();
    }

    public function del($ids = "")
    {
        if ($ids)
        {
            $count = $this->model->destroy($ids);
            if ($count)
            {
                \think\Hook::listen("upload_after", $this);
                $this->success();
            }
        }
        $this->error(__('Parameter %s can not be empty', 'ids'));
    }

}
