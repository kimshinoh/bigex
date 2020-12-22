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
    <title>Nhập kho</title>
</head>

<body>
    <div class="app">
    <?php include './interface/partials/header.php'; ?>
        <div class="container">
            <div class="optionBar">
                <div class="grid">
                    <ul class="optionBar-list">
                        <li class="optionBar-item ">
                            <a class="optionBar-item-link" href="/general.php">Tổng Quan</a>
                        </li>
                        <li class="optionBar-item optionBar-item-active">
                            <a class="optionBar-item-link " href="#">Nhập xuất</a>
                        </li>
                        <li class="optionBar-item">
                            <a class="optionBar-item-link" href="/genSup.php">Hàng Hóa</a>
                        </li>
                        <li class="optionBar-item">
                            <a class="optionBar-item-link" href="/genCus.php">Khách Hàng</a>
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
                                            <i class="fas fa-plus"></i>  Nhập Vào Phiếu
                                        </li>
                                        <li class="category-item">
                                            <a class="category-item" href="/inputNote.php">
                                                <i class="fas fa-undo-alt"></i> Quay Lại DS Phiếu
                                            </a>
                                        </li>
                                    </ul>
                            </nav>
                        </div>
                        <div class="grid_column-10">
                            <div class="home__filter">
                                <span class="home__filter-item"></span>
                                <a href="#" class="btn btn-home btn-main">Nhập Kho</a>
                                <a href="/outputNote.php" class="btn btn-home ">Xuất Kho</a>
                            </div>
                            <div class="home__content">
                                <div class="content-layer">
                                    <table  class="content">
                                        <tr class="tablePro">
                                            <th style="width: 3%;">ID</th>
                                            <th style="width: 20%;">Sản Phẩm</th>
                                            <th style="width: 10%;">Số lượng</th>
                                            <th style="width: 20%;">NCC</th>
                                            <th style="width: 15%;">Giá Nhập</th>
                                            <th style="width: 15%;">Giá Bán</th>
                                            <th style="width: 10%;">Trạng Thái</th>
                                            <th style="width: 7%;">#</th>
                                        </tr>
                                        <?php
                                            $IdNote = $_REQUEST['IdNote'];
                                            $db = mysqli_connect('localhost','root','12345','quanlykho',3306);
                                            if(!$db){
                                                echo 'Lỗi';

                                            } else {
                                                if (isset($_GET['pageno'])) {
                                                    $pageno = $_GET['pageno'];
                                                } else {
                                                    $pageno = 1;
                                                }
                                                $numPage = 6;
                                                $offset = ($pageno - 1) * $numPage;
                                                $total_pages_sql = "SELECT COUNT(*) FROM inputinfo where IdInput='".$IdNote."'";
                                                $result = mysqli_query($db,$total_pages_sql);
                                                $total_rows = mysqli_fetch_array($result)[0];
                                                $total_pages = ceil($total_rows / $numPage);
                                                $select_table = "SELECT * from inputinfo where IdInput='".$IdNote."' limit $offset, $numPage";

                                                $value = mysqli_query($db, $select_table);
                                                if(mysqli_num_rows($value)>0){
                                                    
                                                    $i=0;
                                                    while($r=mysqli_fetch_array($value)){
                                                        $IdObject = $r['IdObject'];
                                                        $IdSuplier = $r['IdSuplier'];
                                                        $query1 = "select object.DisplayName as Name from object Where object.Id = '".$IdObject."'";
                                                        $va = mysqli_query($db, $query1);
                                                        if(mysqli_num_rows($va)>0){
                                                            while($row=mysqli_fetch_array($va)){
                                                                $Product = $row['Name'];
                                                            }
                                                        }
                                                        $query2 = "select suplier.DisplayName as Name from suplier Where suplier.Id = '".$IdSuplier."'";
                                                        $val = mysqli_query($db, $query2);
                                                        if(mysqli_num_rows($val)>0){
                                                            while($row1=mysqli_fetch_array($val)){
                                                                $Suplier = $row1['Name'];
                                                            }
                                                        }
                                                        $i++;
                                                        $id = $r['Id'];
                                                        echo '<tr class="tableProItem">';
                                                        echo '<td>'.$id.'</td>';
                                                        echo '<td>'.$Product.'</td>';
                                                        echo '<td>'.$r['Count'].'</td>';
                                                        echo '<td>'.$Suplier.'</td>';
                                                        echo '<td>'.$r['InputPrice'].'</td>';
                                                        echo '<td>'.$r['OutputPrice'].'</td>';
                                                        echo '<td>'.$r['Stt'].'</td>';
                                                        echo "<td><a class='tool' href='/process/Inventory/deleteInput.php?Id=$id&IdNote=$IdNote'><i class='deleteItem far fa-trash-alt'></i></a>";
                                                        echo '</tr>';
                                                        
                                                    }
                                            }
                                        
                                            }
                                                
                                        ?>
                                    </table>
                                    <ul class="pagination">
                                        <li><a href="?pageno=1">Trang đầu</a></li>
                                        <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
                                            <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>"><?php echo $pageno - 1; ?></a>
                                        </li>
                                        <li class="page-current">
                                            <?php echo $pageno; ?>
                                        </li>
                                        <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
                                            <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>"><?php echo $pageno + 1; ?></a>
                                        </li>
                                        <li><a href="?pageno=<?php echo $total_pages; ?>">Trang cuối</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer">
        <div class="grid">
            <div class="grid_row">
                <div class="grid_column-2-4">
                    <h3 class="footer__heading">
                        Chăm sóc khách hàng
                        <ul class="footer--list">
                            <li class="footer--item">
                                <a href="#" class="footer--item-link">Hướng dẫn sử dụng</a>
                            </li>
                            <li class="footer--item">
                                <a href="#" class="footer--item-link">Tạo mới giao dịch</a>
                            </li>
                            <li class="footer--item">
                                <a href="#" class="footer--item-link">Tạo mới đối tác</a>
                            </li>
                        </ul>
                    </h3>
                </div>
                <div class="grid_column-2-4">
                    <h3 class="footer__heading">
                        Theo dõi chúng tôi
                        <ul class="footer--list">
                            <li class="footer--item">
                                <a href="#" class="footer--item-link">Facebook</a>
                            </li>
                            <li class="footer--item">
                                <a href="#" class="footer--item-link">Instagram</a>
                            </li>
                            <li class="footer--item">
                                <a href="#" class="footer--item-link">Github</a>
                            </li>
                        </ul>
                    </h3>
                </div>
                <div class="grid_column-2-4">
                    <h3 class="footer__heading">
                        Giới thiệu
                        <ul class="footer--list">
                            <li class="footer--item">
                                <a href="#" class="footer--item-link">Hàng hóa</a>
                            </li>
                        </ul>
                    </h3>
                </div>
                <div class="grid_column-2-4">
                    <h3 class="footer__heading">
                        Danh mục
                        <ul class="footer--list">
                            <li class="footer--item">
                                <a href="#" class="footer--item-link">Tổng thể</a>
                            </li>
                            <li class="footer--item">
                                <a href="#" class="footer--item-link">Cơ sở dữ liệu</a>
                            </li>
                            <li class="footer--item">
                    </h3>
                </div>
                <div class="grid_column-2-4">
                    <h3 class="footer__heading">
                        Thành Viên
                    </h3>
                    <ul class="footer_member">
                        <li class="member_item">
                            <span class="member-name">Nguyễn Mạnh Trường</span>
                        </li>
                        <li class="member_item">
                            <span class="member-name">Trần Ngọc Huy</span>
                        </li>
                        <li class="member_item">
                            <span class="member-name">Vi Trung Hiếu</span>
                        </li>
                        <li class="member_item">
                            <span class="member-name">Nguyễn Huy Tuấn</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer__bottom">
            <div class="grid">
                <p class="footer__text">Bài Tập Lớn Nhóm 5</p>
            </div>

        </div>
    </footer>
    <div id="1" class="modal">
        <div  class="modal_overlay" onclick="returnMain()">
    
        </div>
        <div class="modal_body">
            <div id="add" class="modal_innerAdd">
                <div class="logForm_container">
                    <form id="form1" action="./process/Inventory/addInput.php" method=POST>
                        <div class="logForm" >
                            <div class="logForm_Header">
                                <h3 class="logForm_Heading">Nhập vào kho &#40; Phiếu số <?php echo $IdNote; ?>	&#41;</h3>
                            </div>
                            <div class="logForm_main">
                                <div class="form-group">
                                    <span class="logForm_title">Id :</span>
                                    <input id="Id" name="Id" type="text" class="logForm_input" placeholder="VD: 12" required>
                                        <span class="formMessage"></span>
                                </div>
                                <div class="form-group">
                                    <span class="logForm_title">Chọn Nhà Cung cấp</span>
                                    <select name="IdSuplier" id="IdSuplier" class="logForm_input" required>
                                        <option value="">-----Chọn nhà cung cấp----</option>
                                        <?php 
                                        $query2 = "select suplier.DisplayName as Name,suplier.Id as Id from suplier";
                                        $value1 = mysqli_query($db, $query2);
                                        if(mysqli_num_rows($value1)>0){
                                            while($row=mysqli_fetch_array($value1)){
                                                $name = $row['Name'];
                                                $id = $row['Id'];
                                                echo "<option value='".$id."'>".$name."</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                <span class="logForm_title">Chọn sản phẩm</span>
                                    <select name="IdObject" id="IdObject" class="logForm_input" required>
                                        
                                        ?> 
                                    </Select>
                                    <span class="formMessage"></span>
                                </div>
                                <div class="form-group">
                                <span class="logForm_title">Số lượng :</span>
                                    <input id="Count" name="Count" type="number" class="logForm_input" required>
                                    <span class="formMessage"></span>
                                </div>
                                <div class="form-group">
                                <span class="logForm_title">Giá nhập (VND) :</span>
                                    <input id="InputPrice" name="InputPrice" oninput="this.value=numberWithCommas(this.value)" type="text" class="logForm_input" placeholder="5" required>
                                    <span class="formMessage"></span>
                                </div>
                                <div class="form-group">
                                <span class="logForm_title">Giá xuất (VND) :</span>
                                    <input id="OutputPrice" name="OutputPrice" oninput="this.value=numberWithCommas(this.value)" type="text" class="logForm_input" placeholder="10" required>
                                    <span class="formMessage"></span>
                                </div>
                                <div class="form-group">
                                <span class="logForm_title">Trạng thái :</span>
                                    <input id="Stt" name="Stt" type="text" class="logForm_input" placeholder="Thêm hàng/ Hàng mới ?" required>
                                    <span class="formMessage"></span>
                                </div>
                                
                                <div class="form-group">
                                    <input id="IdInput" name="IdInput" type="hidden" value="<?php echo $IdNote; ?> " class="logForm_input" placeholder="Số lượng">
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
    <script src="./interface/js/jquery.js"></script> 
    <script type="text/javascript">
    $(document).ready(function(){ 
        $("#IdSuplier").change(function(){ 
        var IdSuplier = $(this).val(); 
        var dataString = "IdSuplier="+IdSuplier; 

        $.ajax({ 
            type: "POST", 
            url: "/process/Inventory/dataOfProduct.php", 
            data: dataString, 
            success: function(result){ 
               document.getElementById('IdObject').innerHTML = result; 
            }
        });

        });
    });
    </script>
</body>

</html>