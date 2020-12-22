<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./interface/css/bass.css">
    <link rel="stylesheet" href="./interface/css/index.css">
    <link rel="stylesheet" href="./interface/css/normalize.css">
    <link rel="shortcut icon" type="image/x-icon" href="./interface/img/mainico.ico"/>
    <link rel="stylesheet" href="./interface/fonts/fontawesome-free-5.14.0-web/css/all.css">
    <title>Khách hàng</title>
</head>

<body>
    <div class="app">
    <?php include './interface/partials/header.php'; ?>
        <div class="container">
            <div class="optionBar">
                <div class="grid">
                    <ul class="optionBar-list">
                        <li class="optionBar-item">
                            <a class="optionBar-item-link " href="#">Tổng Quan</a>
                        </li>
                        <li class="optionBar-item">
                            <a class="optionBar-item-link " href="/inputNote.php">Nhập xuất</a>
                        </li>
                        <li class="optionBar-item ">
                            <a class="optionBar-item-link" href="/genPro.php">Hàng Hóa</a>
                        </li>
                        <li class="optionBar-item optionBar-item-active">
                            <a class="optionBar-item-link" href="#">Khách Hàng</a>
                        </li>
                        <li class="optionBar-item">
                            <a class="optionBar-item-link" href="/statistical.php">Thống kê</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="contentForm">
                <div class="grid">
                    <div class="grid_row">
                        <div class="grid_column-2">
                            <nav class="category">
                                <h3 class="category_heading">
                                    <i class="category_heading-icon fas fa-list"></i>
                                    Chức Năng
                                </h3>
                                    <ul class="catogory-list">
                                        <li class="category-item" onclick="showFormAdd()">
                                        <i class="fas fa-plus"></i>  Thêm khách hàng
                                        </li>
                                    </ul>
                            </nav>
                        </div>
                        <div class="grid_column-10">
                            <div  class="home__filter">
                                <span class="home__filter-item"></span>
                                <a href="#" style="position: relative; left: -22%;" class="btn btn-home btn-main">Danh sách</a>
                            </div>
                            <div class="home__content">
                                <div class="content-layer">
                                <div id="table-wrapper">
                                <div id="table-scroll">
                                    <table  class="content">
                                        
                                        <tr class="tablePro">
                                            <th style="width: 3%;">ID</th>
                                            <th style="width: 12,85%;">Tên Khách Hàng</th>
                                            <th style="width: 12,85%;">Địa chỉ</th>
                                            <th style="width: 12,85%;">SĐT</th>
                                            <th style="width: 12,85%;">Email</th>
                                            <th style="width: 12,85%;">Thêm TT</th>
                                            <th style="width: 12,85%;">Ngày mua</th>
                                            <th style="width: 12,85%;">Loại KH</th>
                                            <th style="width: 7%;">#</th>
                                        </tr>
                                        <?php
                                            $db = mysqli_connect('localhost','root','12345','quanlykho',3306);
                                            if(!$db){
                                                echo 'Lỗi';

                                            } else {
                                                $select_table = 'select * from customer order by Id+0 asc';

                                                $value = mysqli_query($db, $select_table);
                                                if(mysqli_num_rows($value)>0){
                                                    
                                                    $i=0;
                                                    while($r=mysqli_fetch_array($value)){
                                                    $i++;
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
                                                
                                        ?>
                                    </table>
                                </div>
                                        </div>
                                        </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include './interface/partials/footer.php'; ?>
    <?php
		$Id=$_REQUEST['Id'];
		
			$sql_read="select * from customer where Id='".$Id."'";
			$kq=mysqli_query($db,$sql_read);
			if(mysqli_num_rows($kq)>0)
			{
				while($r=mysqli_fetch_array($kq))
				{
					$DisplayName=$r['DisplayName'];
                    $Address=$r['Address'];	
                    $Phone=$r['Phone'];	
                    $Email=$r['Email'];	
                    $MoreInfo=$r['MoreInfo'];	
                    $ContractDate=$r['ContractDate'];	
                    $TypeCustomer=$r['TypeCustomer'];			
				}
			}
	?>
    <div id="1" class="modal2">
        <div  class="modal_overlay" onclick="returnMain()">
    
        </div>
        <div class="modal_body2">
            <div id="add1" class="modal_innerAdd2">
                <div class="logForm_container">
                    <form id="form1" action="./process/Customer/updateCus.php" method=POST>
                        <div class="logForm" >
                            <div class="logForm_Header">
                                <h3 class="logForm_Heading">Sửa khách hàng</h3>
                                <a href="/genCus.php" class="btn btn-home">Quay Lại</a>
                            </div>
                            <div class="logForm_main">
                                <div class="form-group">
                                    <input readonly='readonly' value='<?php echo $Id; ?>' id="Id" name="Id" type="text" class="logForm_input" placeholder="Id">
                                    <span class="formMessage"></span>
                                </div>
                                <div class="form-group">
                                    <input id="DisplayName" name="DisplayName" value='<?php echo $DisplayName; ?>' type="text" class="logForm_input" placeholder="Tên khách hàng">
                                    <span class="formMessage"></span>
                                </div>
                                <div class="form-group">
                                    <select name="TypeCustomer" id="TypeCustomer" class="logForm_input">
                                        <option  value="">-------Loại khách hàng-------</option>
                                        <option <?php if($TypeCustomer == 'Khách lẻ') echo 'selected'; ?> value="Khách lẻ">Khách lẻ</option>
                                        <option <?php if($TypeCustomer == 'Khách buôn') echo 'selected'; ?> value="Khách buôn">Khách buôn</option>
                                        <option <?php if($TypeCustomer == 'Cửa hàng') echo 'selected'; ?> value="Cửa hàng">Cửa hàng</option>

                                    </select>
                                    <span class="formMessage"></span>
                                </div>
                                <div class="form-group">
                                    <input id="Address" name="Address" type="text" value='<?php echo $Address; ?>' class="logForm_input" placeholder="Địa chỉ">
                                    <span class="formMessage"></span>
                                </div>
                                <div class="form-group">
                                    <input id="Phone" name="Phone" type="text" value='<?php echo $Phone; ?>' class="logForm_input" placeholder="Số điện thoại">
                                    <span class="formMessage"></span>
                                </div>
                                <div class="form-group">
                                    <input id="Email" name="Email" type="text" value='<?php echo $Email; ?>' class="logForm_input" placeholder="Email">
                                    <span class="formMessage"></span>
                                </div>
                                <div class="form-group">
                                    <input id="MoreInfo" name="MoreInfo" value='<?php echo $MoreInfo; ?>' type="text" class="logForm_input" placeholder="Thông tin thêm">
                                    <span class="formMessage"></span>
                                </div>
                                <div class="form-group">
                                    <span class="logForm_title">Ngày mua</span>
                                    <input id="ContractDate" value='<?php echo $ContractDate; ?>' name="ContractDate" type="datetime-local" class="logForm_input">
                                    <span class="formMessage"></span>
                                </div>
                                
                            </div>
                        </div>
                        <div class="logForm_control">
                            <input type="submit" value="Thêm" class="btn btn-main"></input>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="./interface/js/index.js"></script>
</body>

</html>