<?php

		$db=mysqli_connect('localhost','root','12345','quanlykho',3306);
		if(!$db)
		{
			echo "404";
		}
		else
		{

			$id=$_REQUEST['Id'];
			$IdNote = $_REQUEST['IdNote'];
			$sql_query="delete from inputinfo where Id='".$id."'";
            mysqli_query($db,$sql_query);		
            header('location:../../inputInven.php?IdNote='.$IdNote.'');
		}
	?>