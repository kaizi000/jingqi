<extend name='./master'/>

<block name='content'>

<!-- <include file="__PUBLIC__/info/iconfont.css"/> -->
 <link href="__PUBLIC__/info/iconfont.css" rel="stylesheet" type="text/css" media="all">
 <script type="text/javascript">
 	$(function() {
 		/*$('.iconfont').click(function() {
 			$(this).hide().siblings('i').show();
 		})*/

 		// $();
 	})
 </script>

 <!-- 百度编辑器 -->
<script type="text/javascript" charset="utf-8" src="__PUBLIC__/ueditor1_4_3/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="__PUBLIC__/ueditor1_4_3/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="utf-8" src="__PUBLIC__/ueditor1_4_3/lang/zh-cn/zh-cn.js"></script>

	<div class="alert alert-info" role="alert">
        添加文章
    </div>
    <section>
    	<form action="" method ="post" enctype="multipart/form-data">
		<ul class="ulColumn2">
			<li>
				<span class="item_name" >文章标题：</span>
				<input type="text" name="title" class="textbox textbox_295" placeholder="请输入文章标题" value="{$artData['title']}" />
				<!-- <span class="errorTips">错误提示信息...</span> -->
			</li>
			<li>
				<span class="item_name">作者：</span>
				<input type="text" name="author" value="{$artData['title']}" class="textbox textbox_295" placeholder="请输入作者"/>
				<!-- <span class="errorTips">错误提示信息...</span> -->
			</li>
			<li style="position: relative;">
				<span class="item_name">所属分类：</span>
				<select class="textbox_295 select" name="cate_cid">
					<option value="0">顶级分类</option>
					<foreach name="cateData" item="v">
						<option <if condition="in_array($v['cid'],$cid)"> selected </if> value="{$v['cid']}">{$v['_cname']}</option>
					</foreach>

					<!-- <option>顶级文章</option> -->
				</select>
				<i class="icon-down iconfont icondown" style=""></i>
				<!-- <span class="errorTips">错误提示信息...</span> -->
			</li>
			<li>
				<span class="item_name">文章关键字：</span>
				<input type="text" class="textbox textbox_295" value="{$artData['title']}" name="keyword" placeholder="请输入文章关键字"/>
				<!-- <span class="errorTips">错误提示信息...</span> -->
			</li>
			<li>
				<span class="item_name">文章排序：</span>
				<input type="text" name="sort" value="{$artData['title']}" class="textbox textbox_295" placeholder="排序"/>
				<!-- <span class="errorTips">错误提示信息...</span> -->
			</li>

			<li>
				<span class="item_name">文章标签：</span>
				<foreach name='tagData' item='v'>
					<label class="checkbox-inline" >
						<input class="custom-checkbox" type="checkbox" data-toggle="checkbox" name="tid[]" value="{$v['tid']}" <if condition="in_array($v['tid'],$tid)">checked="checked"</if> >
						<!-- <span class="icons">
							<i class="icon-chencked iconfont" style="display: none;"></i>
							<i class="iconfont icon-uncheck" ></i>
						</span> -->
						<span style="margin-right: 10px;">{$v['tname']}</span>
					</label>

				</foreach>
			</li>
			<li>
				<span class="item_name">缩略图：</span>
				<label class="uploadImg" style="display: none;">
					<input type="file" name="thumb" />
					<span>上传图片</span>
				</label>
				<label class="uploadImg">
					<img src="__ROOT__{$artData['thumb']}">
				</label>
			</li>
			<li>
				<span class="item_name">文章描述：</span>
				<textarea placeholder="文章描述" name="des" class="textarea arttext" >{$artData['title']}</textarea>
			</li>
			<li>
				<span class="item_name">文章正文：</span>
				<div class="left" style="width: 80%;margin-left: 120px;">
					<script id="editor" type="text/plain" style="height: 300px;" name="content" >
						{$artData['title']}
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
</block>