<extend name="./master" />

<block name="content">
	<div class="alert alert-info" role="alert">
        标签列表
    </div>
	<table class="table">
		<colgroup>
            <col class="col-xs-1">
            <col class="col-xs-4">
            <col class="col-xs-3">
        </colgroup>
		<!-- <thead> -->
			<tr class="danger">
				<th>tid</th>
				<th>标签名称</th>
				<th>操作</th>
			</tr>
		<!-- </thead> -->
		<tbody>
		<foreach name='tagData' item='v'>
			<tr>
				<td>{$v['tid']}</td>
				<td><div class="cut_title ellipsis">{$v['tname']}</div></td>
				<td>
					<a href="{:U('add',array('tid'=>$v['tid']))}" class="inner_btn warning_btn" role="button">编辑</a>
					<a href="{:U('del',array('tid'=>$v['tid']))}" class="inner_btn danger_btn">删除</a>
				</td>
			</tr>
		</foreach>
		</tbody>
	</table>

</block>