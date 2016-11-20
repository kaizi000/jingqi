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
		<h1>
            <img src="images/admin_logo.png"/>
        </h1>
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
					<dd><a href="<?php echo U('User/index');?>" <?php if(CONTROLLER_NAME == 'User' AND ACTION_NAME == 'index'): ?>class="active"<?php endif; ?>>用户列表</a></dd>
					<dd>
					<a href="<?php echo U('User/add');?>"
						<?php if(CONTROLLER_NAME == 'User' AND ACTION_NAME == 'add'): ?>class="active"<?php endif; ?> >添加用户
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
					<dt>推荐内容</dt>
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
			
	<div class="alert alert-info" role="alert" style="overflow: hidden;">
        <h3 style="font-size: 24px;float: left;">网站管理员</h3>
        <a href="<?php echo U('Manager/index');?>" class="btn btn-info btn-lg" style="float: right;">返回列表</a>
    </div>
    <form action="" method="post">
    <div class="table-responsive">
		<table class="table table-bordered table-striped">
			<colgroup>
				<col class="col-xs-12 col-sm-1 col-md-1 col-lg-1">
				<col class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
			</colgroup>

			<tr>
				<td width="100" align="right">管理员名称</td>
				<td>
					<input type="text" name="user_name" size="40" class="inpMain" />
				</td>
			</tr>
			<tr>
				<td width="100" align="right">E-mail地址</td>
				<td>
					<input type="text" name="email" size="40" class="inpMain" />
				</td>
			</tr>
			<tr>
				<td align="right">密码</td>
				<td>
					<input type="password" name="password" size="40" class="inpMain" />
				</td>
			</tr>
			<tr>
				<td align="right">确认密码</td>
				<td>
					<input type="password" name="password_confirm" size="40" class="inpMain" />
				</td>
			</tr>
			<tr>
				<td></td>
				<td>
					<!-- <input type="hidden" name="token" value="" /> -->
					<input type="submit" name="submit" class="btn btn-primary" value="提交" />
				</td>
			</tr>
		</table>
	</div>
	</form>

		</div>
	</section>

</body>
</html>