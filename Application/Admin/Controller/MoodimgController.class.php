<?php namespace Admin\Controller;

use Think\Controller;

class MoodimgController extends Controller {


    public function index(){

        $moodData = D('mood_img') ->field('mid,mood_name,pic,mood_desc')->select();
//        pp($moodData);
        $this ->assign('moodData',$moodData);
        $this->display();
    }

    public function addMood()
    {
        $moodModel = D('Moodimg');
        if(IS_AJAX){

            if($moodModel ->store()){
                $this ->success('添加成功',U('index'),3);
            }else{
                $this ->error($moodModel ->getError(),'',3);
            }

        }
        $this->display();
    }


}


