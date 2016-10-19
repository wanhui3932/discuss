<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>用户注册</title>
<link href='./images/public.css' rel='stylesheet' type='text/css'>
<script type="text/javascript">
//定义表单验证的函数
function checkFrom(){
	//定义正则表达式
	var reg = /^[a-z0-9A-Z]{4,12}$/;
	if(!reg.test(document.form1.username.value)){
		window.alert("用户名必须4-12个字符");
		return false;
	}else if(!reg.test(document.form1.password.value)){
		window.alert("密码必须是4-12个字符");
		return false;
	}else if(document.form1.password.value != document.form1.repassword.value){
		window.alert("两次密码输入不一致");
		return false;
	}else if(document.form1.name.value.length<2 || document.form1.name.value.length>=4){
		window.alert("名字长度不对");
		return false;
	}else if(document.form1.yanzhengma.value.length!=4){
		window.alert("验证码不对");
		return false;
	}else{
		return true;
	}

}
</script>
</head>
<body>
<?php
//包含网页头文件
require_once("./header.php");
//产生一个随机值
session_start();
$_SESSION['suijizhi'] = uniqid();
/*echo "<pre>";
print_r($_SESSION);
echo "</pre>";*/
?>
<!--用户注册-->
<div class="blank10"></div>
<div class="register">
	<div class="title">
		<span class="spanL">立即注册</span>
		<span class="spanR">已有账号？现在登录</span>
	</div>
	<form name="form1" method="post" action="register_save.php" onsubmit="return checkFrom()">
	<table width="600" border="0" align="center">
		<tr>
			<th width="100" align="right"><span class="rq">*</span> 用 户 名：</th>
			<td><input type="text" name="username"  size="25" class="px"></td>
		</tr>
		<tr>
			<th align="right"><span class="rq">*</span> 输入密码：</th>
			<td><input name="password" type="password" size="25" class="px"></td>
		</tr>
		<tr>
			<th align="right"><span class="rq">*</span> 重复密码：</th>
			<td><input name="repassword" type="password" size="25" class="px"></td>
		</tr>
		<tr>
			<th align="right"><span class="rq">*</span> 真实姓名：</th>
			<td><input name="name" type="text" size="25" class="px"></td>
		</tr>
		<tr>
			<th align="right"><span class="rq">*</span> 验证码：</th>
			<td>
				<input name="yanzhengma" type="text" maxlength='4' style='width:50px;' class="floatL px">
				<img onclick="jump(this)" style="cursor:pointer;float:left;margin-left:10px;" src='./include/yanzhengma.php'>
				<script type="text/javascript">
					function jump(obj){
					//随机验证码
					obj.src = "./include/yanzhengma.php?"+Math.random();
					}
				</script>
			
			
			</td>
		</tr>
		<tr>
			<th>&nbsp;</th>
			<td>
				<button class="pn pnc" id="registerformsubmit" type="submit" name="regsubmit" value="true" tabindex="1"><strong>提交</strong></button>
				<input type="hidden" name="ac" value="<?php echo $_SESSION['suijizhi']?>">
			</td>
		</tr>
	</table>
	</form>
</div><!--//用户注册-->
<?php
//包含页脚文件
require_once("./footer.php");
?>