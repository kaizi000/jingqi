<?php namespace Admin\Controller;

use Think\Controller;

	/**
	* 登陆控制器
	*/
	class CommonController extends Controller
	{

		function _initialize()
		{

			//验证是否登陆
			if(!$_SESSION['info']){
				redirect(U('Login/index'));
			}

			//注册自动方法
			if (method_exists($this,'__auto')) {
				//$this指的就是子类实例化的对象
				$this->__auto();
			}

			//动态验证权限

			//1:验证是否是超级管理员
			$auth = new \Think\Auth();
			// p($auth);
			// $type = 1;
			$roleName = MODULE_NAME.'/'.CONTROLLER_NAME.'/'.ACTION_NAME;
			$uid = $_SESSION['info']['uid'];

			$gupid = M('t_gro_access')->where('uid ='.$uid)->find();
			if ($gupid['uid'] == 1) {//超级管理员跳过认证
				return true;
			}
			//定义不需要认证的规则(比如欢迎页面)
			//最好写在配置项
			$noCheck = array(
					'Admin/Index/index','Admin/Index/logout','Admin/Manager/index'
				);
			if (in_array($roleName, $noCheck)) {
				// echo '你好';
				return true;
			}
			//2:如果不是超管，验证权限
			if(!$auth->check($roleName,$uid)){
				$this ->error('您没有权限访问',U('Admin/Index/index'));
			}


		}



	}