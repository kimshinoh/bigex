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
			$sql_query="select * from customer  where DisplayName like '%".$name."%'";
            $data = mysqli_query($db,$sql_query);
            if(mysqli_num_rows($data)>0){
                while($r=mysqli_fetch_array($data)){
                    $id = $r['Id'];
                    echo '<tr class="tableProItem">';
                    echo '<td>'.$id.'</td>';
                    echo '<td>'.$r['DisplayName'].'</td>';
                    echo '<td>'.$r['Address'].'</td>';
                    echo '<td>'.$r['Phone'].'</td>';
                    echo '<td>'.$r['Email'].'</td>';
                    echo '<td>'.$r['MoreInfo'].'</td>';
                    echo '<td>'.$r['ContractDate'].'</td>';
                    echo '<td>'.$r['TypeCustomer'].'</td>';
                    echo "<td><a class='tool' href='/process/Customer/deleteCus.php?Id=$id'><i class='deleteItem far fa-trash-alt'></i></a><a class='tool' href='/formUpdateCus.php?Id=$id'><i class='fixItem fas fa-wrench'></i></a></td>";
                    echo '</tr>';
                }
            }
        }
    }
	?>