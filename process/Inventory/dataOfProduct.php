<?php
    if(isset($_POST['IdSuplier'])){
		$db=mysqli_connect('localhost','root','12345','quanlykho',3306);
		if(!$db)
		{
			echo "404";
		}
		else
		{

			$IdSuplier = $_POST['IdSuplier'];
			$sql_query="select object.DisplayName,object.Id from object inner join ob_su on object.id = ob_su.IdObject where ob_su.IdSuplier = '".$IdSuplier."'";
            $data = mysqli_query($db,$sql_query);
            if(mysqli_num_rows($data)>0){
                while($row=mysqli_fetch_array($data)){
                    $name = $row['DisplayName'];
                    $id = $row['Id'];
                    echo "<option value='".$id."'>".$name."</option>";
                }
            }
        }
    }
	?>