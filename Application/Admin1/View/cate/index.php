<extend name="./master" />

<block name="content">
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
		<foreach name='cateData' item='v'>
			<tr>
				<td>{$v['cid']}</td>
				<td><div class="cut_title ellipsis">{$v['_cname']}</div></td>
				<td>{$v['pid']}</td>
				<td>
					<a href="{:U('addSon',array('cid'=>$v['cid']))}" class="inner_btn">添加子类</a>
					<a href="{:U('add',array('cid'=>$v['cid']))}" class="inner_btn warning_btn" role="button">编辑</a>
					<a href="#" class="inner_btn danger_btn">删除</a>
				</td>
			</tr>
		</foreach>
		</tbody>
	</table>

</block>