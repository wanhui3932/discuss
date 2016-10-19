<?php
header("content-type:text/html;charset=utf-8");
//开启SESSION功能
session_start();
//判断用户是否存在
if(isset($_SESSION['username'])){
	//销毁SESSION文件
	session_destroy();
	//跳转页面
	$message = urlencode("退出论团");
	$url = "../index.php";
	echo "<script>location.href='./include/success.php?url=$url&message=$message'</script>";
	exit();
}else{
	$message = urlencode("非法操作");
	echo "<script>location.href='./include/crror.php?menssage=$message'</script>";
}

	

	

?>