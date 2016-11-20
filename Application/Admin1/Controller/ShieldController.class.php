<?php namespace Admin\Controller;

use Think\Controller;

//class ShieldController extends CommonController{

class ShieldController extends Controller{
    public function index()
    {
//        $data = D('Shield') ->select();

        $this ->assign('shield',D('Shield') ->select());

        $this ->display();
    }


    public function add()
    {
        if(IS_POST){
//            print_r($_POST);die;
            $shieldModel = D('Shield');

//             var_dump($shieldModel);die;
            if ($shieldModel ->store()) {
//                $msg = $tid ? '修改成功' : '添加成功';
                $this ->success('添加成功',U('index'),3);
            }else{
                $this ->error($shieldModel ->getError(),'',3);
            }
        }

        $this ->display();
    }


}