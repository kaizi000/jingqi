<?php namespace Admin\Controller;

use Think\Controller;

class FitController extends Controller {


    public function index(){
        $fitData = D('Fit') ->select();
//pp($fitData);die;
        $this ->assign('fitData',$fitData);
//        $this ->assign('artData',$artData);

        $this->display();
    }

    public function addFit()
    {
        if(IS_POST){
            $fitModle = D('Fit');
//            var_dump($fitModle);die;
            if ($fitModle ->store()) {
//                print_r($_POST);die;
//                $msg = $tid ? '修改成功' : '添加成功';
                $this ->success('添加成功',U('index'),3);
            }else{
                $this ->error($fitModle ->getError(),'',3);
            }
        }

        $this->display();
    }


}


