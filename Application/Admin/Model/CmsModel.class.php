<?php namespace Admin\Model;

use Think\Model;

class CmsModel extends Model{
    protected $tableName = 'jq_art';

    protected $_validate = array(
        array('art_title','require','请添加文章标题',self::MUST_VALIDATE,self::MODEL_BOTH),
        array('art_desc','require','请添加文章描述',self::MUST_VALIDATE,self::MODEL_BOTH),
//        array('art_content','require','请添加文',self::MUST_VALIDATE,self::MODEL_BOTH),
        array('art_thumb','require','请添加文章缩略图',self::MUST_VALIDATE,self::MODEL_BOTH),
        array('cid','require','请选择分类',self::MUST_VALIDATE,self::MODEL_BOTH)
    );

    protected $_auto = array(
      array('art_sendtime','time',self::MODEL_INSERT,'function'),
    );


    //
    public function store()
    {

        if(!$this ->create()){
            return false;
        }

        //文章链接
        $this ->makeUrl();

        //验证通过，获得自增id
        $aid = $this ->add();

        //文章大数据
        $artData = array(
            'id' =>$aid,
//            'art_content' =>$_POST['art_content']
            'art_content' =>htmlspecialchars($_POST['art_content'])
        );



        M('jq_art_data') ->add($artData);

        return true;
//        return $this ->add();
    }


    //文章链接
    public function makeUrl()
    {
        //地址处理
        if($_POST['art_url']){
            $this ->data['param'] = json_encode(
                array(
                    'url'           => $_POST['art_url'],
                    'shareTitle'    => $_POST['art_title'],
                    'shareContent'  => $_POST['art_title']
                )
            );
        }else{

            //获取代码执行到此时间
            $times = date('Y-m-d',time());
            $path = 'Public/static/html/'.$times;
            is_dir($path) || mkdir($path,0777,true);

            $param = array(
                'url'           => './Public/static/html/'.$times.'/'.md5(mt_rand(0,time())).'.html',
                'shareTitle'    => $_POST['art_title'],
                'shareContent'  => $_POST['art_title']
            );
            $this ->data['param'] = json_encode($param);

            $h5 = <<<here
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0,user-scalable=no">
<meta name="apple-touch-fullscreen" content="YES" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<title>经期助手-{$_POST['art_title']}</title>
<style>
	*{padding:0;margin:0;}
	div,dl,dt,dd,form,h1,h2,h3,h4,h5,h6,img,ol,ul,li,table,th,td,p,span,a{border:0;}
	img,input{border:none;vertical-align:middle;}
	img{width:100%;}
	body{font-family:Microsoft YaHei,"微软雅黑";font-size:12px;background:#FFF;color:#000;}
	html{overflow-y:scroll;}
	ul,ol{list-style-type:none;}
	th,td,input{font-size:12px;}
	h3{font-size:14px;}
	button{border:none;cursor:pointer;font-size:12px;background-color:transparent;}
	select{border-width:1px;_zoom:1;border-style:solid;padding-top:2px;font-size:12px;}
	.clear{clear:both;font-size:1px;height:0;visibility:hidden;line-height:0;}
	.clearfix:after{content:"";display:block;clear:both;}
	.clearfix{zoom:1;}
	a:link,a:visited{text-decoration:none;color:#333;}
	a:hover,a:active{text-decoration:none;}
	.font_s4{ font-size:14px;}
	.font_s5{ font-size:16px;}
	.font_s6{ font-size:18px;}
	.font_s7{ font-size:20px;}
	.font_s8{ font-size:22px;}
	.font_s9{ font-size:24px;}
	.posi_a{ position:absolute;}
	.posi_r{ position:relative;}
	.posi_f{ position:fixed;}
	#wrapper{width: 100%; min-width: 320px; max-width: 640px; margin: 0 auto;overflow:hidden;background-color:#fff;}
	article{padding: 10px; min-width: 280px;}
	section{margin-bottom:10px;}
	section p{text-indent:2em; line-height:24px;color:#6e6e6e;}
	section span{padding:5px 8px;background-color:#ff5363;border-radius: 5px;color:#fff;}
	section dl{margin-top:10px;}
	section dl dt{text-align: center;}
</style>
</head>
<body>
<div id="wrapper">
{$_POST['art_content']}
</div>
<script src='../../../js/htmlCom.js'></script>
<script src='../../../js/zepto.min.js'></script>
</body>
</html>
here;

         file_put_contents($param['url'],$h5);
        }

    }










}