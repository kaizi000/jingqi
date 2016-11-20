<extend name='./master'/>

<block name='content'>
<link href="__PUBLIC__/info/iconfont.css" rel="stylesheet" type="text/css" media="all">
	<div class="alert alert-info" role="alert">
        添加分类
    </div>
    <section>
    	<form action="" method ="post">
			<ul class="ulColumn2">
				<li>
					<span class="item_name">分类名称：</span>
					<input type="text" class="textbox textbox_295" placeholder="请输入分类名称" name="cname" value="{$oldData['cname']}"/>
					<!-- <span class="errorTips">错误提示信息...</span> -->
				</li>
				<li style="position: relative;">
					<span class="item_name">分类名称：</span>
					<select class="textbox_295 select" name="pid">
						<option value="0">顶级分类</option>
						<foreach name="select" item="v">
							<option value="{$v['cid']}">{$v['_cname']}</option>
						</foreach>
					</select>
					<i class="icon-down iconfont" style="position: absolute;left: 400px;top: 10px;font-weight: 700;"></i>
					<!-- <span class="errorTips">错误提示信息...</span> -->
				</li>

				<li>
					<span class="item_name">分类排序：</span>
					<input type="text" class="textbox textbox_295" placeholder="排序" name="csort" value="{$oldData['csort']}"/>
					<!-- <span class="errorTips">错误提示信息...</span> -->
				</li>

				<li>
					<span class="item_name">分类描述：</span>
					<textarea placeholder="分类描述" class="textarea" name="cdes">{$oldData['cdes']}</textarea>
				</li>

				<li>
					<span class="item_name"></span>
					<input type="hidden" name="cid" value="{$oldData['cid']}" />
					<input type="submit" class="link_btn"/>
				</li>
			</ul>
		</form>
     </section>
</block>