<?php namespace Admin\Controller;

use Think\Controller;

	/**
	* 分类控制器
	*/
	class CateController extends CommonController {

        protected $cateModel;

        public function index(){

            // $this ->assign('cateData',M('Cate')->select());
            $cate = M('Cate')->select();

            $cateData = level($cate);
            // p($cateData);die;
            $this ->assign('cateData',$cateData);
            $this->display();
        }

        /**
         * 添加分类
         */
        public function add()
        {
            $cid = I('get.cid');

            if (IS_POST) {

                $cateModel = D('Cate');
                if ($cateModel ->store($cid)) {
                    $msg = $cid ? '修改成功' : '新增成功';
                    $this ->success($msg, U('Admin/Cate/index'),3);
                }else{

                    $this ->error($cateModel->getError(),'',600);
                }

            }


            if ($cid) {//存在说明是修改
                $oldData = M('Cate')->where('cid='.$cid) ->find();
                $this->assign('oldData',$oldData);
                // p($oldData);

                //获得不是当前级及当前对应子级的所有数据
                $select = D('Cate') ->edit($cid);
                $this->assign('select',$select);
                // p($select);
            }

        	$this->display();
        }


        /**
         * 添加子类
         */
        public function addSon()
        {

             if (IS_POST) {

                $cateModel = D('Cate');
                if ($cateModel ->store()) {
                    $this ->success('新增成功', U('Admin/Cate/index'),3);
                }else{

                    $this ->error($cateModel->getError(),'',3);
                }

            }
            $this->assign('curCateData',M('Cate') ->where('cid='.I('get.cid')) ->find());
            $this->display();
        }

        /**
         * 删除(文章添加后再做)
         * 该分类下有文章，就不能删除
         *
         * @return [type] [description]
         */
        public function del()
        {
            //删除顶级，一级子级上移一级

        }




}
