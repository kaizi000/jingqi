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
            
    <table class="table table-bordered table-striped">
        <colgroup>
            <col class="col-xs-1">
            <col class="col-xs-1">
            <col class="col-xs-3">
            <col class="col-xs-2">
            <col class="col-xs-2">
        </colgroup>
        <thead>
        <tr>
            <th>编号</th>
            <th>心情标题</th>
            <th>心情描述</th>
            <th>心情图</th>
<!--            <th>记录</th>-->
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        <?php if(is_array($moodData)): foreach($moodData as $key=>$v): ?><tr>
                <td><?php echo ($v["mid"]); ?></td>
                <td>
                    <?php echo ($v["mood_name"]); ?>
                </td>
                <td>
                    <?php echo ($v["mood_desc"]); ?>
                </td>
                <td>
                    <img src="<?php echo ($v["pic"]); ?>" alt="" style="width:100px;">
                </td>
            <td>
                <div class="btn-group">
                    <a href="" role="button" class="btn btn-warning">修改<a/>
                    <a href="" role="button" class="btn btn-danger">删除<a/>
                </div>
            </td><?php endforeach; endif; ?>
        </tbody>
    </table>

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