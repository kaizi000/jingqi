<?php namespace Admin\Model;

use Think\Model;

class CmsCateModel extends Model
{
    protected $tableName = 'jq_cate';

    protected $_validate = array(
        array('cname','require','分类名不能为空',self::MUST_VALIDATE,self::MODEL_BOTH),
    );

    public function store()
    {

        if($this ->create()){
//            print_r($this ->data());die;
            return $this ->add();
        }

    }
}