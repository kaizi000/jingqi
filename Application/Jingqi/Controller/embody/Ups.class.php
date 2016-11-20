<?php namespace Jingqi\Controller\embody;

class Ups extends GetToken{


    /**
     * 常规记录上传接口
     */
    public function records()
    {
        $datas =  multi_array_sort(json_decode($_GET['data'],true),'time');

        //根据token压入uid
        foreach ($datas as $k => $v) {
            $datas[$k]['uid'] = parent::$userId;

            if(!M('menstrual_diary') ->add($datas[$k])){
                exit(json_encode(['status' =>0,'info'=>'数据同步失败，稍后重试']));
            }
        }
        pp($datas,0);

    }






}