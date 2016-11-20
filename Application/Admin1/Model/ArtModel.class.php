<?php namespace Admin\Model;

use Think\Model;

	/**
	* 文章模型
	*/
	class ArtModel extends Model
	{
		protected $tableName = 'article';

		protected $_validate = array(
				array('title','require','标题不能为空',self::MUST_VALIDATE,self::MODEL_BOTH),
				array('author','require','作者不能为空',self::MUST_VALIDATE,self::MODEL_BOTH),
				array('keyword','require','关键字不能为空',self::MUST_VALIDATE,self::MODEL_BOTH),
				array('des','require','描述不能为空',self::MUST_VALIDATE,self::MODEL_BOTH),
				array('content','require','内容不能为空',self::MUST_VALIDATE,self::MODEL_BOTH),
				array('cate_cid','require','分类不能为空',self::MUST_VALIDATE,self::MODEL_BOTH),
			);

		protected $_auto = array(
			// array(完成字段1,完成规则,[完成条件,附加规则]),
			// array('password','md5',3,'function')
				array('sendtime','time',self::MODEL_INSERT,'function'),
				array('uptime','time',self::MODEL_BOTH,'function'),
				array('thumb','getThumb',self::MODEL_BOTH,'callback'),
			);


		public function getThumb($data)
		{

			/*if (I('post.thumb')) {
				return I('post.thumb');
			}*/
			//表中thumb字段保存缩略图的上传路径
			//一、先验证再上传
			//**没有文件上传***，提示错误
			if($_FILES['thumb']['error'] == 4) {
				// echo "1";die;
				$this ->error = '文件必须上传';
				return;
			}

			$config = array(
					//同名是否覆盖，默认false
					// 'replace'  => true,
					//大小
					'maxSize'  => 3145728 ,

					// 设置附件上传类型
					'exts'     => array('jpg', 'gif', 'png', 'jpeg'),

					// 设置附件上传根目录
					'rootPath' => './',

					// 设置附件上传（子）目录
					'savePath' => 'Public/Uploads/',
				);

			$upload = new \Think\Upload($config);

			$info = $upload->upload();

			if(!$info){
			//上传成功有该返回值，没有压入错误
				$this ->error = $upload ->getError();
				return;
			}
			// p($info);die;
			//上传成功，进行缩略
			$oriImg = './'.$info['thumb']['savepath'].$info['thumb']['savename'];
			//缩略保存路径
			$thumbImg = './'.$info['thumb']['savepath'].'thumb_'.$info['thumb']['savename'];

			//实例化类库，默认GD
			$image = new \Think\Image();
			// $image->open($oriImg);
			$img = $image->open($oriImg)->thumb(80, 100)->save($thumbImg);
			//打开图像文件
			// $image->open('./1.jpg');
			// save('./thumb.jpg');
			// 按照原图的比例生成一个最大为150*150的缩略图并保存为thumb.jpg
			// $image->open("{$oriImg}")->thumb(10, 10)->save("{$thumbImg}");

			// p($info);die;
			return $thumbImg;

		}





		public function store()
		{
			// echo "string";die;
// p(I('post.'));die;
			// echo "1";die;
			if(!$this ->create()){
				return false;
			}

			if ($this->error) {
				return false;
			}

			$artId = $this ->add();

			$this ->artData($artId);

			$this ->art_tag($artId);

			return true;
		}

		/**
		 * 文章数据
		 * 提交时候article表数据已全部验证，因此不需要文章数据模型和文章标签模型
		 * @param  [type] $artId [description]
		 * @return [type]        [description]
		 */
		public function artData($artId)
		{
			$data = array(
					'content'  =>I('post.content'),
					'keyword'  =>I('post.keyword'),
					'des'      =>I('post.des'),
					'data_aid' =>$artId,
				);
// p($data);die;
			/*$obj = D('Artdata');
			var_dump($obj);die;*/
			D('Artdata') ->add($data);
// p($data);die;
		}

		public function art_tag($artId)
		{
			// $tagName = implode(',',I('post.tid'));
			// $tid = isset(I('post.tid')) ? I('post.tid') : return;
			if (I('post.tid')) {
				$tid = I('post.tid');
			} else {
				return;
			}


			//如果标签没有验证，说明这篇文章没有标签，没有标签不需要操作中间表

			foreach ($tid as $k => $v) {
// p($v);die;
				$artTag = array(
						'tag_tid' =>$v,
						'article_aid' =>$artId,
					);
				D('Arttag') ->add($artTag);
			}

			// M('Arttag')
		}





















	}