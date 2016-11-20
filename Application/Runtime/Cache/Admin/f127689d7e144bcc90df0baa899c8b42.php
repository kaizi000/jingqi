<?php if (!defined('THINK_PATH')) exit(); if ( ! defined( 'APP_PATH' ) ) { exit; } ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>    <title>经期后台系统</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link href="/jingqi/Public/admin/jqjs/css/bootstrap.min.css" rel="stylesheet">
    <link href="/jingqi/Public/css/site.css" rel="stylesheet">
    <link href="/jingqi/Public/admin/jqjs/css/font-awesome.min.css" rel="stylesheet">
    <script src="/jingqi/Public/admin/jqjs/js/jquery.min.js"></script>
    <script src="/jingqi/Public/admin/jqjs/app/util.js"></script>
    <script src="/jingqi/Public/admin/jqjs/require.js"></script>
    <script src="/jingqi/Public/admin/jqjs/app/config.js"></script>
    <!--[if lt IE 9]>
    <script src="http://cdn.bootcss.com/html5shiv/r29/html5.min.js"></script>
    <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script>
        if (navigator.appName == 'Microsoft Internet Explorer') {
            if (navigator.userAgent.indexOf("MSIE 5.0") > 0 || navigator.userAgent.indexOf("MSIE 6.0") > 0 || navigator.userAgent.indexOf("MSIE 7.0") > 0) {
                alert('您使用的 IE 浏览器版本过低, 推荐使用 Chrome 浏览器或 IE8 及以上版本浏览器.');
            }
        }
    </script>
    <style>
        i {
            color: #337ab7;
        }
    </style>
</head>
<body>
<div class="container-fluid admin-top">
    <!--导航-->
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <h4 style="display: inline;line-height: 50px;float: left;margin: 0px"><a href="" style="color: white;margin-left: -14px">后台管理</a></h4>
                <div class="navbar-header">

                </div>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <i class="fa fa-w fa-user"></i>
                            <?php echo $_SESSION['admin']['username'];?>
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="">修改密码</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="">退出</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!--导航end-->
</div>
<!--主体-->
<div class="container-fluid admin_menu">
    <div class="row">
        <div class="col-xs-12 col-sm-3 col-lg-2 left-menu">
            <div class="panel panel-default" id="menus" >
                <!--贴士管理-->
                <div class="panel-heading" role="button" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample" style="border-top: 1px solid #ddd;border-radius: 0%">
                    <h4 class="panel-title">贴士管理</h4>
                    <a class="panel-collapse" data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <i class="fa fa-chevron-circle-down"></i>
                    </a>
                </div>
                <ul class="list-group menus collapse in" id="collapseExample">
                    <a href="<?php echo U('Fit/index');?>" class="list-group-item" >
                        <i class="fa fa-align-center" aria-hidden="true"></i>
                        <span class="pull-right" href=""></span>
                        宜忌列表
                    </a>
                    <a href="<?php echo U('Fit/addFit');?>" class="list-group-item" >
                        <i class="fa fa-arrows" aria-hidden="true"></i>
                        <span class="pull-right" href=""></span>
                        添加宜忌
                    </a>
                </ul>
                <!--贴士管理 end-->

                <!--心情管理-->
                <div class="panel-heading" role="button" data-toggle="collapse" href="#collapseExample2" aria-expanded="false" aria-controls="collapseExample">
                    <h4 class="panel-title">心情管理</h4>
                    <a class="panel-collapse" data-toggle="collapse" href="#collapseExample2" aria-expanded="true">
                        <i class="fa fa-chevron-circle-down"></i>
                    </a>
                </div>
                <ul class="list-group menus collapse in" id="collapseExample2">
                    <a href="<?php echo U('Moodimg/index');?>" class="list-group-item" >
                        <i class="fa fa-hand-spock-o" aria-hidden="true"></i>
                        <span class="pull-right" href=""></span>
                        心情列表
                    </a>
                    <a href="<?php echo U('Moodimg/addMood');?>" class="list-group-item" >
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>
                        <span class="pull-right" href=""></span>
                        心情添加
                    </a>
                </ul>
                <!--心情管理 end-->

            </div>
        </div>
        <div class="col-xs-12 col-sm-9 col-lg-10">
            
    <form class="form-horizontal" id="form" onsubmit="return add()" action="" method="post">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">心情管理</h3>
            </div>
            <div class="panel-body">

                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">心情名称</label>
                    <div class="col-sm-9">
                        <input type="text" name="mood_name" class="form-control" placeholder="请填写心情名称">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">心情图片</label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <input type="text" class="form-control" name="pic" readonly="" value="">
                            <div class="input-group-btn">
                                <button onclick="upImage(this)" class="btn btn-default" type="button">选择图片
                                </button>
                            </div>
                        </div>
                        <script>
                            //上传图片
                            function upImage(obj) {
                                require(['util'], function (util) {
                                    options = {
                                        multiple: false,//是否允许多图上传
                                        data:'',
                                        hash:1
                                        //hash为确定上传文件标识（可以以用户编号，标识为此用户上传的文件，系统使用这个字段值来显示文件列表），data为数据表中的data字段值，开发者根据业务需要自行添加
                                    };
                                    util.image(function (images) {             //上传成功的图片，数组类型 
                                        $("[name='pic']").val(images[0]);
                                        $(".img-thumbnail").attr('src', images[0]);
                                    }, options)
                                });
                            }
                            //移除图片 
                            function removeImg(obj) {
                                $(obj).prev('img').attr('src', 'resource/images/nopic.jpg');
                                $(obj).parent().prev().find('input').val('');
                            }
                            //表单提交添加
                            function add()
                            {
                                var data = $('#form').serialize();
                                $.post("<?php echo U('addMood');?>",data,function(res){
//                                    alert(1);
//                                    console.log(res);
                                    /*if(res.valid)
                                    {
                                        util.message(res.message,"<?php echo U('index');?>",'success');
                                    }
                                    util.message(res.message,'','error');*/
                                    if(res.status)
                                    {
                                        util.message(res.info,"<?php echo U('index');?>",'success');
                                    }
                                    util.message(res.info,'','添加失败');
                                },"json")
                                return false;
                            }
                        </script>
                        <div class="input-group" style="margin-top:5px;">
                            <img src="/jingqi/Public/admin/images/nopic.jpg" class="img-responsive img-thumbnail liebiaotu" width="150">
                        </div>
                        <span class="help-block">建议大小(宽100高100)</span>
                    </div>
                </div>

                <div class="form-group">
                    <label for=""  class="col-sm-2 control-label">心情描述</label>
                    <div class="col-sm-9">
                        <textarea id="container" style="height:300px;width:100%;" name="mood_desc"></textarea>
                        <script>
                            util.ueditor('container', {hash:2,data:'hd'}, function (editor) {
                                //这是回调函数 editor是百度编辑器实例
                            });
                        </script>
                    </div>
                </div>

            </div>
        </div>
        <button class="btn btn-primary" type="submit">确定</button>
    </form>

        </div>
    </div>
</div>
<div class="master-footer" style="margin-top: 150px">

    <br>
    Powered by diandou ©
</div>
</body>
</html>
<script>
    require(['bootstrap'],function($){})
</script>