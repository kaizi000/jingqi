<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">

	<title>BLOG</title>

	<link href="__PUBLIC__/css/bootstrap.min.css" rel="stylesheet">

	<link rel="stylesheet" href="__PUBLIC__/admin/style.css">

    <script src="__PUBLIC__/js/jquery.min.js"></script>

	<script src="__PUBLIC__/admin/jquery.mCustomScrollbar.concat.min.js"></script>
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
			<li><a href="{:U('Manager/index')}" class="set_icon">权限查看</a></li>
			<li><a href="{:U('Index/logout')}" class="quit_icon">安全退出</a></li>
		</ul>
	</header>

	<aside class="lt_aside_nav content mCustomScrollbar">
		<h2 class="adminPag"><a href="{:U('Index/index')}">后台首页</a></h2>
		<ul>
			<li>
				<dl>
					<dt>用户管理</dt>
					<!--当前链接则添加class:active-->
					<dd><a href="{:U('User/index')}" <if condition="CONTROLLER_NAME eq 'User' AND ACTION_NAME eq 'index'"> class="active" </if>>用户列表</a></dd>
					<dd>
					<a href="{:U('User/add')}"
						<if condition="CONTROLLER_NAME eq 'User' AND ACTION_NAME eq 'add'"> class="active" </if> >添加用户
					</a>
					</dd>
				</dl>
			</li>
			<li>
				<dl>
					<dt>屏蔽器管理</dt>
					<dd><a href="{:U('Shield/index')}" <if condition="CONTROLLER_NAME eq 'Shield' AND ACTION_NAME eq 'index'"> class="active" </if> >屏蔽器列表</a></dd>
					<dd><a href="{:U('Shield/add')}" <if condition="CONTROLLER_NAME eq 'Shield' AND ACTION_NAME eq 'add'"> class="active" </if> >添加屏蔽器</a></dd>
				</dl>
			</li>
			<li>
				<dl>
					<dt>推荐内容</dt>
					<dd><a href="{:U('Art/index')}" <if condition="CONTROLLER_NAME eq 'Art' AND ACTION_NAME eq 'index'"> class="active" </if> >文章列表</a></dd>
					<dd><a href="{:U('Art/add')}" <if condition="CONTROLLER_NAME eq 'Art' AND ACTION_NAME eq 'add'"> class="active" </if> >添加文章</a></dd>
					<dd><a href="#" >回收站</a></dd>
				</dl>
			</li>
		</ul>
	</aside>

	<section class="rt_wrap content mCustomScrollbar">
		<div class="rt_content">
		<!-- 右边分栏 -->
			<block name='content'></block>
		</div>
	</section>

</body>
</html>