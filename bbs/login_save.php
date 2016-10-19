<?php
header('Content-Type:text/html;charset=utf-8');
//开启SESSION功能
session_start();
//连接数据库文件
require_once("./include/conn.php");
//判断表单是否提交
if(isset($_POST['ac']) && $_POST['ac']==$_SESSION['suijizhi'])
{
	//(0)获取表单提交值
	$username = $_POST['username'];
	$password = $_POST['password'];
	$expire   = $_POST['expire'];
	//(1)将用户数据，与数据库比对
	$sql = "select * from user where username='$username' and password='".md5($password)."'";
	$result = mysql_query($sql);
	$row    = mysql_fetch_assoc($result);
	$adc    = mysql_num_rows($result);
	if($adc===0){
		$message = urlencode("用户名密码错误");
		echo "<script>location.href='./include/error.php?message=$message'</script>";
		exit();
	}
	
	//(2)更新用户的资料：最后登录时间、最后登录IP
	$lastloginip = $_SERVER['REMOTE_ADDR'];
	$lastlogintime = time();
	$sql = "update user set lastloginip='$lastloginip',lastlogintime='$lastlogintime' where username='$username'";
	if(mysql_query($sql))
	{
		//(3)将用户名和id信息写入session
		$_SESSION['username'] = $username;
		$_SESSION['uid'] = $row['id'];
		//(4)将用户名和密码存入cookie
		setcookie("username",$username,time()+$expire);
		setcookie("password",$password,time()+$expire);
		//(5)跳转到成功页面
		$url ="../index.php";
		$message = urlencode("用户登录成功，正在跳转......");
		header("location:./include/success.php?url=$url&message=$message");
		exit();
	}
}else{
	//条件为false跳转错误页面
	$message = urlencode("非法用户");
	header("location:./include/error.php?message=$message");
	exit();
}

?>