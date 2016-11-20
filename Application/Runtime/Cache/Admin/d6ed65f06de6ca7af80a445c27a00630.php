<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">

	<title>BLOG</title>

	<link href="/Thinkphp/thinkphp3.2.3/Public/css/bootstrap.min.css" rel="stylesheet">

	<link rel="stylesheet" href="/Thinkphp/thinkphp3.2.3/Public/admin/style.css">

    <script src="/Thinkphp/thinkphp3.2.3/Public/js/jquery.min.js"></script>

	<script src="/Thinkphp/thinkphp3.2.3/Public/admin/jquery.mCustomScrollbar.concat.min.js"></script>
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
			<li><a href="#" class="admin_icon">DeathGhost</a></li>
			<li><a href="#" class="set_icon">账号设置</a></li>
			<li><a href="login.php" class="quit_icon">安全退出</a></li>
		</ul>
	</header>

	<aside class="lt_aside_nav content mCustomScrollbar">
		<h2 class="adminPag"><a href="<?php echo U('Index/index');?>">后台首页</a></h2>
		<ul>
			<li>
				<dl>
					<dt>分类管理</dt>
					<!--当前链接则添加class:active-->
					<dd><a href="<?php echo U('Cate/index');?>" <?php if(CONTROLLER_NAME == 'Cate' AND ACTION_NAME == 'index'): ?>class="active"<?php endif; ?>>分类列表</a></dd>
					<dd>
					<a href="<?php echo U('Cate/add');?>"
						<?php if(CONTROLLER_NAME == 'Cate' AND ACTION_NAME == 'add'): ?>class="active"<?php endif; ?> >添加分类
					</a>
					</dd>
				</dl>
			</li>
			<li>
				<dl>
					<dt>标签管理</dt>
					<dd><a href="#" <?php if(CONTROLLER_NAME == 'Tag' AND ACTION_NAME == 'index'): ?>class="active"<?php endif; ?> >标签列表</a></dd>
					<dd><a href="#" <?php if(CONTROLLER_NAME == 'Tag' AND ACTION_NAME == 'add'): ?>class="active"<?php endif; ?> >添加标签</a></dd>
				</dl>
			</li>
			<!-- <li>
				<dl>
					<dt>标签管理</dt>
					<dd><a href="#" >标签列表</a></dd>
					<dd><a href="#" >添加标签</a></dd>
				</dl>
			</li> -->
			<li>
				<dl>
					<dt>文章管理</dt>
					<dd><a href="#" <?php if(CONTROLLER_NAME == 'Art' AND ACTION_NAME == 'index'): ?>class="active"<?php endif; ?> >文章列表</a></dd>
					<dd><a href="<?php echo U('Art/add');?>" <?php if(CONTROLLER_NAME == 'Art' AND ACTION_NAME == 'add'): ?>class="active"<?php endif; ?> >添加文章</a></dd>
					<dd><a href="#" >回收站</a></dd>
				</dl>
			</li>
			<li>
				<dl>
					<dt>友情链接</dt>
					<dd><a href="#">友链列表</a></dd>
					<dd><a href="#">添加友链</a></dd>
				</dl>
			</li>
		</ul>
	</aside>

	<section class="rt_wrap content mCustomScrollbar">
		<div class="rt_content">
		<!-- 右边分栏 -->
			
<link href="/Thinkphp/thinkphp3.2.3/Public/info/iconfont.css" rel="stylesheet" type="text/css" media="all">
	<div class="alert alert-info" role="alert">
        添加子分类
    </div>
    <section>
    	<form action="" method ="post">
			<ul class="ulColumn2">
				<li>
					<span class="item_name">子分类名称：</span>
					<input type="text" class="textbox textbox_295" placeholder="请输入子分类名称" name="cname" />
					<!-- <span class="errorTips">错误提示信息...</span> -->
				</li>
				<li style="position: relative;">
					<span class="item_name">子分类名称：</span>
					<select class="textbox_295 select" name="pid">
						<option value="<?php echo ($curCateData['cid']); ?>"><?php echo ($curCateData['cname']); ?></option>
					</select>
					<i class="icon-down iconfont" style="position: absolute;left: 400px;top: 10px;font-weight: 700;"></i>
					<!-- <span class="errorTips">错误提示信息...</span> -->
				</li>

				<li>
					<span class="item_name">子分类排序：</span>
					<input type="text" class="textbox textbox_295" placeholder="排序" name="csort" />
					<!-- <span class="errorTips">错误提示信息...</span> -->
				</li>

				<li>
					<span class="item_name">子分类描述：</span>
					<textarea placeholder="子分类描述" class="textarea" name="cdes"></textarea>
				</li>

				<li>
					<span class="item_name"></span>
					<input type="submit" class="link_btn"/>
				</li>
			</ul>
		</form>
     </section>

		</div>
	</section>

</body>
</html>