<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<title>后台登录</title>
<meta name="author" content="DeathGhost" />

<link rel="stylesheet" type="text/css" href="__PUBLIC__/admin/style.css" />
<style>
body{height:100%;background:#16a085;overflow:hidden;}

</style>
<script type="text/javascript" src="__PUBLIC__/jquery.min.js"></script>
<script type="text/javascript">
$(function() {
$("[name='user']").blur(function() {

})
})
</script>
</head>
<body>
<dl class="admin_login">
<dt>
<strong>后台管理系统</strong>
<em>Management System</em>
</dt>
<dd class="user_icon">
<input type="text" placeholder="账号" class="login_txtbx" name="user" />
</dd>
<dd class="pwd_icon">
<input type="password" placeholder="密码" class="login_txtbx" name="paw" />
</dd>
<dd class="val_icon">
<div class="checkcode">
<input type="text" name="code" placeholder="验证码" maxlength="4" class="login_txtbx">
</div>
<p>放验证码</p>
</dd>
<dd>
<input type="button" value="立即登陆" class="submit_btn"/>
</dd>
</dl>
</body>
</html>
