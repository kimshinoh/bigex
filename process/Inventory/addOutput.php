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
            $sql_query="Insert into outputinfo values('".$Id."','".$IdObject."','".$IdCustomer."','".$IdOutput."','".$Count."','".$Stt."')";
			mysqli_query($db,$sql_query);	
			$get= "select total from inventoryGeneral where IdObject = '".$IdObject."'";
			$valu = mysqli_query($db, $get);
				if(mysqli_num_rows($valu)>0){
					while($row=mysqli_fetch_array($valu)){
						$Total = $row['total'];
					}
				}
			$TotalUpdate = $Total - $Count;
			$query = "update inventoryGeneral set total='".$TotalUpdate."' where IdObject = '".$IdObject."'";
			mysqli_query($db,$query);

            header('location:../../outputInven.php?IdNote='.$IdOutput);
		}
	?>