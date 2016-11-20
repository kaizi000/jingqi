<?php namespace Admin\Controller;

use Think\Controller;

/**
* 标签控制器
*/
class TagController extends CommonController
{
	/**
	 * 显示
	 * @return [type] [description]
	 */
	public function index()
	{

		$this ->assign('tagData',M('Tag') ->select());

		$this ->display();
	}

	/**
	 * 增加和修改
	 */
	public function add()
	{
		$tid = I('get.tid');
		// echo $tid;
		if (IS_POST) {
			// p($_POST);die;
			$tagModel = D('Tag');
			// var_dump($tagModel);die;
			if ($tagModel ->store($tid)) {
				$msg = $tid ? '修改成功' : '添加成功';
				$this ->success($msg,U('index'),3);
			}else{
				$this ->error($tagModel ->getError(),'',3);
			}
		}

		if ($tid) {
			//编辑

			// 获得旧数据
			// $oldData = M('Tag') ->where('tid ='.$tid) ->find();
			$this ->assign('oldData',M('Tag') ->where('tid ='.$tid) ->find());
		}

		$this ->display();
	}

	/**
	 * 删除
	 * @return [type] [description]
	 */
	public function del()
	{
		$tid = I('get.tid');

		M('Tag') ->delete($tid);

		$this ->success('删除成功',U('index'));
	}


}