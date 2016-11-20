<?php namespace Admin\Controller;

use Org\Data\Data;
use Think\Controller;

class CmsController extends Controller {


    public function index(){

        //获取文章数据
//        'think_work ON think_artist.id = think_work.artist_id'
        $artData = D('Cms') ->join('jq_cate ON jq_art.cid = jq_cate.cid') ->field('art_aid,art_title,param,art_click,art_comment,cname') ->select();

        $this ->assign('artData',$artData);

        $this->display();
    }

    //增加
    public function addArt()
    {

        if(IS_POST){
//            pp($_POST);
            $CmsModel = D('Cms');
            if($CmsModel ->store()){
//                pp($_POST);
                $this ->success('添加成功',U('index'),3);
            }else{
                $this ->error($CmsModel ->getError(),'',3);
            }
        }
        //获取分类内容
        $data = M('jq_cate') ->select();

        $treeOrg = new Data();

        $this ->assign('cateData',$treeOrg ->tree($data,'cname'));

        $this->display();
    }

    //删除

    public function del()
    {
        $art_aid = I('get.id');
        //删除文章
        D('Cms') ->where('art_aid = '.$art_aid) ->delete();
        //删除文章大数据
        M('jq_art_data')->where('id = '.$art_aid) ->delete();
        $this ->redirect('index');
    }



}


