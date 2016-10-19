<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php
	require_once("./student.php");
	$id = $_GET['id'];
	$sql = "select * from student where id=$id";
	$result = mysql_query($sql);
	$rst = mysql_fetch_array($result);

	/*if(isset($_POST['ad']) && $_POST['ad']=="add"){

				$name = $_POST['name'];
				$sex = $_POST['sex'];
				$age = $_POST['age'];
				$edu = $_POST['edu'];
				$salary = $_POST['salary'];
				$bonus = $_POST['bonus'];
				$city = $_POST['city'];
			$sql = "update student set $name='name',$sex='sex',$age='age',$edu='edu',$salary='sarary',$bonus='bonus',$city='city'";

			if(mysql_query($sql)){
				echo "ok";
				echo "<script>location.href='table.php'</script>";
				
			}else{
				echo 'no';
			}


		}*/
	//echo $rst['id'];
	?>

	<form method="post" action="">
	 <input type="hidden" name="value" >
		<table width="400" height="200"  border="1" align="center" cellspacing="0" bordercolor="#dddddd">
			<tr>
				<td align="center">姓名</td>
				<td><input type="text" name="name" value="<?php echo $rst['name']?>"></td>
			</tr>
			<tr>
				<td align="center">性别</td>
				<td><input type="radio" name="sex" value=<?php echo $rst['sex'];?>>男
				<input type="radio" name="sex" value=<?php echo $rst['sex'];?> >女</td>
			</tr>
			<tr>
				<td align="center">年龄</td>
				<td><input type="text" name="age" value="<?php echo $rst['age']?>"></td>
			</tr>
			<tr>
				<td align="center">学历</td>
				<td>
					
					<select name="edu">
						<option value="初中" <?php if($rst['edu']=="初中"){ echo "selected";} ?>>初中</option>
						<option value="高中" <?php if($rst['edu']=="高中"){ echo "selected";} ?>>高中</option>
						<option value="大专" <?php if($rst['edu']=="大专"){ echo "selected";} ?>>大专</option>		
						<option value="大本" <?php if($rst['edu']=="大本"){ echo "selected";} ?>>大本</option>
						<option value="研究生" <?php if($rst['edu']=="研究生"){ echo "selected";} ?>>研究生</option>
					</select>
				</td>
			</tr>
			<tr>
				<td align="center">工资</td>
				<td><input type="text" name="salary" value="<?php echo $rst['salary']?>"></td>
			</tr>
			<tr>
				<td align="center">奖金</td>
				<td><input type="text" name="bonus" value="<?php echo $rst['bonus']?>"></td>
			</tr>
			<tr>
				<td align="center">籍贯</td>
				<td>
					<select name="city">
						<option value="河南" <?php if($city="河南"){echo "selected";} ?>>河南
						</option>
						<option value="北京" <?php if($city="北京"){echo "selected";} ?>>北京
						</option>
						<option value="河北" <?php if($city="河北"){echo "selected";} ?>>河北
						</option>
					</select>
				</td>
			</tr>
			<tr >
				<td align="left"><input type="submit" name="submit" value="提交">
				                 <input type="hidden" name="ad" value="add"></td>
			</tr>    
				
		</table>

	</form>
</body>
</html>
