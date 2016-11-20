<extend name='./master'/>

<block name='content'>
<link href="__PUBLIC__/info/iconfont.css" rel="stylesheet" type="text/css" media="all">
	<div class="alert alert-info" role="alert">

        <if condition="isset($_GET['tid'])">
        修改标签
        <else />
        添加标签
        </if>
    </div>
    <section>
    	<form action="" method ="post">
			<ul class="ulColumn2">
				<li>
					<span class="item_name">标签名称：</span>
					<textarea placeholder="多个标签添加用|隔开" class="textarea" name="tname">{$oldData['tname']}</textarea>
				</li>

				<li>
					<span class="item_name"></span>
					<input type="hidden" name="tid" value="{$oldData['tid']}" />
					<input type="submit" class="link_btn"/>
				</li>
			</ul>
		</form>
     </section>
</block>