<?php
		$db=mysqli_connect('localhost','root','12345','quanlykho',3306);
		if(!$db)
		{
			echo "404";
		}
		else
		{
			$id=$_REQUEST['Id'];		
			$sql_query="delete from object where Id='".$id."'";
			mysqli_query($db,$sql_query);		
			header('location:../../genPro.php');
		}
	?>