<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">

	<title>BLOG</title>

	<link href="/thinkphp3.2.3/Public/css/bootstrap.min.css" rel="stylesheet">

	<link rel="stylesheet" href="/thinkphp3.2.3/Public/admin/style.css">

    <script src="/thinkphp3.2.3/Public/js/jquery.min.js"></script>

	<script src="/thinkphp3.2.3/Public/admin/jquery.mCustomScrollbar.concat.min.js"></script>
	<style type="text/css">
	a:hover{
		text-decoration: none;
	}
	.mCustomScrollbar .adminPag a{
		font-weight: 700;font-size: 16px;
		background-color:#88A5C5;color: #E4FAF0;
	}
	</style>
</head>
<body>

	<header>
		<h1><img src="images/admin_logo.png"/></h1>
		<ul class="rt_nav">
			<li><a href="http://www.baidu.com" target="_blank" class="website_icon">站点首页</a></li>
			<li><a href="<?php echo U('Manager/index');?>" class="set_icon">权限查看</a></li>
			<li><a href="<?php echo U('Index/logout');?>" class="quit_icon">安全退出</a></li>
		</ul>
	</header>

	<aside class="lt_aside_nav content mCustomScrollbar">
		<h2 class="adminPag"><a href="<?php echo U('Index/index');?>">后台首页</a></h2>
		<ul>
			<li>
				<dl>
					<dt>用户管理</dt>
					<!--当前链接则添加class:active-->
					<dd><a href="<?php echo U('User/index');?>" <?php if(CONTROLLER_NAME == 'Cate' AND ACTION_NAME == 'index'): ?>class="active"<?php endif; ?>>用户列表</a></dd>
					<dd>
					<a href="<?php echo U('User/add');?>"
						<?php if(CONTROLLER_NAME == 'Cate' AND ACTION_NAME == 'add'): ?>class="active"<?php endif; ?> >添加用户
					</a>
					</dd>
				</dl>
			</li>
			<li>
				<dl>
					<dt>屏蔽器管理</dt>
					<dd><a href="<?php echo U('Shield/index');?>" <?php if(CONTROLLER_NAME == 'Shield' AND ACTION_NAME == 'index'): ?>class="active"<?php endif; ?> >屏蔽器列表</a></dd>
					<dd><a href="<?php echo U('Shield/add');?>" <?php if(CONTROLLER_NAME == 'Shield' AND ACTION_NAME == 'add'): ?>class="active"<?php endif; ?> >添加屏蔽器</a></dd>
				</dl>
			</li>
			<li>
				<dl>
					<dt>文章管理</dt>
					<dd><a href="<?php echo U('Art/index');?>" <?php if(CONTROLLER_NAME == 'Art' AND ACTION_NAME == 'index'): ?>class="active"<?php endif; ?> >文章列表</a></dd>
					<dd><a href="<?php echo U('Art/add');?>" <?php if(CONTROLLER_NAME == 'Art' AND ACTION_NAME == 'add'): ?>class="active"<?php endif; ?> >添加文章</a></dd>
					<dd><a href="#" >回收站</a></dd>
				</dl>
			</li>
		</ul>
	</aside>

	<section class="rt_wrap content mCustomScrollbar">
		<div class="rt_content">
		<!-- 右边分栏 -->
			

	<div class="alert alert-info" role="alert">
        温馨提示
    </div>
	 <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <colgroup>
                <col class="col-xs-1">
                <col class="col-xs-3">
                <col class="col-xs-1">
                <col class="col-xs-1">
                <col class="col-xs-2">
            </colgroup>
            <thead>
            <tr class="danger">
                <th>编号</th>
                <th>标题</th>
                <th>更新时间</th>
                <th>发布时间</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            <?php if(is_array($artData)): foreach($artData as $key=>$v): ?><tr>
                <td>
                    <?php echo ($v['aid']); ?>
                </td>
                <td><code><?php echo ($v['title']); ?></code></td>
                <td><?php echo (date("Y-m-d",$v['uptime'] )); ?></td>
                <td><?php echo (date("Y-m-d",$v['sendtime'] )); ?></td>
                <td>
                    <a class="inner_btn danger_btn" href="<?php echo U('del',array('aid'=>$v['aid']));?>">删除</a>
                    <a class="inner_btn warning_btn" href="<?php echo U('add',array('aid'=>$v['aid']));?>">编辑</a>
                </td>
            </tr><?php endforeach; endif; ?>

            </tbody>
        </table>
    </div>

		</div>
	</section>

</body>
</html>