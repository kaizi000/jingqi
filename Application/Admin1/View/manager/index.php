<extend name="./master" />

<block name="content">
	<div class="alert alert-info" role="alert" style="overflow: hidden;">
        <h3 style="font-size: 24px;float: left;">角色列表</h3>
        <a href="{:U('Manager/add')}" class="btn btn-info btn-lg" style="float: right;">权限设置</a>
    </div>
	 <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
	            <tr class="danger">
					<th>编号</th>
					<th>管理员名称</th>
					<th>用户组</th>
					<th>E-mail地址</th>
					<th>添加时间</th>
					<th>最后登录时间</th>
					<th>操作</th>
	            </tr>
            </thead>
            <tbody>
	            <tr>
	                <td>1</td>
				      <td>
				      	<code>admin</code>
				      </td>
				      <td></td>
				      <td></td>
				      <td>2016-02-25</td>
				      <td>2016-02-26 20:53:17</td>
				      <td>
							<a href="" class="inner_btn warning_btn" role="button">编辑</a>
							<a href="" class="inner_btn danger_btn">删除</a>
				      </td>
	            </tr>
            </tbody>
        </table>
    </div>
</block>