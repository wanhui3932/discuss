<?php 
header("content-type:text/html;charset=utf-8");
//包含连接数据库
require_once("./include/conn.php");
session_start();
if(isset($_POST['ac']) && $_POST['ac'] == $_SESSION['suijizhi'])
{
 //获取表单提值
 $username = $_POST['username'];
 $password = md5($_POST['password']);
 $name     = $_POST['name'];
 $yanzhengma=$_POST['yanzhengma'];
 $addate   = time();//注册时间
 //判断验证码是否正确
 if(strtoupper($yanzhengma) != $_SESSION['yanzhengma'])
 {
 	//如果验证码 不正确跳到错误页面
 	$message = urlencode("验证码不正确");
 	header("location:./include/error.php?message=$message");
 	exit();
 }
 //判断该用户是否存在
$sql = "select * from user where username='$username'";
$result = mysql_query($sql);
$records = mysql_num_rows($result);
if($records===1){
	//用户存在跳转到错误页面
	$message=urlencode("该用户已被注册");
	header("location:./include/error.php?message=$message");
	exit();
	}
	//将数据写入数据库
	$sql = "insert into user(username,password,name,addate) values('$username','$password','$name',$addate)";
	//执行sql语句，跳到成功页面
	mysql_query($sql);
	$url = "../login.php";
	$message = urlencode("恭喜恭喜，正在跳转......");
	header("location:./include/success.php?url=$url&message=$message");
	exit();
}else{
	//如果条件为false
	$message = urlencode("非法操作");
	echo "<script>location.href='./include/error.php?message=$message'</script>";
	exit();
}
 ?>


