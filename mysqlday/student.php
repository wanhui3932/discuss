<?php 
	header("content-type:text/html;charset=utf-8");
	$db_host = "localhost";
	$db_user = "root";
	$db_pwd  = "123456";
	$db_name = "wanhui";
	$link = @mysql_connect($db_host,$db_user,$db_pwd) or die("服务器连接失败");
	$link = @mysql_select_db($db_name) or die("数据库连接失败");
	mysql_query("set names utf8");
	$sql = "select * from student order by id desc";
	$result = mysql_query($sql);
?>