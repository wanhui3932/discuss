<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
		<?php 
		require_once("./student.php");
		//var_dump($sql);
			if(isset($_POST['ad']) && $_POST['ad']=="add"){

				$name = $_POST['name'];
				$sex = $_POST['sex'];
				$age = $_POST['age'];
				$edu = $_POST['edu'];
				$salary = $_POST['salary'];
				$bonus = $_POST['bonus'];
				$city = $_POST['city'];
			$sql = "INSERT INTO student VALUES(null,'$name','$sex',$age,'$edu',$salary,$bonus,'$city')";

			if(mysql_query($sql)){
				echo "ok";
				echo "<script>location.href='table.php'</script>";
				
			}else{
				echo 'no';
			}


		}
	?>

	<form method="post" action="">
		<table width="400" height="200"  border="1" align="center" cellspacing="0" bordercolor="#dddddd">
			<tr>
				<td align="center">姓名</td>
				<td><input type="text" name="name" ></td>
			</tr>
			<tr>
				<td align="center">性别</td>
				<td><input type="radio" name="sex" value="男">男
				<input type="radio" name="sex" value="女" >女</td>
			</tr>
			<tr>
				<td align="center">年龄</td>
				<td><input type="text" name="age" ></td>
			</tr>
			<tr>
				<td align="center">学历</td>
				<td>
					<select name="edu">
						<option value="初中">初中</option>
						<option value="高中">高中</option>
						<option value="大专">大专</option>		
						<option value="大本">大本</option>
						<option value="研究生">研究生</option>
					</select>
				</td>
			</tr>
			<tr>
				<td align="center">工资</td>
				<td><input type="text" name="salary" ></td>
			</tr>
			<tr>
				<td align="center">奖金</td>
				<td><input type="text" name="bonus" ></td>
			</tr>
			<tr>
				<td align="center">籍贯</td>
				<td>
					<select name="city">
						<option value="河南">河南
						</option>
						<option value="北京">北京
						</option>
						<option value="河北">河北
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