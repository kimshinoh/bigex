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
            $TypeCustomer= $_POST['TypeCustomer'];			
			$sql_query="Insert into customer values('".$Id."','".$Displayname."','".$Address."','".$Phone."','".$Email."','".$MoreInfo."','".$ContractDate."','".$TypeCustomer."')";
			mysqli_query($db,$sql_query);		
            header('location:../../genCus.php');
		}
	?>