<?php namespace Jingqi\Controller\embody;

Vendor('Alidayu.Client');
Vendor('Alidayu.SendSms');
Vendor('Alidayu.ResultSet');
Vendor('Alidayu.RequestCheckUtil');
Vendor('Alidayu.TopLogger');

class Sms{

    /**
     * 短信验证码
     */
    public function smsSend()
    {
        $phone = I('post.phone' , 0,'intval');
//        $phone = I('get.phone' ,0 ,'intval');
//        $phone = $_POST['phone'];

        //如果没有手机号
        if(!$phone){
            $msg = array('status'=> 0,'info'=>"请输入手机号");
            echo json_encode($msg);
            die;
        }
        $client = new \Client();
        $client->appkey = C('Alidayu.Appkey');
        $client->secretKey = C('Alidayu.SecretKey');

        $send_msg =  array(
            'product'=>C('Alidayu.Product'),
            'codes'=>$this ->randCode(),
        );

        $request = new \SendSms();
        $request->setExtend($phone);
        $request->setSmsType("normal");
        $request->setSmsFreeSignName(C('Alidayu.SignName'));
        $request->setSmsParam(json_encode($send_msg));

        $request->setRecNum($phone);
        $request->setSmsTemplateCode(C('Alidayu.SmsTemplate'));
        $json = json_encode($client->execute($request));
        $result = $this ->json2array($json);
//        var_dump($result);die;

        if($result['result']['success']){
            //服务器上可以设置Memcache  =>array( 'type'=>'memcache','host'=>C('DB_HOST'), 'port'=>'11211', 'expire'=>C('Alidayu.Expire'))
//            S('phoneCode',$this ->randCode(),array( 'type'=>'file', 'expire'=>C('Alidayu.Expire')));
//            setcookie('mobile_validated',$this ->randCode(),C('Alidayu.Expire'));
//            session($phone,$this ->randCode(),15*60*60);

            $msg = array('status'=> 1,'info'=>"验证码已发送至您的手机！");
        }else{
            $msg = array('status'=> 0,'info'=>"验证码发送失败，".$result['sub_msg']."请稍后重试！");
        }

        echo json_encode($msg);
    }


    /**
     * 生成随机验证码
     * @return mixed|string
     */
    protected function randCode(){
     $phone = I('post.phone' ,0 ,'intval');
//        $phone = I('get.phone' ,0 ,'intval');
        if($phone === 0){
            $msg = array('status'=> 0);
            return $msg;
        }
//        $phone = $_POST['phone'];

        //session存在，5分钟，返出session值
       /* if(session('code.'.$phone)){
            return session('code.'.$phone);
        }*/
        //缓存
        if(S('code.'.$phone)){
            return S('code.'.$phone);
        }

        $code = '';
        //验证码个数
        $num = C('Alidayu.CodeNum');
        //生成验证码
        for($i=0;$i < $num;$i++){
            $code .= mt_rand(0,9);
        }
        //session存储
//        session('code.'.$phone,$code,18000);
        //生成缓存
        S('code.'.$phone,$code,array('type'=>'file','expire'=>108000));

        return $code;
    }

    /**
     * json串转array处理
     * @param  json json字符串
     * @author bieanju <bieanju@163.com>
     * @return array
     */
    protected function json2array($json){

        $json = str_replace("\r\n", '\n',trim($json,chr(239).chr(187).chr(191)));//剔除bom以及去除\r

        return json_decode($json,true);

    }

    /**
     * 找回密码
     */
    public function findPaw()
    {
        $token = I('post.token','');
//$token = I('get.token','');
        if(!$token){
            exit(json_encode(['status' =>2,'info' =>'非法请求']));
        }
//        $phone = I('post.phone');
        //有token调用，发送验证码
        $this ->smsSend();
    }

}