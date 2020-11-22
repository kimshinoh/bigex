<?php
		$db=mysqli_connect('localhost','root','12345','quanlykho',3306);
		if(!$db)
		{
			echo "404";
		}
		else
		{
			$Id=$_POST['Id'];
			$DateOutput=$_POST['DateOutput'];
            $sql_query="Insert into output values('".$Id."','".$DateOutput."')";
            mysqli_query($db,$sql_query);		
            header('location:../../outputNote.php');
		}
	?>