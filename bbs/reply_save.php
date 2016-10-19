<?php
header("Content-Type:text/html;charset=utf-8");
//开启SESSION会话
session_start();
//连接数据库文件
include_once('./include/conn.php');
//判断表单是否提交
if(isset($_POST['ac']) && $_POST['ac']==$_SESSION['rand_value'])
{
	//获取表单提交值
	$uid = $_SESSION['uid'];
	$tid = $_POST['tid'];
	$content = $_POST['content'];
	$addate = time();
	//构建写入的SQL语句
	$sql = "INSERT INTO reply(uid,tid,content,addate) VALUES($uid,$tid,'$content',$addate)";
	mysql_query($sql);
	header("Location:content.php?id=$tid");
}



?>