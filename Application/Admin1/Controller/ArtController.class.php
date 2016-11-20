<?php namespace Admin\Controller;

use Think\Controller;
	/**
	* 文章添加
	*/
//	class ArtController extends CommonController
	class ArtController extends Controller
	{
		public function index()
		{

			$artData = D('Art') ->select();

			// p($artData);die;

			$this ->assign('artData',$artData);


	        $this->display();

	    }


	    public function add()
	    {

	    	$artModel = D('Art');
	    	if (IS_POST) {

	    		// var_dump($artModel);die;
	    		// I('get.');
	    		// p();die;
	    		// var_dump($artModel);die;
	    		if ($artModel ->store()) {
	    			$this ->success('添加成功',U('index'));
	    		}else{
	    			$this ->error($artModel->getError());
	    		}
	    	}

	    	$aid = I('get.aid');

	    	if ($aid) {
	    		// echo 1;die;
	    		$artData = $artModel ->where('aid='.$aid) ->find();

	    		$this ->assign('artData',$artData);

	    		// $tagData = M('Tag') ->select();getField('tag_tid',true)
	    		// $User->getField('id',true);getField('id,nickname');
	    		// join('think_work ON think_artist.id = think_work.artist_id')
	    		$tid = M('Art_tag') ->where('article_aid='.$aid)
	    		->join('tag ON art_tag.tag_tid = tag.tid') ->getField('tid',true);

	    		$this ->assign('tid',$tid);
	    		//获得当前分类
	    		$cid = M('Cate') ->where('cid ='.$artData['cate_cid']) ->getField('cid',true);
	    		$this ->assign('cid',$cid);
	    		// in_array(needle, haystack)
	    		// p($cid);
	    	}

	    	//分类数据
	    	$cateData = M('Cate') ->select();
	    	$cateData = level($cateData);
	    	//标签数据
	    	$tagData = M('Tag') ->select();
	    	$this ->assign('tagData',$tagData);
			// p($cateData);

			$this ->assign('cateData',$cateData);
	    	$this->display();
	    }

	    /**
	     * 删除到回收站
	     * @return [type] [description]
	     */
	    public function del()
	    {


	    }








	}