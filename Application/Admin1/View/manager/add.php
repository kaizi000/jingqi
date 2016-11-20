<extend name="./master" />

<block name="content">
	<div class="alert alert-info" role="alert" style="overflow: hidden;">
        <h3 style="font-size: 24px;float: left;">网站管理员</h3>
        <a href="{:U('Manager/index')}" class="btn btn-info btn-lg" style="float: right;">返回列表</a>
    </div>
    <form action="" method="post">
    <div class="table-responsive">
		<table class="table table-bordered table-striped">
			<colgroup>
				<col class="col-xs-12 col-sm-1 col-md-1 col-lg-1">
				<col class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
			</colgroup>

			<tr>
				<td width="100" align="right">管理员名称</td>
				<td>
					<input type="text" name="user_name" size="40" class="inpMain" />
				</td>
			</tr>
			<tr>
				<td width="100" align="right">E-mail地址</td>
				<td>
					<input type="text" name="email" size="40" class="inpMain" />
				</td>
			</tr>
			<tr>
				<td align="right">密码</td>
				<td>
					<input type="password" name="password" size="40" class="inpMain" />
				</td>
			</tr>
			<tr>
				<td align="right">确认密码</td>
				<td>
					<input type="password" name="password_confirm" size="40" class="inpMain" />
				</td>
			</tr>
			<tr>
				<td></td>
				<td>
					<!-- <input type="hidden" name="token" value="" /> -->
					<input type="submit" name="submit" class="btn btn-primary" value="提交" />
				</td>
			</tr>
		</table>
	</div>
	</form>
</block>