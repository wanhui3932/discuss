<?php
header("content-type:text/html;charset=utf-8"); 
$db_host = "localhost";
$db_user = "root";
$db_pwd  = "123456";
$db_name = "bbs";
$like = @mysql_connect($db_host,$db_user,$db_pwd)or die("服务器连接失败");
if(!mysql_select_db($db_name)) die("数据库连接失败");
mysql_query("set names utf8");
function dump($arr=null)
{
	echo "<pre>";
	print_r($arr);
	echo "</pre>";
}
 ?>

