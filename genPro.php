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
                            <a class="optionBar-item-link " href="/general.php">Tổng Quan</a>
                        </li>
                        <li class="optionBar-item">
                            <a class="optionBar-item-link " href="/inputNote.php">Nhập xuất</a>
                        </li>
                        <li class="optionBar-item optionBar-item-active">
                            <a class="optionBar-item-link" href="/genPro.php">Hàng Hóa</a>
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
                                        <i class="fas fa-plus"></i>  Thêm sản phẩm
                                        </li>
                                        <li class="category-item" >
                                        <input type="text" class="search-input" id="search-input" placeholder='Tên Sp'>
                                        <i id= 'search-icon' class="fas fa-search"></i>
                                        </li>
                                    </ul>
                            </nav>
                        </div>
                        <div class="grid_column-10">
                            <div class="home__filter">
                                <span class="home__filter-item"></span>
                                <a href="#" class="btn btn-home btn-main">Sản Phẩm</a>
                                <a href="/genSup.php" class="btn btn-home">Nhà Cung Cấp</a>
                            </div>
                            <div class="home__content">
                                <div class="content-layer">
                                    <table  class="content">
                                        <thead>

                                            <tr class="tablePro">
                                                <th style="width: 3%;">ID</th>
                                                <th style="width: 30%;">Tên Sản Phẩm</th>
                                                <th style="width: 5%;">Đơn Vị</th>
                                                <th style="width: 33%;">Hình Ảnh</th>
                                                <th style="width: 22%;">QrCode</th>
                                                <th style="width: 7%;">#</th>
                                            </tr>
                                        </thead>
                                        <tbody id="table-body">
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
                                                $numPage = 4;
                                                $offset = ($pageno - 1) * $numPage;
                                                $total_pages_sql = "SELECT COUNT(*) FROM object";
                                                $result = mysqli_query($db,$total_pages_sql);
                                                $total_rows = mysqli_fetch_array($result)[0];
                                                $total_pages = ceil($total_rows / $numPage);
                                                $select_table = "select * from object order by Id+0 asc limit $offset, $numPage";

                                                $value = mysqli_query($db, $select_table);
                                                if(mysqli_num_rows($value)>0){
                                                    
                                                    $i=0;
                                                    while($r=mysqli_fetch_array($value)){
                                                    $i++;
                                                    $id = $r['Id'];
                                                    echo '<tr class="tableProItem">';
                                                    echo '<td>'.$id.'</td>';
                                                    echo '<td>'.$r['DisplayName'].'</td>';
                                                    echo '<td>'.$r['Unit'].'</td>';
                                                    echo "<td><img class='tableProImg' alt='Ảnh ".$r['DisplayName']."' src='storeImg/".$r['Image']."'></td>";
                                                    echo "<td><img class='tableProImg' alt='QrCode ".$r['DisplayName']."' src='storeImg/".$r['QRCode']."'></td>";
                                                    echo "<td><a class='tool' href='/process/Product/deletePro.php?Id=$id'><i class='deleteItem far fa-trash-alt'></i></a><a class='tool' href='/formUpdatePro.php?Id=$id'><i class='fixItem fas fa-wrench'></i></a></td>";
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
                    <form id="form1" action="./process/Product/addPro.php" method=POST enctype="multipart/form-data">
                        <div class="logForm" >
                            <div class="logForm_Header">
                                <h3 class="logForm_Heading">Thêm sản phẩm</h3>
                            </div>
                            <div class="logForm_main">
                                <div class="form-group">
                                <span class="logForm_title">Id :</span>
                                    <input id="Id" name="Id" type="text" class="logForm_input" placeholder="Id" required>
                                    <span class="formMessage"></span>
                                </div>
                                <div class="form-group">
                                <span class="logForm_title">Tên sản phẩm :</span>
                                    <input id="DisplayName" name="DisplayName" type="text" class="logForm_input" placeholder="Bánh mì khoai chuôi" required>
                                    <span class="formMessage"></span>
                                </div>
                                <div class="form-group">
                                    <select name="Unit" id="Unit" class="logForm_input" required>
                                        <option value="">----- Đơn Vị ------</option>
                                        <option value="Cái">Cái</option>
                                        <option value="Chiếc">Chiếc</option>
                                        <option value="Thùng">Thùng</option>
                                        <option value="Quyển">Quyển</option>
                                        <option value="Kg">Kg</option>
                                        <option value="Bao">Bao</option>
                                        <option value="Bọc">Bọc</option>
                                        

                                    </select>
                                    <span class="formMessage"></span>
                                </div>
                                <div class="form-group">
                                    <span class="logForm_title">Ảnh</span>
                                    <input id="Image" name="Image" type="file" class="logForm_input files" required>
                                    <span class="formMessage"></span>
                                </div>
                                <div class="form-group">
                                    <span class="logForm_title">QR Code</span>
                                    <input id="QRCode" name="QRCode" type="file" class="logForm_input files" required>
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
                    url: `/process/Searching/Product.php?name=${dataSearch}`,       
                    success: function(result){ 
                        table.innerHTML = result;
                    }
                });
            })
        })
    </script>
</body>

</html>