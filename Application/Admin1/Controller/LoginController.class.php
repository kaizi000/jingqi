<?php namespace Admin\Controller;

use Think\Controller;

/**
* 登陆控制器
*/
class LoginController extends Controller
{


	public function index()
	{

		$this ->display();
	}

	/**
	 *
	 *登陆验证
	 * @return [type] [description]
	 */
	public function checkuse()
	{
		$adminModel = D('Admin');


//		p($adminModel);die;

		if(!$adminModel ->checkAdmin()){

			$this ->error($adminModel ->getError(),'',1);
		}

	}


	public function makeCode()
	{
		$Verify = new \Think\Verify();
		// $Verify->fontSize => 15;
		$Verify->fontSize = 18;
		$Verify->length = 1;
		$Verify->imageW = 118;
		$Verify->imageH = 42;
		$Verify->entry();
	}

}