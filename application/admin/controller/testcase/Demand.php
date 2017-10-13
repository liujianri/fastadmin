<?php

namespace app\admin\controller\testcase;

use app\common\controller\Backend;
use app\common\model\Demand as DemandModel;


class Demand extends Backend
{

    protected $model = null;

    public function _initialize()
    {
        parent::_initialize();
        $this->model = model('Demand');
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
     * 添加迭代版本
     */
    public function additeration()
    {
        
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
