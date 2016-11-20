<?php namespace Admin\Model;

use Think\Model;

class MoodimgModel extends Model{
    protected $tableName = 'mood_img';

    protected $_validate = array(
        array('mood_name','require','心情内容不能为空',self::MUST_VALIDATE,self::MODEL_BOTH),
        array('pic','require','请选择心情图片',self::MUST_VALIDATE,self::MODEL_BOTH),
        array('mood_desc','require','请添加心情描述',self::MUST_VALIDATE,self::MODEL_BOTH)
    );

    public function store()
    {

        if($this ->create()){
//            print_r($this ->data());die;
            return $this ->add();
        }

    }










}