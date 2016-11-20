<?php namespace Jingqi\Controller\embody;

class GetToken{
//    const UID;
    protected $token;

    static $userId;
    public function __construct()
    {
        $token = I('get.token');
        self::$userId = (int) M() ->table('User') ->where("token = '$token' OR nickNameSign = '$token'") ->getField('userId');

        if(!$token){
           exit(json_encode(['status' =>2,'info' =>'非法请求']));
        }

    }

}