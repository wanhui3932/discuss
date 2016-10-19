<?php
header('Content-Type:text/html;charset=utf-8');
include_once('./include/conn.php');//连接数据库
//开启SESSION会话
session_start();
//判断用户是否存在
if(!isset($_SESSION['username']))
{
	header('Location:login.php');
}
//判断表单是否提交
if(isset($_POST['ac']) && $_POST['ac']==$_SESSION['rand_value'])
{
	//获取表单提交值
	$title = $_POST['title'];
	$content = $_POST['content'];
	$addate = time();
	$uid = $_SESSION['uid'];
	//构建插入的SQL语句
	$sql = "INSERT INTO thread(uid,title,content,addate) VALUES($uid,'$title','$content',$addate)";
	//执行SQL语句
	mysql_query($sql);
	header("Location:list.php");
}

?>
