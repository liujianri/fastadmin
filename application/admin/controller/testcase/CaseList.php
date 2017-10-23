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

    protected $arr = null;
    public function _initialize()
    {
        parent::_initialize();
        $this->model = model('CaseList');
        $this->modelValidate=Validate('CaseList');
        $userid=$this->getauthuserId("testcase/caselist/edit");
        $assignToer=model('Admin')->where('id','in',$userid)->column('username');
        $demands=model('Demand')->where('status','normal')->order('id desc')->column('title');
        $this->arr=$demands;
        $this->view->assign("assignToer", $assignToer);
        $this->view->assign("demands", $demands);
    }

    /**
     * 获取拥有某个权限的所有用户
     *$name   string|array    规则列表,支持逗号分隔的权限规则或索引数组
     *  返回用户的ID 一个一维数组
     */
    public function getauthuserId($name){
        $userid=[];
        $alluserid=model('Admin')->column('id');
        $auth = new \fast\Auth();
        foreach ($alluserid as $key => $value){
            if ($auth->check($name,$value)) {
                $userid[]= $value;
            }
        }
        return $userid;
    }

    /**
     * 查看
     */
    public function index()
    {
        if ($this->request->isAjax())
        {   
            list($where, $sort, $order, $offset, $limit) = $this->buildparams();
            $total = $this->model->where('demand','in',$this->arr)
                    ->where($where)
                    ->order($sort, $order)
                    ->count();
            $list = $this->model->where('demand','in',$this->arr)
                    ->where($where)
                    ->order($sort, $order)
                    ->limit($offset, $limit)
                    ->select();
            $result = array("total" => $total, "rows" => $list);
            return json($result);
        }
        
        return $this->view->fetch();
    }
    /*
    *添加用例
    */
    public function add()
    {
        if ($this->request->isPost())
        {
            $params = $this->request->post("row/a");

            if ($params)
            {   
                foreach ($params as $k => &$v)
                {
                    $v = is_array($v) ? implode(',', $v) : $v;
                }
                try
                {
                    //是否采用模型验证
                    if ($this->modelValidate)
                    {
                        $name = basename(str_replace('\\', '/', get_class($this->model)));
                        $validate = is_bool($this->modelValidate) ? ($this->modelSceneValidate ? $name . '.add' : true) : $this->modelValidate;
                        $this->model->validate($validate);
                    }
                    if ($params['platform']=='2') {
                        $params['platform']='iOS';
                        $ls=[];
                        $android=$params;
                        $android['platform']='Android';
                        $ls=[$params,$android];
                        $result = $this->model->saveAll($ls);
                        if ($result !== false)
                        {
                            $this->success();
                        }
                        else
                        {
                            $this->error($this->model->getError());
                        }
                    }else{
                       $result = $this->model->save($params);
                        if ($result !== false)
                        {
                            $this->success();
                        }
                        else
                        {
                            $this->error($this->model->getError());
                        } 
                    }
                    
                }
                catch (\think\exception\PDOException $e)
                {
                    $this->error($e->getMessage());
                }
            }
            $this->error(__('Parameter %s can not be empty', ''));
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
