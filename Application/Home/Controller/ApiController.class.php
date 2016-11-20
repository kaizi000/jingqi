<?php namespace Home\Controller;

use Think\Controller;

class ApiController extends Controller {


    public function index(){
//echo 111;die;
        $data = [
            'head' => $this->head(),
            'tip' => $this->tip(),
            'reArticle' => $this->reArticle()
        ];

        echo json_encode($data);
//        echo json_encode($data,JSON_UNESCAPED_UNICODE);
    }

    //首页头部数据
    public function head()
    {
        //需要用户登录
        /*$uid = I('get.uid');
        $mark = I('get.mark',0);*/
//        'is_mark = '.$mark.'uid = '.$uid
        //心情的测试数据
        $uid = 101;$mark = 1;
        if($mark){
            $mood = M('mood_img')->where(array('is_mark'=>$mark,'uid'=>$uid))->order('start_time desc')->find();
        }else{
            $mood = '小主今天心情还未记录';
        }

//        isset($_GET['mark']) ?
//        $moodData = M('mood_img')->select();
        pp($mood);

        $headData = [
            'times' =>'2016-11-03',
            'status' =>'经期',
            'which' =>'5',
            'mood' =>$mood
        ];
//        $headData = json_encode($headData,JSON_UNESCAPED_UNICODE);
        return $headData;
    }
    
    //首页生活提示数据

    public function tip()
    {

        $tip = M('tip') ->getField('tipid,tip_name');
        foreach ($tip as $k =>$v) {
            $tipData[]=[
                'tipTitle' =>$v,
                'tips' =>M('fit') ->field('fit_con,unfit_con') ->where('fit_tipid = '.$k)->order()->limit(1)->find()
            ];
        }

        return $tipData;
    }


    //首页文章

    public function reArticle()
    {
        $artData = [
            'thumb' =>'',
            'title' =>'经期综合症',
            'desc'  =>'不知道',
            'zanNum'=>'1352',
            'comment'=>'352'
        ];

        echo json_encode($artData);

        return $artData;
    }
    
    
    
    


}


