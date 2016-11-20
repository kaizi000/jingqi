<?php namespace Admin\Controller;

use Org\Data\Data;
use Think\Controller;

class CmsCateController extends Controller {


    public function index(){

        $data = D('CmsCate') ->select();
        //第三方树状结构类
        $treeOrg = new Data();
        $treeCmsCate = $treeOrg ->tree($data,'cname');
        //分配数据
        $this ->assign('CmsCate', $treeCmsCate);
        $this->display();
    }

    /**
     * 分类
     */
    public function addCate()
    {
        if(IS_POST){
            if(D('CmsCate') ->store()){
                $this ->success('添加成功',U('index'),3);
            }else{
                $this ->error(D('CmsCate') ->getError(),'',3);
            }
        }
        $this->display();
    }


    /**
     * 子分类添加
     */
    public function addSon()
    {
        $cid = I('get.cid',0);

        if(IS_POST){
            if(D('CmsCate') ->store()){
                $this ->success('子类添加成功',U('index'),3);
            }else{
                $this ->error(D('CmsCate') ->getError(),'',3);
            }
        }
        $this ->assign('cateData',M('jq_cate')->where('cid = '.$cid) ->find());

        $this->display();
    }


    public function del()
    {
        $cid = I('get.cid',0);
        //查询单条
        /*$pid = D('CmsCate')->where('cid = '.$cid)->pluck('pid');
        //让子集上位
        $this->db->where('pid',$cid)->update(['pid'=>$pid]);*/
        //删除当前cid的数据
        D('CmsCate')->where('cid = '.$cid)->delete();
        $this->redirect('index');

    }





}


