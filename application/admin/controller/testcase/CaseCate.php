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
        if ($this->request->isAjax()) {
            $where=[];
            $platform = $this->request->get("platform");
            $begintime = $this->request->get("begintime");
            $stoptime = $this->request->get("stoptime");
            if ($platform) {
                $where['platform']=$platform;
            }
            if ($begintime and $stoptime) {
                $begintime = strtotime($begintime);
                $stoptime =strtotime($stoptime);
                $where['buildtime']=['between',[$begintime,$stoptime]];
            }
            $demands=$this->model->where($where)->group('demand')->column('demand');
            if ($demands) {
                foreach ($demands as $key => $value) {
                $pass[]=$this->getdata($value,'通过',$where);
                $fail[]=$this->getdata($value,'失败',$where);
                $new[]=$this->getdata($value,'新建',$where);
                $nt[]=$this->getdata($value,'忽略',$where);
                $na[]=$this->getdata($value,'阻塞',$where);
                }
                $result = array('demand' => $demands, "fail"=>$fail,'pass' => $pass,'new' => $new,'nt' => $nt,'na' => $na,);
                return json($result);
            } 
        }
        return $this->view->fetch();
    }
    protected function getdata($value,$result,$where){
        $where['demand']=$value;
        $where['result']=$result;
        return $this->model->where($where)->count();
    }

}
