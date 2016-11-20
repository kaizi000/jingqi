<?php namespace Admin\Controller;

use Think\Controller;

//class IndexController extends CommonController {
class IndexController extends Controller {
   /* public function _initialize()
    {
        echo 1;
    }*/
    public function index(){
        // p($_SESSION);

        $this->display();
    }


    /**
     * 退出
     * @return [type] [description]
     */
    public function logout()
    {
    	//清掉变量内容
        session_unset();
        //清掉文件内容，释放session id
        session_destroy();
        //跳转登录页面
        redirect(U('Login/index'));
        // go(U('Login/index'));
    }

}


