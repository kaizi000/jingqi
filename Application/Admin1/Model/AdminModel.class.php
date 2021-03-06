<?php namespace Admin\Model;

use Think\Model;


/**
* 用户登录模型
*/
class AdminModel extends Model
{

	protected $tableName = 'admin';

	/**
	 * 验证用户名和密码
	 * @return [type] [description]
	 */
	public function checkAdmin()
	{
//		echo '111';die;
		$code = I('post.code');

		$verify = new \Think\Verify();
        if(!$verify->check($code)){
        	// p($_POST);die;
            $this->error = '验证码错误';
            return false;
        }

        //获取表单提交的数据
		$user = I('post.user');
		// p($user);
		$paw = I('post.paw','','md5');
//		echo $paw;
//		print_r()
		 // p($paw);die;
		//获取数据库中当前与'username'=>$user，一致的数据，只取这一条数据(因为自比对该用户)
		$userData = $this->where(array('adname'=>$user)) ->find();
//		 p($userData);die;
		// 有户名比对
		if ($userData['adname'] != $user) {

			 $this->error = '有户名或密码错误';
			 return false;
		}

		//密码比对
		if ($paw != $userData['adpaw']) {
//			echo '111';die;
			 $this->error = '有户名或密码错误';
			 return false;
		}


		// 以上内容全部通过，将用户名存入session
		$_SESSION['info'] = array(
					'uid'   => $userData['adid'],
					'adname' => $user
				);
		//跳转到后台首页
		redirect(U('Index/index'));
	}



}
