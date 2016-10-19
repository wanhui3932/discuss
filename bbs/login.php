<?php 
header("content-type:text/html;charset=utf-8");
session_start();
$_SESSION['suijizhi']=uniqid();
//判断cookie是否存在
if(!empty($_COOKIE['username']) && !empty($_COOKIe['password']))
{
	$username = $_COOKIE['username'];
	$password = $_COOKIE['password'];
}else
{
	$username = "";
	$password = "";
}
 ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>用户登录</title>
<link href='./images/public.css' rel='stylesheet' type='text/css'>
</head>
<body>
<?php
//包含头部文件
include_once('./header.php');
?>
<!--用户注册-->
<div class="blank10"></div>
<div class="register">
	<div class="title">
		<span class="spanL">立即注册</span>
		<span class="spanR">已有账号？现在登录</span>
	</div>
	<form name="form1" method="post" action="login_save.php">
	<table width="600" border="0" align="center">
		<tr>
			<th width="100" align="right"><span class="rq">*</span> 用 户 名：</th>
			<td><input type="text" value="<?php echo $username?>" name="username"  size="25" class="px"></td>
		</tr>
		<tr>
			<th align="right"><span class="rq">*</span> 输入密码：</th>
			<td><input name="password" value="<?php echo $password?>" type="password" size="25" class="px"></td>
		</tr>
		<tr>
			<th align="right">&nbsp;</th>
			<td><input name="expire" type="checkbox" value="604800" checked='checked'> 自动登录(保存一周)</td>
		</tr>
		<tr>
			<th>&nbsp;</th>
			<td>
				<button class="pn pnc" id="registerformsubmit" type="submit"><strong>登录</strong></button>
				<input type="hidden" name="ac" value="<?php echo $_SESSION['suijizhi']?>">
			</td>
		</tr>
	</table>
	</form>
</div><!--//用户注册-->
<?php
//包含页脚文件
include_once('./footer.php');
?>