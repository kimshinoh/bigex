<?php
    if(isset($_POST['IdObject'])){
		$db=mysqli_connect('localhost','root','12345','quanlykho',3306);
		if(!$db)
		{
			echo "404";
		}
		else
		{
			$IdObject = $_POST['IdObject'];
            $query3 = "select total from inventoryGeneral where IdObject = '".$IdObject."' ";
            $valu = mysqli_query($db, $query3);
            if(mysqli_num_rows($valu)>0){
                while($row=mysqli_fetch_array($valu)){
                     echo $row['total'];
                }
            }
        }
    }
	?>