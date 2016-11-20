<?php namespace Admin\Model;

use Think\Model;

class ShieldModel extends Model
{
    protected $tableName = 'shield';

    protected $_validate = array(
        array('sh_name','require','屏蔽词不能为空',self::MUST_VALIDATE,self::MODEL_BOTH),
        //新增是判断唯一性
        array('sh_name','require','屏蔽词已存在',self::MUST_VALIDATE,'unique',self::MODEL_BOTH),
    );


    public function store()
    {
       if(!$this ->create()){
           return false;
       }

        $this ->add();

        return true;

    }


}