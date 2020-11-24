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
			$sql_query="update suplier set DisplayName='".$Displayname."',Address='".$Address."',Phone='".$Phone."',Email='".$Email."',MoreInfo='".$MoreInfo."',ContractDate='".$ContractDate."'where Id='".$Id."'"; 	
			$i=0;
			$deleteOld = "Delete from ob_su where IdSuplier='".$Id."'";
			mysqli_query($db,$deleteOld);
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