<?php 

		require_once("./student.php");
		$id = $_GET['id'];
		$sql="select id from student where id=$id";
		if(mysql_query($sql)){
			echo "<script>window.alert('id={$id}已被删除');location.href='table.php'</script>";
		}else{
			echo "<script>window.alert('id={$id}删除失败');location.href='table.php'</script>";
		}

?>