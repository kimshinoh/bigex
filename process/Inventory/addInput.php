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
			$IdSuplier=$_POST['IdSuplier'];
			$Count=$_POST['Count'];			
			$InputPrice=$_POST['InputPrice'];
			$OutputPrice=$_POST['OutputPrice'];
            $Stt=$_POST['Stt'];
            $IdInput=$_POST['IdInput'];			
			$sql_query="Insert into inputinfo values('".$Id."','".$IdSuplier."','".$IdInput."',".$IdObject.",".$Count.",'".$InputPrice."','".$OutputPrice."','".$Stt."')";
			mysqli_query($db,$sql_query);
			$select_table = "select inventorygeneral.IdObject as IdFocus, inventorygeneral.Total from inventorygeneral inner join inputinfo on inventorygeneral.IdObject=inputinfo.IdObject where inputinfo.IdObject = '".$IdObject."'";
			$value = mysqli_query($db, $select_table);
			if(mysqli_num_rows($value)>0){
				while($r=mysqli_fetch_array($value)){
					$IdFocus = $r['IdFocus'];
					$Total = $r['Total'];
				}
			}
			if($IdFocus){
				$TotalUpdate = $Total + $Count;
				$query = "Update inventorygeneral set total='".$TotalUpdate."' where IdObject='".$IdFocus."'";
				mysqli_query($db,$query);
			} else {
				$query = "Insert into inventorygeneral(IdObject,Total) values ('".$IdObject."',".$Count.") ";
				mysqli_query($db,$query);
			}
			header('location:../../inputInven.php?IdNote='.$IdInput.'');
		}
	?>