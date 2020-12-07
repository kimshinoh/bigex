<?php
    if(isset($_REQUEST['name'])){
		$db=mysqli_connect('localhost','root','12345','quanlykho',3306);
		if(!$db)
		{
			echo "404";
		}
		else
		{

			$name = $_REQUEST['name'];
			$sql_query="select * from suplier  where DisplayName = '".$name."'";
            $data = mysqli_query($db,$sql_query);
            if(mysqli_num_rows($data)>0){
                while($r=mysqli_fetch_array($data)){
                    $id = $r['Id'];
                    $selected = "select object.DisplayName from object inner join ob_su on object.Id = ob_su.IdObject where ob_su.IdSuplier ='".$id."'";
                    $val = mysqli_query($db, $selected);
                    echo '<tr class="tableProItem">';
                    echo '<td>'.$id.'</td>';
                    echo '<td>'.$r['DisplayName'].'</td>';
                    echo '<td>';
                    if(mysqli_num_rows($val)>0){
                        while($ro=mysqli_fetch_array($val)){
                            echo $ro['DisplayName'],'<br />';
                        }
                    }
                    echo '</td>';
                    echo '<td>'.$r['Address'].'</td>';
                    echo '<td>'.$r['Phone'].'</td>';
                    echo '<td>'.$r['Email'].'</td>';
                    echo '<td>'.$r['MoreInfo'].'</td>';
                    echo '<td>'.$r['ContractDate'].'</td>';
                    echo "<td><a class='tool' href='/process/Suplier/deleteSup.php?Id=$id'><i class='deleteItem far fa-trash-alt'></i></a><a class='tool' href='/formUpdateSup.php?Id=$id'><i class='fixItem fas fa-wrench'></i></a></td>";
                    echo '</tr>';
                }
            }
        }
    }
	?>