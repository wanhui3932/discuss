<?php
header("content-type:text/html;charset=utf-8");
//验证码相关参数
$filename = "../images/yanzhengma.png";
$fontsize = 20;
$fontfile = "../images/Candarai.ttf";
$str      = "";
//随机验证码
$arr = array_merge(range('A','Z'),range(1,9));
shuffle($arr);
shuffle($arr);
shuffle($arr);
shuffle($arr);
$arr_index = array_rand($arr,4);
shuffle($arr_index);
foreach ($arr_index as $value) {
	$str .=$arr[$value]; 
}
session_start();
$_SESSION['yanzhengma'] = $str;
$img = imagecreatefrompng($filename);
$blue = imagecolorallocate($img,255,0,0);
//写入字符串
imagettftext($img,$fontsize,0,15,25,$blue,$fontfile,$str);
//输出图像到浏览器
header("content-type:image/png");
imagepng($img);
imagedestroy($img);
?>