<?php namespace Jingqi\Controller;

use Think\Controller;

class ApiController extends Controller {

    //错误提示
    private $er;

    public function index(){

        $cmd = I('get.cmd', '');

//        pp($cmd);

//        file_put_contents('4.txt',$cmd);

        //接口地址验证
        if(!$this ->apiCheck($cmd)){
            echo json_encode(['er' =>$this ->er],JSON_UNESCAPED_UNICODE);
            die;
        }
        //获取类和方法名
        list($cl, $method) = explode('.', $cmd);
        //提供给接口数据
        $this ->instance($cl) ->$method();

    }

    /**
     * 接口地址验证
     * @param $cmd 地址
     * @return bool
     */
    private function apiCheck($cmd){
        if ('' == $cmd) {
            $this ->er = '请求不存在';
            return false;
        }
        //获取类和方法名
        list($cl, $method) = explode('.', $cmd);
        //不能不传
        if (null == $cl || null == $method) {
            $this ->er = 'cmd参数无效';
            return false;
        }
        //类中必须存在该方法
        $class =  '\Jingqi\Controller\embody\\'.ucfirst($cl);
        if(!class_exists($class) && !is_callable("$class::$method")){
            $this ->er = 'cmd参数无效';
            return false;
        }

        return true;
    }

    /**
     * @param $className  需要实例化的类名字
     * 实例化出工能类 比如消息处理,按钮处理
     * @return mixed 传进来，实例化后的类
     */
    private function instance($className)
    {
        static $objs = [];
        if (!isset($objs[$className])) {
            $class =  '\Jingqi\Controller\embody\\'.ucfirst($className);
            $objs[$className] = new $class($this);
            return $objs[$className];
        }
    }



}


