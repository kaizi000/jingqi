<?php namespace Jingqi\Controller\embody;

class Status extends GetToken{


    public function getStatus(){

//        echo $_GET['token'];

//        pp($_GET);

        $token = I('get.token');

        $userId =(int) M() ->table('User') ->where("token = '$token' OR nickNameSign = '$token'") ->getField('userId');
//var_dump($userId);die;
        if(($userId)){
            switch(true){
                case I('get.stage') ==1 || I('get.stage') == 2:
                    $userData = [
                        'stage' =>I('get.stage'),
                        'end_time' => I('get.endTime'),
                        'start_time' =>I('get.endTime') - I('get.day')*24*60*60*60,
                        'day' =>I('get.day'),
                        'cycle' =>I('get.cycle'),
                        'uid' =>$userId,
                        'create_time' =>time(),
                    ];
                    break;
                case I('get.stage') == 3:
                    $userData = [
                        'stage' =>I('get.stage'),
                        'end_time' => I('get.endTime'),
                        'start_time' =>I('get.endTime') - I('get.day')*24*60*60*60,
                        'uid' =>$userId,
                        'create_time' =>time(),
                    ];
                    break;
            }

            if(M('menstrual_period') ->where('uid = '.$userId) ->add($userData)){
                exit(json_encode(['status' =>1,'info' =>'success']));
            }
        }else{
            exit(json_encode(['status' =>2,'info' =>'非法请求']));
        }
    }


}