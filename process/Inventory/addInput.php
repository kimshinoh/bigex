<?php
		$db=mysqli_connect('localhost','root','12345','quanlykho',3306);
		if(!$db)
		{
			echo "404";
		}
		else
		{
			$Id=$_POST['Id'];
			$IdObject=$_POST['IdObject'];
			$Count=$_POST['Count'];			
			$InputPrice=$_POST['InputPrice'];
			$OutputPrice=$_POST['OutputPrice'];
            $Stt=$_POST['Stt'];
            $IdInput=$_POST['IdInput'];			
            $sql_query="Insert into inputinfo values('".$Id."','".$IdObject."',".$IdInput.",".$Count.",".$InputPrice.",'".$OutputPrice."','".$Stt."')";
            mysqli_query($db,$sql_query);		
            header('location:../../inputInven.php');
		}
	?>