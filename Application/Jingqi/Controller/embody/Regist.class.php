<?php namespace Jingqi\Controller\embody;

    class Regist
    {

        /**
         * 注册
         */
        public function handle(){

            $phone = I('post.phone',0);
            $paw = I('post.paw','');

            /*$phone = I('get.phone',0);
//            var_dump($phone);die;
            $paw = I('get.paw','');*/

            if(!$phone || !$paw){

                exit(json_encode(['status' =>2,'info' =>'参数错误']));

            }

            if(M() ->table('User') ->where("nickName = '$phone' OR phoneNum = '$phone'") ->find()){
                exit(json_encode(['status' =>0,'info' =>'用户已存在']));
            }
//            echo 333;die;
            $data = [
                'nickName' =>$phone,
                'phoneNum' =>$phone,
//                'nickNameSign' =>password_hash(md5($phone.$paw),PASSWORD_BCRYPT,['cost' => 10])
                'token' =>password_hash(md5($phone.$paw),PASSWORD_BCRYPT,['cost' => 10])
            ];

//            pp($data);

            if(M() ->table('User') ->add($data)){
                exit(json_encode(['status' =>1,'info'=>'注册成功']));
            }

        }


        /**
         * 验证码判断
         */
        public function checkPhoneCode()
        {
            $phone = I('post.phone');
            $code = I('post.code');

            /*$phone = I('get.phone');
            $code = I('get.code');*/


//            var_dump(S('code.'.$phone));
//            echo $code;die;

//            var_dump(session());die;
            if(!S('code.'.$phone)){
                echo json_encode(['status' =>2]);
                die;
            }
            if($code == S('code.'.$phone)){
               /* //找回密码有token
                if($token == md5(mb_strtoupper(trim($phone)))){
                    echo json_encode(['status' =>1,'token' =>$token]);
                }else{   }*/
                    echo $msg = json_encode(['status' =>1]);

                return true;
            }else{
                echo json_encode(['status' =>0]);
                die;
            }
        }

        /**
         * 用户登陆
         */
        public function login()
        {
            $phone = I('post.phone');
            $paw = I('post.paw');

            /*$phone = I('get.phone');
            $paw = I('get.paw');*/

            if(!$phone || $paw){
                exit($msg = json_encode(['status' =>2,'info' =>'非法请求']));
            }

            $userData = M() ->table('User')->field('nickName,phoneNum,userId,nickNameSign,token')
                        ->where("nickName = '$phone' OR phoneNum = '$phone'") ->find();

            if(empty($userData)){
                exit($msg = json_encode(['status' =>0,'info' =>'用户名或密码错误']));
            }

            //老用户登录判断
            if($userData['nickNameSign']){
                 if(md5(mb_strtoupper(trim($phone))) != $userData['nickNameSign'] ){
                     die($msg = json_encode(['status' =>0,'info' =>'用户名或密码错误']));
                 }
                die(json_encode(['status' =>1,'token' =>$userData['nickNameSign'],'uid' =>$userData['userId'], 'info' =>'登陆成功']));
            }

            //新用户
            if(password_verify(md5($phone.$paw),$userData['token'])){
//                S(,$userData['token'],array());
                //token缓存7天
//                S($phone,$userData['token'],array('type'=>'file','expire'=>7*24*60*60));
                die(json_encode(['status' =>1,'token' =>$userData['token'],'uid' =>$userData['userId'], 'info' =>'登陆成功']));
            }

        }


        /**
         * 找回密码确认
         */
        public function findPaw()
        {

//            $token = I('post.token','');
            /*$token = I('get.token','');
            $phone = I('get.phone','');
            $newPaw = I('get.paw','');*/

            $token = I('post.token','');
            $phone = I('post.phone','');
            $newPaw = I('post.paw','');

//            echo password_hash(md5($phone.$paw),PASSWORD_BCRYPT,['cost' => 10]);die;

            if(!$token || !$phone || !$newPaw){
                exit(json_encode(['status' =>2,'info' =>'非法请求']));
            }

            //短信验证码验证
            $result = $this ->checkPhoneCode();

            if($result){
//                M() ->table('User')->where('phoneNum = '.$phone) ->update();
                $data = ['token' =>password_hash(md5($phone.$newPaw),PASSWORD_BCRYPT,['cost' => 10])];
                M() ->table('User')->where("phoneNum = '$phone'")->save($data);
            }

        }


    }

