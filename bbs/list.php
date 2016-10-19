<?php
//开启SESSION会话
session_start();
//包含连接数据库的文件
include_once('./include/conn.php');
/***********************贴子列表分页******************************/
//(1)每页显示记录数
$pagesize = 10;
//(2)获取地址栏用户的页码
if(empty($_GET['page']))
{
	$page = 1;
	$startrow = 0;
}else
{
	$page = $_GET['page'];
	$startrow = ($page-1)*$pagesize;
}
//(3)取出总记录数、总页数
$sql = "SELECT count(id) AS total FROM thread";
$result = mysql_query($sql);
$arr = mysql_fetch_array($result);
$records = $arr['total']; //总记录数
$pages   = ceil($records/$pagesize); //总页数
//(4)构建分页的SQL语句
$sql = "SELECT a.id,a.title,a.uid,a.addate,b.name FROM thread AS a LEFT JOIN user AS b ON a.uid=b.id ORDER BY a.id DESC LIMIT $startrow,$pagesize";
//执行SQL语句
$result = mysql_query($sql);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>主题页</title>
<link href='./images/public.css' rel='stylesheet' type='text/css'>
</head>

<body>
<?php
//包含头部文件
include_once('./header.php');
?>
<!--box-->
<div class="blank10"></div>
<div class="box">
<!--左边栏-->
<div class="left">
	<!--主题列表-->
	<div class="list">
		<div class="title">
			<a href="./index.php">论坛</a><img src="./images/pt_item.png">
			<a href='./list.php'>讨论专区</a><img src="./images/pt_item.png">
			大家说说说
		</div>
		<div class="content">
			<ul>
				<?php
				//循环读出所有贴子
				while($arr = mysql_fetch_assoc($result)){
				?>
				<li>
					<img src="./images/15_avatar_small.jpg">
					<h4><a href="content.php?id=<?php echo $arr['id']?>" target="_blank"><?php echo $arr['title']?></a></h4>
					<p>楼主：<?php echo $arr['name']?>&nbsp;&nbsp;<?php echo date("Y-m-d H:i:s",$arr['addate'])?></p>
					<div class="blank"></div>
				</li>
				<?php }	?>
			</ul>
			<div class="pagelist">
				<?php
				//循环读取所有页码
				$start = $page-5;
				$end   = $page+4;
				if($page<6)
				{
					$end = $end+6-$page;
					$start = 1;
				}
				if($end>$pages || $pages-4<$page)
				{
					$end = $pages;
					$start = $pages-10+1;
				}
				if($pages<=10){
					$end = $pages;
					$start = 1;
				}
				for($i=$start;$i<=$end;$i++)
				{
					//判断是不是当前页面(用户单击的页码)
					if($page==$i)
					{
						//如果是当前页，不加链接，但加当前样式
						echo "<span class='current'>$i</span> ";
					}else
					{
						//如果不是当前页，就加链接
						echo "<a href='list.php?page=$i'>$i</a> ";
					}
				}
				
				?>
				
			</div>
		</div><!--//content-->
		<div class="blank"></div>
	</div><!--//主题列表-->
	<div class="blank10"></div>
</div><!--//左边栏-->
<!--右边栏-->
<div class="right">
	<?php
	//判断用户是否存在
	if(isset($_SESSION['username']))
	{
		$value = "location.href='send.php'";
	}else{
		$value = "void(0)";
	}
	?>
	<img src="images/thread_post.png" onclick="javascript:<?php echo $value?>" width="270">
	<!--最新主题-->
	<div class="recommend">
		<h4>最新主题</h4>
		<ul>
			<li><a href="javascript:void(0)">PS基础班0406期第六天作业贴</a></li>
			<li><a href="javascript:void(0)">一个完整的UI设计流程是怎样的？</a></li>
			<li><a href="javascript:void(0)">为什么你单身，你真的考虑过吗？</a></li>
			<li><a href="javascript:void(0)">今天你的朋友圈有被点赞吗？</a></li>
			<li><a href="javascript:void(0)">你或许知道或许不知道的hello world</a></li>
			<li><a href="javascript:void(0)">2015年交互设计趋势回顾</a></li>
			<li><a href="javascript:void(0)">PS基础之自然饱和度和色相饱和度</a></li>
			<li><a href="javascript:void(0)">德国前副总理成都过生吃川菜(图)</a></li>
			<li><a href="javascript:void(0)">西藏警方否认拘留“圣湖拍裸照”摄影师</a></li>
		</ul>
	</div><!--//最新主题-->
	<!--推荐阅读-->
	<div class="recommend">
		<h4>推荐阅读</h4>
		<ul>
			<li><a href="javascript:void(0)">PS基础班0406期第六天作业贴</a></li>
			<li><a href="javascript:void(0)">一个完整的UI设计流程是怎样的？</a></li>
			<li><a href="javascript:void(0)">为什么你单身，你真的考虑过吗？</a></li>
			<li><a href="javascript:void(0)">今天你的朋友圈有被点赞吗？</a></li>
			<li><a href="javascript:void(0)">你或许知道或许不知道的hello world</a></li>
			<li><a href="javascript:void(0)">2015年交互设计趋势回顾</a></li>
			<li><a href="javascript:void(0)">PS基础之自然饱和度和色相饱和度</a></li>
			<li><a href="javascript:void(0)">德国前副总理成都过生吃川菜(图)</a></li>
			<li><a href="javascript:void(0)">西藏警方否认拘留“圣湖拍裸照”摄影师</a></li>
		</ul>
	</div><!--//推荐阅读-->
	<img src="images/right02.jpg" width="270">
	<img src="images/right03.jpg" width="270">
	<img src="images/right04.jpg" width="270">
</div><!--//右边栏-->
<div class="blank10"></div>
</div><!--//box--><?php
//包含页脚文件
include_once('./footer.php');
?>