<?php
		$db=mysqli_connect('localhost','root','12345','quanlykho',3306);
		if(!$db)
		{
			echo "404";
		}
		else
		{
			$Id=$_POST['Id'];
			$DateInput=$_POST['DateInput'];
            $sql_query="Insert into input values('".$Id."','".$DateInput."')";
            mysqli_query($db,$sql_query);		
            header('location:../../inputNote.php');
		}
	?>