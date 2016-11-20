<?php namespace Admin\Model;

use Think\Model;

class FitModel extends Model{
    protected $tableName = 'fit';

    protected $_validate = array(
        array('fit_tipid','require','请选择贴士内容',self::MUST_VALIDATE,self::MODEL_BOTH),
        array('fit_con','require','宜的内容不能为空',self::MUST_VALIDATE,self::MODEL_BOTH),
        array('unfit_con','require','忌的内容不能为空',self::MUST_VALIDATE,self::MODEL_BOTH)
    );

    public function store()
    {

        if($this ->create()){
//            print_r($this ->data());die;
            return $this ->add();
        }

    }










}