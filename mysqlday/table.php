<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>学员信息表</title>
</head>
<body>
	<?php
	require_once("./student.php");
	?>
	<h2 align="center">学生信息表</h2>
	<p align="center"><a href="from.php">添加信息</a></p>
	<p align="center">还有<?php echo mysql_num_rows($result); ?>条数据</p>
	<table width="800" border="1" bordercolor="red" align="center" cellspacing="0">
		<tr>
			<th>编号</th>
			<th>姓名</th>
			<th>性别</th>
			<th>年龄</th>
			<th>学历</th>
			<th>工资</th>
			<th>奖金</th>
			<th>籍贯</th>
			<th>操作</th>
		</tr>
		<?php 
			while($sql =mysql_fetch_array($result)){
		?>
			<tr align="center">
				<td><?php echo $sql['id'] ?></td>
				<td><?php echo $sql['name'] ?></td>
				<td><?php echo $sql['sex'] ?></td>
				<td><?php echo $sql['age'] ?></td>
				<td><?php echo $sql['edu'] ?></td>
				<td><?php echo $sql['salary'] ?></td>
				<td><?php echo $sql['bonus'] ?></td>
				<td><?php echo $sql['city'] ?></td>
				<td>
					<a href="edit.php?id=<?php echo $sql['id'];?>">修改</a>|
					<a href="javascript:void(0)" onclick="jum(<?php echo $sql['id'] ?>)">删除</a>
				</td>
			</tr>
		<?php } ?>
	</table>
		
</body>
</html>
<script type="text/javascript">
	
	function jum(id){
		if(window.confirm("你确定？")){
			location.href="del.php?id="+id;
		}
	}

</script>