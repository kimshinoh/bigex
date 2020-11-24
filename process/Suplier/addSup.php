<?php
		$db=mysqli_connect('localhost','root','12345','quanlykho',3306);
		if(!$db)
		{
			echo "404";
		}
		else
		{
			$Id=$_POST['Id'];
			$Displayname=$_POST['DisplayName'];
			$Address=$_POST['Address'];			
			$Phone=$_POST['Phone'];
			$Email=$_POST['Email'];
            $MoreInfo=$_POST['MoreInfo'];
            $ContractDate=$_POST['ContractDate'];			
			$sql_query="Insert into suplier values('".$Id."','".$Displayname."','".$Address."','".$Phone."','".$Email."','".$MoreInfo."','".$ContractDate."')";
			$i=0;
			mysqli_query($db,$sql_query);		
			while($_POST['IdObject'][$i]){
				$IdObject = $_POST['IdObject'][$i];
				$query = "Insert into ob_su(IdSuplier,IdObject) values('".$Id."','".$IdObject."')";
				mysqli_query($db,$query);
				$i++;
			}
            header('location:../../genSup.php');
		}
	?>