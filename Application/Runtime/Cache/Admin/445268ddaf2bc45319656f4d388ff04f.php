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
					<dd><a href="<?php echo U('Tag/index');?>" <?php if(CONTROLLER_NAME == 'Tag' AND ACTION_NAME == 'index'): ?>class="active"<?php endif; ?> >屏蔽器列表</a></dd>
					<dd><a href="<?php echo U('Tag/add');?>" <?php if(CONTROLLER_NAME == 'Tag' AND ACTION_NAME == 'add'): ?>class="active"<?php endif; ?> >添加屏蔽器</a></dd>
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
        分类列表
    </div>
	<table class="table">
		<colgroup>
            <col class="col-xs-1">
            <col class="col-xs-3">
            <col class="col-xs-1">
            <col class="col-xs-3">
        </colgroup>
		<!-- <thead> -->
			<tr class="danger">
				<th>cid</th>
				<th>分类名称</th>
				<th>pid</th>
				<th>操作</th>
			</tr>
		<!-- </thead> -->
		<tbody>
		<?php if(is_array($cateData)): foreach($cateData as $key=>$v): ?><tr>
				<td><?php echo ($v['cid']); ?></td>
				<td><div class="cut_title ellipsis"><?php echo ($v['_cname']); ?></div></td>
				<td><?php echo ($v['pid']); ?></td>
				<td>
					<a href="<?php echo U('addSon',array('cid'=>$v['cid']));?>" class="inner_btn">添加子类</a>
					<a href="<?php echo U('add',array('cid'=>$v['cid']));?>" class="inner_btn warning_btn" role="button">编辑</a>
					<a href="#" class="inner_btn danger_btn">删除</a>
				</td>
			</tr><?php endforeach; endif; ?>
		</tbody>
	</table>


		</div>
	</section>

</body>
</html>