<?php
//开启SESSION会话
session_start();
$_SESSION['rand_value'] = uniqid();
//包含连接数据库的文件
include_once('./include/conn.php');
/***********************读取贴子的内容*******************************/
//获取地址栏的ID参数
$id = $_GET['id'];
//构建查询的SQL语句
$sql = "SELECT * FROM thread WHERE id=$id";
//执行SQL语句，并返回结果集
$result = mysql_query($sql);
//取出一条记录
$arr = mysql_fetch_assoc($result);
//根据uid从user表中，取出name的值
$sql2 = "SELECT id,name FROM user WHERE id=".$arr['uid'];
$result2 = mysql_query($sql2);
$arr2 = mysql_fetch_assoc($result2);
$name = $arr2['name'];
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>贴子内容页</title>
<link href='./images/public.css' rel='stylesheet' type='text/css'>
<script charset="utf-8" src="js/editor/kindeditor-min.js"></script>
<script charset="utf-8" src="js/editor/lang/zh_CN.js"></script>
<script>
//加入在线编辑器
var editor;
KindEditor.ready(function(K) {
	editor = K.create('textarea[name="content"]', {
		allowFileManager : true
	});
});
</script>
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
	<!--主题内容-->
	<div class="detail">
		<div class="title">
			<a href="./index.php">论坛</a><img src="./images/pt_item.png">
			<a href='./list.php'>讨论专区</a><img src="./images/pt_item.png">
			<a href='./list.php'>大家说说说</a><img src="./images/pt_item.png">
			查看内容
		</div>
		<div class="content">
			<div class="thread">
				<h4><?php echo $arr['title']?></h4>
				<div class='user'>
					<img src="./images/noavatar_small.gif">
					<span><b><?php echo $name;?></b>&nbsp;&nbsp;发表于<?php echo date('Y-m-d H:i:s',$arr['addate']);?></span>
				</div>
				<div class="content">
					<?php echo $arr['content']?>
				</div>
			</div><!--//thread-content-->
			<?php
			//读取当前贴子的，所有回复内容
			$sql3 = "SELECT * FROM reply WHERE tid=$id";
			$result3 = mysql_query($sql3);
			?>
			<ul>
				<?php
				while($arr3 = mysql_fetch_assoc($result3))
				{
					$result4 = mysql_query("SELECT id,name FROM user WHERE id=".$arr3['uid']);
					$arr4 = mysql_fetch_assoc($result4);
				?>
				<li>
					<img src="./images/15_avatar_small.jpg">
					<p class="user">楼主：<b><?php echo $arr4['name']?></b> &nbsp;&nbsp;<?php echo date('Y-m-d H:i:s',$arr3['addate'])?> </p>
					<div class="blank"></div>
					<div class="con"><?php echo $arr3['content']?></div>
				</li>
				<?php }?>
			</ul>
			<?php
			//如果用户存在，则显示回复框
			if(isset($_SESSION['username'])){
			?>
			<div class="replay">
				<form name="form1" method="post" action="reply_save.php">
				<table width="100%" border="0" align="center">
					<tr>
						<td><textarea name='content' style="width:100%;height:180px;"></textarea></td>
					</tr>
					<tr>
						<td>
							<button class="pn pnc"  type="submit"><strong>发表回复</strong></button>
							<input type="hidden" name="ac" value="<?php echo $_SESSION['rand_value']?>">
							<input type="hidden" name="tid" value="<?php echo $id?>">
						</td>
					</tr>
				</table>
				</form>
			</div>
			<?php }?>
		</div><!--//content-->
		<div class="blank"></div>
	</div><!--//主题内容-->
	<div class="blank10"></div>
</div><!--//左边栏-->
<!--右边栏-->
<div class="right">
	<img src="images/thread_post.png" onclick="javascript:location.href='send.php'" width="270">
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