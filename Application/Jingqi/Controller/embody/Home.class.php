<?php namespace Jingqi\Controller\embody;
//class HomeController extends Controller{
class Home extends GetToken{
    //首页头部数据
    public function head()
    {

//        echo parent::$userId;die;
        //需要用户登录
        /*$uid = I('get.uid');
        $mark = I('get.mark',0);*/
//        'is_mark = '.$mark.'uid = '.$uid

        //心情的测试数据
        /*$uid = 101;$mark = 1;

        $mood = M('menstrual_diary') ->where('uid = '.parent::$userId) ->getField('mood');


        if($mark){
            $mood = M('mood_img')->where(array('is_mark'=>$mark,'uid'=>$uid))->order('start_time desc')->find();
        }else{
            $mood = '小主今天心情还未记录';
        }

        $headData = [
            'times' =>'2016-11-03',
            'status' =>'经期',
            'which' =>'5',
            'mood' =>$mood
        ];
        exit(json_encode($headData,JSON_UNESCAPED_UNICODE));*/
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
        echo json_encode($tipData);

        return $tipData;
    }


    //首页文章推荐

    public function article()
    {
        $page = I('get.page',0);
//        exit($page);
        if($page == 0){//下拉刷新获取最近
            $homeArt = M('jq_art') ->field('art_thumb,param,art_desc,art_click,art_comment,art_aid')
                -> order('art_sendtime desc') -> limit(2) ->select();
        }else{
//            var_dump($page);die;
            $homeArt = M('jq_art') ->field('art_thumb,param,art_desc,art_click,art_comment,art_aid')
                -> order('art_sendtime desc') -> limit("$page,2") ->select();
        }


        foreach ($homeArt as $k =>$v) {
            $homeArt[$k]['param'] = json_decode($v['param'],true);
        }

        //上拉获取第二页
        $homeArt['page'] = count($homeArt) + $page;

//        pp($homeArt,0);

        exit(json_encode($homeArt));
    }
}