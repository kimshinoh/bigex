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
    <title>Xuất Kho</title>
</head>

<body>
    <div class="app">
    <?php include './interface/partials/header.php'; ?>
        <div class="container">
            <div class="optionBar">
                <div class="grid">
                    <ul class="optionBar-list">
                        <li class="optionBar-item">
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
                                            <i class="fas fa-minus"></i>  Xuất Kho
                                        </li>
                                        <li class="category-item">
                                            <a class="category-item" href="/outputNote.php">
                                                <i class="fas fa-undo-alt"></i> Quay Lại DS Phiếu
                                            </a>
                                        </li>
                                    </ul>
                            </nav>
                        </div>
                        <div class="grid_column-10">
                            <div class="home__filter">
                                <span class="home__filter-item"></span>
                                <a href="/inputNote.php" class="btn btn-home">Nhập Kho</a>
                                <a href="#" class="btn btn-home  btn-main ">Xuất Kho</a>
                            </div>
                            <div class="home__content">
                                <div class="content-layer">
                                    <table  class="content">
                                        <tr class="tablePro">
                                            <th style="width: 3%;">ID</th>
                                            <th style="width: 20%;">Sản Phẩm</th>
                                            <th style="width: 15%;">Mã Khách Hàng</th>
                                            <th style="width: 15%;">Số Lượng</th>
                                            <th style="width: 20%;">Trạng Thái</th>
                                            <th style="width: 10%;">Mã Xuất</th>
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
                                                $total_pages_sql = "SELECT COUNT(*) FROM outputinfo where IdOutput='".$IdNote."'";
                                                $result = mysqli_query($db,$total_pages_sql);
                                                $total_rows = mysqli_fetch_array($result)[0];
                                                $total_pages = ceil($total_rows / $numPage);
                                                $select_table = "SELECT * from outputinfo where IdOutput='".$IdNote."' limit $offset, $numPage";

                                                $value = mysqli_query($db, $select_table);
                                                if(mysqli_num_rows($value)>0){
                                                    
                                                    $i=0;
                                                    while($r=mysqli_fetch_array($value)){
                                                        $IdObject = $r['IdObject'];
                                                        $query = "select object.DisplayName as Name from object Where object.Id = '".$IdObject."'";
                                                        $va = mysqli_query($db, $query);
                                                        if(mysqli_num_rows($va)>0){
                                                            while($row=mysqli_fetch_array($va)){
                                                                $Product = $row['Name'];
                                                            }
                                                        }
                                                        $i++;
                                                        $id = $r['Id'];
                                                        echo '<tr class="tableProItem">';
                                                        echo '<td>'.$id.'</td>';
                                                        echo '<td>'.$Product.'</td>';
                                                        echo '<td>'.$r['IdCustomer'].'</td>';
                                                        echo '<td>'.$r['Count'].'</td>';
                                                        echo '<td>'.$r['Stt'].'</td>';
                                                        echo '<td>'.$r['IdOutput'].'</td>';
                                                        echo "<td><a class='tool' href='/process/Inventory/deleteOutput.php?Id=$id'><i class='deleteItem far fa-trash-alt'></i></a>";
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
    <?php include './interface/partials/footer.php'; ?>
    <div id="1" class="modal">
        <div  class="modal_overlay" onclick="returnMain()">
    
        </div>
        <div class="modal_body">
            <div id="add" class="modal_innerAdd">
                <div class="logForm_container">
                    <form id="form1" action="./process/Inventory/addOutput.php" method=POST>
                        <div class="logForm" >
                            <div class="logForm_Header">
                                <h3 class="logForm_Heading">Xuất kho &#40; Phiếu số <?php echo $IdNote; ?>	&#41;</h3>
                            </div>
                            <div class="logForm_main">
                                <div class="form-group">
                                    <span class="logForm_title">Mã xuất :</span>
                                        <input id="Id" name="Id" type="text" class="logForm_input" placeholder="VD: 12" required>
                                        <span class="formMessage"></span>
                                </div>
                                <div class="form-group">
                                    <span class="logForm_title">Sản phẩm xuất :</span>
                                    <select name="IdObject" id="IdObject" class="logForm_input" required>
                                    <option value="">-----Chọn sản phẩm----</option>
                                        <?php
                                        $query1 = "select IdObject from inventoryGeneral";
    
                                        $val = mysqli_query($db, $query1);
                                        if(mysqli_num_rows($val)>0){
                                            while($row=mysqli_fetch_array($val)){
                                                $IdObjectGeneral = $row['IdObject'];
                                                $query2 = "select object.DisplayName as Name,object.Id as Id from object where Id='".$IdObjectGeneral."'";
                                                $va = mysqli_query($db, $query2);
                                                if(mysqli_num_rows($va)>0){
                                                    while($row=mysqli_fetch_array($va)){
                                                        $name = $row['Name'];
                                                        $id = $row['Id'];
                                                        echo "<option value='".$id."'>".$name."</option>";
                                                    }
                                                }
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                <span class="logForm_title">Khách hàng :</span>
                                    <select name="IdCustomer" id="IdCustomer" class="logForm_input" required>
                                        <option value="">-----Chọn khách hàng----</option>
                                        <?php 
                                        $query2 = "select Customer.Id, Customer.DisplayName from Customer";
    
                                        $val = mysqli_query($db, $query2);
                                        if(mysqli_num_rows($val)>0){
                                            while($row=mysqli_fetch_array($val)){
                                                $name = $row['DisplayName'];
                                                $id = $row['Id'];
                                                echo "<option value='".$id."'>".$name."</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                <span class="logForm_title">Số lượng :</span>
                                
                                    <input id="Count" name="Count" type="number" min='0' max='' class="logForm_input" placeholder="Số lượng xuất" required>
                                    <span class="formMessage"></span>
                                </div>
                                <div class="form-group">
                                <span class="logForm_title">Trạng thái :</span>
                                    <input id="Stt" name="Stt" type="text" class="logForm_input" placeholder="Đủ hàng yêu cầu ?" required>
                                    <span class="formMessage"></span>
                                </div>
                                <div class="form-group">
                                    <input id="IdOutput" name="IdOutput" type="hidden" value="<?php echo $IdNote; ?> " class="logForm_input" placeholder="Số lượng">
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
        $("#IdObject").change(function(){ 
        var IdObject = $(this).val(); 
        var dataString = "IdObject="+IdObject; 

        $.ajax({ 
            type: "POST", 
            url: "/process/Inventory/dataOfProductOut.php", 
            data: dataString, 
            success: function(result){ 
                $('#Count').attr("max",result);
                $('#Count').attr("value",result);
            }
        });

        });
    });
    </script>
    
</body>

</html>