<?php namespace Admin\Controller;

use Think\Controller;

class NodeController extends Controller {


    public function index(){

        $this->display();
    }

    public function addNode()
    {
        if(IS_POST){

            phpinfo();

            pp($_POST);
            $this ->success('添加成功',U('index'),3);
          /*  $CmsModel = D('Cms');
            if($CmsModel ->store()){
//                pp($_POST);
                $this ->success('添加成功',U('index'),3);
            }else{
                $this ->error($CmsModel ->getError(),'',3);
            }*/
        }
        $this->display();
    }


}


