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
<!--		<h1><img src="images/admin_logo.png"/></h1>-->
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
			

<!--  -->
 <link href="/thinkphp3.2.3/Public/info/iconfont.css" rel="stylesheet" type="text/css" media="all">
 <script type="text/javascript">
 	$(function() {
 		/*$('.iconfont').click(function() {
 			$(this).hide().siblings('i').show();
 		})*/

 		// $();
 	})
 </script>

 <!-- 百度编辑器 -->
<script type="text/javascript" charset="utf-8" src="/thinkphp3.2.3/Public/ueditor1_4_3/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/thinkphp3.2.3/Public/ueditor1_4_3/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="utf-8" src="/thinkphp3.2.3/Public/ueditor1_4_3/lang/zh-cn/zh-cn.js"></script>

	<div class="alert alert-info" role="alert">
        添加文章
    </div>
    <section>
    	<form action="" method ="post" enctype="multipart/form-data">
		<ul class="ulColumn2">
			<li>
				<span class="item_name" >文章标题：</span>
				<input type="text" name="title" class="textbox textbox_295" placeholder="请输入文章标题" value="<?php echo ($artData['title']); ?>" />
				<!-- <span class="errorTips">错误提示信息...</span> -->
			</li>
			<li>
				<span class="item_name">作者：</span>
				<input type="text" name="author" value="<?php echo ($artData['title']); ?>" class="textbox textbox_295" placeholder="请输入作者"/>
				<!-- <span class="errorTips">错误提示信息...</span> -->
			</li>
			<li style="position: relative;">
				<span class="item_name">所属分类：</span>
				<select class="textbox_295 select" name="cate_cid">
					<option value="0">顶级分类</option>
					<?php if(is_array($cateData)): foreach($cateData as $key=>$v): ?><option <?php if(in_array($v['cid'],$cid)): ?>selected<?php endif; ?> value="<?php echo ($v['cid']); ?>"><?php echo ($v['_cname']); ?></option><?php endforeach; endif; ?>

					<!-- <option>顶级文章</option> -->
				</select>
				<i class="icon-down iconfont icondown" style=""></i>
				<!-- <span class="errorTips">错误提示信息...</span> -->
			</li>
			<li>
				<span class="item_name">文章关键字：</span>
				<input type="text" class="textbox textbox_295" value="<?php echo ($artData['title']); ?>" name="keyword" placeholder="请输入文章关键字"/>
				<!-- <span class="errorTips">错误提示信息...</span> -->
			</li>
			<li>
				<span class="item_name">文章排序：</span>
				<input type="text" name="sort" value="<?php echo ($artData['title']); ?>" class="textbox textbox_295" placeholder="排序"/>
				<!-- <span class="errorTips">错误提示信息...</span> -->
			</li>

			<li>
				<span class="item_name">文章标签：</span>
				<?php if(is_array($tagData)): foreach($tagData as $key=>$v): ?><label class="checkbox-inline" >
						<input class="custom-checkbox" type="checkbox" data-toggle="checkbox" name="tid[]" value="<?php echo ($v['tid']); ?>" <?php if(in_array($v['tid'],$tid)): ?>checked="checked"<?php endif; ?> >
						<!-- <span class="icons">
							<i class="icon-chencked iconfont" style="display: none;"></i>
							<i class="iconfont icon-uncheck" ></i>
						</span> -->
						<span style="margin-right: 10px;"><?php echo ($v['tname']); ?></span>
					</label><?php endforeach; endif; ?>
			</li>
			<li>
				<span class="item_name">缩略图：</span>
				<label class="uploadImg" style="display: none;">
					<input type="file" name="thumb" />
					<span>上传图片</span>
				</label>
				<label class="uploadImg">
					<img src="/thinkphp3.2.3<?php echo ($artData['thumb']); ?>">
				</label>
			</li>
			<li>
				<span class="item_name">文章描述：</span>
				<textarea placeholder="文章描述" name="des" class="textarea arttext" ><?php echo ($artData['title']); ?></textarea>
			</li>
			<li>
				<span class="item_name">文章正文：</span>
				<div class="left" style="width: 80%;margin-left: 120px;">
					<script id="editor" type="text/plain" style="height: 300px;" name="content" >
						<?php echo ($artData['title']); ?>
					</script>
				    <script>
				        var ue = UE.getEditor('editor');
				    </script>
			    </div>
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