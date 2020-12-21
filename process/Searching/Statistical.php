<?php
    if(isset($_REQUEST['DateSearch'])){
		$db=mysqli_connect('localhost','root','12345','quanlykho',3306);
		if(!$db)
		{
			echo "404";
		}
		else
		{
            $Information = $_REQUEST['Information'];
            $DateSearch = $_REQUEST['DateSearch'];
            $DateAfter = $_REQUEST['DateAfter'];
            if($Information == "input")
            {
                $sql_queryInput="SELECT Id from input where DateInput between '$DateSearch 00:00:00' and '$DateAfter 23:59:59'";
                $data = mysqli_query($db,$sql_queryInput);
                if(mysqli_num_rows($data)>0){
                    while($r=mysqli_fetch_array($data)){
                        $IdInput = $r['Id'];
                        $sqlInput = "SELECT idobject, count, idSuplier,inputprice from inputinfo where IdInput = '$IdInput'";
                        $data1 = mysqli_query($db,$sqlInput);
                        if(mysqli_num_rows($data1)>0){
                            while($row=mysqli_fetch_array($data1)){
                                $idobject = $row['idobject'];
                                $idsuplier = $row['idSuplier'];
                                $sql1 = "SELECT displayname from object where Id = '$idobject'";
                                $data2 = mysqli_query($db,$sql1);
                                if(mysqli_num_rows($data2)>0){
                                    while($ro=mysqli_fetch_array($data2)){
                                        $ObjectName = $ro['displayname'];
                                    }
                                }
                                $sql2 = "SELECT displayname from suplier where Id = '$idsuplier'";
                                $data3 = mysqli_query($db,$sql2);
                                if(mysqli_num_rows($data3)>0){
                                    while($ro1=mysqli_fetch_array($data3)){
                                        $SuplierName = $ro1['displayname'];
                                    }
                                }
                                echo "<tr class='tableProItem'>";
                                echo "<td>".$ObjectName."</td>";
                                echo "<td class='count'>".$row['count']."</td>";
                                echo "<td>".$SuplierName."(NCC)</td>";
                                echo "<td class='price'>".$row['inputprice']."</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr style='height: 100px'><td colspan=3><span class='logForm_title'>Không có dữ liệu nào trùng với thông tin bạn nhập</span></td></tr>";
                        }
                    }
                } else {
                    echo "<tr style='height: 100px'><td colspan=3><span class='logForm_title'>Không có dữ liệu nào trùng với thông tin bạn nhập</span></td></tr>";
                }
            }
            else if($Information == "output")
            {
                $sql_queryOutput="SELECT * from output where DateOutput between '$DateSearch 00:00:00' and '$DateAfter 23:59:59'";
                $data = mysqli_query($db,$sql_queryOutput);
                if(mysqli_num_rows($data)>0){
                    while($r=mysqli_fetch_array($data)){
                        $IdOutput = $r['Id'];
                        $sqlOutput = "SELECT idobject, count, idcustomer, idobject from Outputinfo where IdOutput = '$IdOutput'";
                        $data1 = mysqli_query($db,$sqlOutput);
                        if(mysqli_num_rows($data1)>0){
                            while($row=mysqli_fetch_array($data1)){
                                $idobject = $row['idobject'];
                                $idCustomer = $row['idcustomer'];
                                $idobject = $row['idobject'];
                                $sql1 = "SELECT displayname from object where Id = '$idobject'";
                                $data2 = mysqli_query($db,$sql1);
                                if(mysqli_num_rows($data2)>0){
                                    while($ro=mysqli_fetch_array($data2)){
                                        $ObjectName = $ro['displayname'];
                                    }
                                }
                                $sql2 = "SELECT displayname from customer where Id = '$idCustomer'";
                                $data3 = mysqli_query($db,$sql2);
                                if(mysqli_num_rows($data3)>0){
                                    while($ro1=mysqli_fetch_array($data3)){
                                        $CustomerName = $ro1['displayname'];
                                    }
                                }
                                $sql3 = "SELECT outputprice from inputinfo where IdObject = '$idobject'";
                                $data4 = mysqli_query($db,$sql3);
                                if(mysqli_num_rows($data4)>0){
                                    while($ro1=mysqli_fetch_array($data4)){
                                        $outputprice = $ro1['outputprice'];
                                    }
                                }
                                echo "<tr class='tableProItem'>";
                                echo "<td>".$ObjectName."</td>";
                                echo "<td class='count'>".$row['count']."</td>";
                                echo "<td>".$CustomerName."(KH)</td>";
                                echo "<td class='price'>".$outputprice."</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr style='height: 100px'><td colspan=3><span class='logForm_title'>Không có dữ liệu nào trùng với thông tin bạn nhập</span></td></tr>";
                        }
                    }
                } else {
                    echo "<tr style='height: 100px'><td colspan=3><span class='logForm_title'>Không có dữ liệu nào trùng với thông tin bạn nhập</span></td></tr>";
                }
            }
        }
    }
	?>