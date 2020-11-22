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
			$IdInputInfo=$_POST['IdInputInfo'];			
			$IdCustomer=$_POST['IdCustomer'];
			$Count=$_POST['Count'];
            $Stt=$_POST['Stt'];
            $IdOutput=$_POST['IdOutput'];			
            $sql_query="Insert into outputinfo(Id,IdObject,IdInputInfo,IdCustomer,Count,Stt,IdOutput) values('".$Id."','".$IdObject."','".$IdInputInfo."','".$IdCustomer."','".$Count."','".$Stt."','".$IdOutput."')";
            echo $sql_query;
            // mysqli_query($db,$sql_query);		
            // header('location:../../outputNote.php');
		}
	?>