<?php namespace Common\Model;


use Think\Model;

class UserModel extends Model
{

//    protected $tableName = 'User';
    protected $trueTableName = 'User';

    protected $_validate = array(
        array('phone','require','0',self::MUST_VALIDATE,self::MODEL_BOTH),
        array('paw','require','0',self::MUST_VALIDATE,self::MODEL_BOTH),
    );

    public function store()
    {

//        echo 33.3;

        var_dump($this ->create());
        if($this ->create()){
            echo 333;
            return $this ->add();
        }

        $data = [
            'nickName' => "life布布君60",
            'nickNameSign' => '22222',
//            'phoneCode' = '985364'
        ];

        return $this ->add($data);

    }

    public function token($userId)
    {
//        $userId = $userId;

        $param = $userId.$this ->uname.$this ->phoneCode;

        $options = [
            'cost' => 10,
        ];

        $hash1 = password_hash($param,PASSWORD_BCRYPT,$options);




        $authenticate = password_verify($param,$hash1);
    }


}