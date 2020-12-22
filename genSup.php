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
    <link href="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.min.css" rel="stylesheet"/>
    <title>Nhà Cung Cấp</title>
</head>

<body>
    <div class="app">
    <?php include './interface/partials/header.php'; ?>
        <div class="container">
            <div class="optionBar">
                <div class="grid">
                    <ul class="optionBar-list">
                        <li class="optionBar-item ">
                            <a class="optionBar-item-link " href="/general.php">Tổng Quan</a>
                        </li>
                        <li class="optionBar-item">
                            <a class="optionBar-item-link " href="/inputNote.php">Nhập xuất</a>
                        </li>
                        <li class="optionBar-item optionBar-item-active">
                            <a class="optionBar-item-link" href="#">Hàng Hóa</a>
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
                                        <i class="fas fa-plus"></i>  Thêm nhà cung cấp
                                        </li>
                                        <li class="category-item" >
                                        <input type="text" class="search-input" id="search-input" placeholder='Tên NCC'>
                                        <i id= 'search-icon' class="fas fa-search"></i>
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
                                        <tbody id= "table-body">
                                        <?php
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
                                                $total_pages_sql = "SELECT COUNT(*) FROM suplier";
                                                $result = mysqli_query($db,$total_pages_sql);
                                                $total_rows = mysqli_fetch_array($result)[0];
                                                $total_pages = ceil($total_rows / $numPage);
                                                $select_table = "select * from suplier order by Id+0 asc limit $offset, $numPage";

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
                                                
                                        ?>
                                        </tbody>
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
                    <form id="form1" action="./process/Suplier/addSup.php" method=POST>
                        <div class="logForm" >
                            <div class="logForm_Header">
                                <h3 class="logForm_Heading">Thêm nhà cung cấp</h3>
                            </div>
                            <div class="logForm_main">
                                <div class="form-group">
                                <span class="logForm_title">Id :</span>
                                    <input id="Id" name="Id" type="text" class="logForm_input" placeholder="VD: 12" required>
                                    <span class="formMessage"></span>
                                </div>
                                <div class="form-group">
                                <span class="logForm_title">Tên Nhà Cung Cấp :</span>
                                    <input id="DisplayName" name="DisplayName" type="text" class="logForm_input" placeholder="Ncc" required>
                                    <span class="formMessage"></span>
                                </div>
                                <div id="list1" class="dropdown-check-list" tabindex="100" required>
                                    <span id="anchor" class="anchor">Chọn sản phẩm</span>
                                    <ul class="items">
                                        <?php 
                                        $query = "select DisplayName,Id from object";
                                        $va = mysqli_query($db, $query);
                                        if(mysqli_num_rows($va)>0){
                                            while($row=mysqli_fetch_array($va)){
                                                $name = $row['DisplayName'];
                                                $id = $row['Id'];
                                                echo "<li><input type='checkbox' name='IdObject[]' value='".$id."'>&nbsp&nbsp".$name."</li>";
                                            }
                                        }
                                        
                                        ?> 
                                    </ul>
                                    <span class="formMessage"></span>
                                </div>
                                <div class="form-group">
                                    <span class="logForm_title">Địa chỉ :</span>
                                    <input id="Address" name="Address" type="text" class="logForm_input" placeholder="Ha Noi" required>
                                    <span class="formMessage"></span>
                                </div>
                                <div class="form-group">
                                <span class="logForm_title">Số điện thoại :</span>
                                    <input id="Phone" name="Phone" type="text" class="logForm_input" placeholder="0123456789" required>
                                    <span class="formMessage"></span>
                                </div>
                                <div class="form-group">
                                <span class="logForm_title">Email :</span>
                                    <input id="Email" name="Email" type="text" class="logForm_input" placeholder="abc@xyz.com" required>
                                    <span class="formMessage"></span>
                                </div>
                                <div class="form-group">
                                <span class="logForm_title">Thông tin thêm :</span>
                                    <input id="MoreInfo" name="MoreInfo" type="text" class="logForm_input" placeholder="Ncc cung cấp những gì" required>
                                    <span class="formMessage"></span>
                                </div>
                                <div class="form-group">
                                <span class="logForm_title">Ngày hợp tác :</span>
                                    <input id="ContractDate" name="ContractDate" type="datetime-local" class="logForm_input" required>
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
            $('#search-icon').click(function(){
                var dataSearch = document.getElementById('search-input').value;
                var table = document.getElementById('table-body');
                
                $.ajax({ 
                    type: "get", 
                    url: `/process/Searching/Suplier.php?name=${dataSearch}`, 
                    
                    success: function(result){ 
                        
                        table.innerHTML = result;
                    }
                });
            })
        })
    </script>
    
</body>

</html>