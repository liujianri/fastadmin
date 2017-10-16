<?php
namespace app\admin\controller\testcase;
use app\common\controller\Backend;
use app\common\model\Demand as DemandModel;
use think\Db;

class Demand extends Backend
{

    protected $model = null;

    public function _initialize()
    {
        parent::_initialize();
        $this->model = model('Demand');
        $itera=Db::name('iteration')->order('id desc')->select();
        $this->view->assign('itera', $itera);
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
        if ($this->request->isPost()) {
            $data=input('post.');
            $re=Db::name('iteration')->insert($data);
            if ($re!==false) {
                $this->success('添加成功','index');
            }else{
                $this->error('失败！');
            }
        }
        $iterations=Db::name('iteration')->order('id desc')->paginate(10);
        $this->assign('iterations',$iterations);
        return $this->view->fetch();
    }

    public function edititeration(){
        $ids=input('id');
        if ($this->request->isPost()) {
            $vnumber=input('vnumber');
            $remark=input('remark');
            $re=Db::name('iteration')->where('id', $ids)->update(['vnumber' => $vnumber,'remark' => $remark]);
            if ($re!==false) {
                $this->success('修改成功','index');
            }else{
                $this->error('失败！');
            }
        }
        $iteration=Db::name('iteration')->where('id',$ids)->find();
        $this->assign('iteration',$iteration);
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
