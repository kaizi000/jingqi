<extend name='./master'/>

<block name='content'>
<link href="__PUBLIC__/info/iconfont.css" rel="stylesheet" type="text/css" media="all">
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
						<option value="{$curCateData['cid']}">{$curCateData['cname']}</option>
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
</block>