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
    <title>Sản Phẩm</title>
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
                        <li class="optionBar-item optionBar-item-active">
                            <a class="optionBar-item-link" href="/genPro.php">Hàng Hóa</a>
                        </li>
                        <li class="optionBar-item">
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
                                        <i class="fas fa-plus"></i>  Thêm nhà cung cấp
                                        </li>
                                    </ul>
                            </nav>
                        </div>
                        <div class="grid_column-10">
                        <div class="home__filter">
                                <span class="home__filter-item"></span>
                                <a href="/genPro.php" class="btn btn-home">Sản Phẩm</a>
                                <a href="#" class="btn btn-home btn-main">Nhà Cung Cấp</a>
                            </div>
                            <div class="home__content">
                                <div class="content-layer">
                                <div id="table-wrapper">
                                <div id="table-scroll">
                                    <table  class="content">
                                    <tr class="tablePro">
                                            <th style="width: 3%;">ID</th>
                                            <th style="width: 12.84%;">Tên Nhà Cung Cấp</th>
                                            <th style="width: 12.84%;">Cung Cấp</th>
                                            <th style="width: 12.84%;">Địa Chỉ</th>
                                            <th style="width: 12.84%;">Số điện thoại</th>
                                            <th style="width: 12.84%;">Email</th>
                                            <th style="width: 12.84%;">Note</th>
                                            <th style="width: 12.84%;">Ngày Hợp Đồng</th>
                                            <th style="width: 7%;">#</th>
                                        </tr>
                                        <?php
                                            $db = mysqli_connect('localhost','root','12345','quanlykho',3306);
                                            if(!$db){
                                                echo 'Lỗi';

                                            } else {
                                                $select_table = 'select * from suplier';

                                                $value = mysqli_query($db, $select_table);
                                                if(mysqli_num_rows($value)>0){
                                                    
                                                    $i=0;
                                                    
                                                    while($r=mysqli_fetch_array($value)){
                                                        $id = $r['Id'];
                                                        $selected = "select object.DisplayName from object inner join ob_su on object.Id = ob_su.IdObject where ob_su.IdSuplier ='".$id."'";
                                                        $val = mysqli_query($db, $selected);
                                                        
                                                    $i++;
                                                    echo '<tr class="tableProItem">';
                                                    echo '<td>'.$id.'</td>';
                                                    echo '<td>'.$r['DisplayName'].'</td>';
                                                    echo '<td>';
                                                    if(mysqli_num_rows($val)>0){
                                                        while($ro=mysqli_fetch_array($val)){
                                                            echo $ro['DisplayName'],',';
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
			$sql_read="select * from suplier where Id='".$Id."'";
			$kq=mysqli_query($db,$sql_read);
			if(mysqli_num_rows($kq)>0)
			{
				while($row=mysqli_fetch_array($kq))
				{
                    $Displayname=$row['DisplayName'];
                    $Address=$row['Address'];			
                    $Phone=$row['Phone'];
                    $Email=$row['Email'];
                    $MoreInfo=$row['MoreInfo'];
                    $ContractDate=$row['ContractDate'];
				}
            }
	?>
    <div id="1" class="modal2">
        <div  class="modal_overlay">
    
        </div>
        <div class="modal_body2">
            <div id="add" class="modal_innerAdd2">
                <div class="logForm_container">
                    <form id="form1" action="./process/Suplier/updateSup.php" method=POST>
                        <div class="logForm" >
                            <div class="logForm_Header">
                                <h3 class="logForm_Heading">Sửa nhà cung cấp</h3>
                                <a href="/genSup.php" class="btn btn-home">Quay Lại</a>
                            </div>
                            <div class="logForm_main">
                            <div class="form-group">
                                    <input readonly="readonly" id="Id" name="Id" value="<?php echo $Id; ?>" type="text" class="logForm_input" placeholder="Id VD: 12">
                                    <span class="formMessage"></span>
                                </div>
                                <div class="form-group">
                                    <input id="DisplayName" name="DisplayName" value="<?php echo $Displayname; ?>" type="text" class="logForm_input" placeholder="Tên">
                                    <span class="formMessage"></span>
                                </div>
                                <div id="list1" class="dropdown-check-list" tabindex="100">
                                    <span id="anchor" class="anchor">Chọn sản phẩm</span>
                                    <ul class="items">
                                        <?php 
                                        $query = "select DisplayName,Id from object";
                                        $va = mysqli_query($db, $query);
                                        if(mysqli_num_rows($va)>0){
                                            while($row=mysqli_fetch_array($va)){
                                                $name = $row['DisplayName'];
                                                $id = $row['Id'];
                                        
                                                echo "<li><input type='checkbox'";
                                                $query1 = "select ob_su.IdObject from ob_su inner join suplier on suplier.Id = ob_su.IdSuplier where suplier.Id ='".$Id."'";
                                                $val = mysqli_query($db, $query1);
                                                if(mysqli_num_rows($val)>0){
                                                    while($ro=mysqli_fetch_array($val)){
                                                        $IdObject = $ro['IdObject'];
                                                      
                                                        if($IdObject == $id) echo 'checked';
                                                    }
                                                }
                                               
                                                echo " name='IdObject[]' value='".$id."'>".$name."</li>";
                                            }
                                        }
                                        
                                        ?> 
                                    </ul>
                                    <span class="formMessage"></span>
                                </div>
                                <div class="form-group">
                                    <input id="Address" name="Address" type="text" value="<?php echo $Address; ?>" class="logForm_input" placeholder="Địa chỉ">
                                    <span class="formMessage"></span>
                                </div>
                                <div class="form-group">
                                    <input id="Phone" name="Phone" type="text" class="logForm_input" value="<?php echo $Phone; ?>" placeholder="Số điện thoại">
                                    <span class="formMessage"></span>
                                </div>
                                <div class="form-group">
                                    <input id="Email" name="Email" type="text" class="logForm_input" value="<?php echo $Email; ?>" placeholder="Email">
                                    <span class="formMessage"></span>
                                </div>
                                <div class="form-group">
                                    <input id="MoreInfo" name="MoreInfo" type="text" class="logForm_input" value="<?php echo $MoreInfo; ?>" placeholder="Thông tin thêm">
                                    <span class="formMessage"></span>
                                </div>
                                <div class="form-group">
                                <span class="logForm_title">Ngày GHHD</span>
                                    <input id="ContractDate" name="ContractDate" type="datetime-local" value="<?php echo date('Y-m-d\TH:i', strtotime($ContractDate)); ?>" class="logForm_input">
                                    <span class="formMessage"></span>
                                </div>
                                
                            </div>
                        </div>
                        <div class="logForm_control">
                            <input type="submit" value="Hoàn Tất" class="btn btn-main"></input>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="./interface/js/index.js"></script>
    
</body>

</html>
