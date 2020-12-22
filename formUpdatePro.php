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
    <title>Nhà Cung Cấp</title>
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
                                        <i class="fas fa-plus"></i>  Thêm sản phẩm
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
                                <div id="table-wrapper">
                                <div id="table-scroll">
                                    <table  class="content">
                                        <tr class="tablePro">
                                            <th style="width: 3%;">ID</th>
                                            <th style="width: 23%;">Tên Sản Phẩm</th>
                                            <th style="width: 3%;">Đơn Vị</th>
                                            <th style="width: 22%;">Hình Ảnh</th>
                                            <th style="width: 22%;">QrCode</th>
                                            <th style="width: 8%;">#</th>
                                        </tr>
                                        <?php
                                            $db = mysqli_connect('localhost','root','12345','quanlykho',3306);
                                            if(!$db){
                                                echo 'Lỗi';

                                            } else {
                                                $select_table = 'select * from object order by Id+0 asc';

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
		
			$sql_read="select * from object where Id='".$Id."'";
			$kq=mysqli_query($db,$sql_read);
			if(mysqli_num_rows($kq)>0)
			{
				while($r=mysqli_fetch_array($kq))
				{
					$DisplayName=$r['DisplayName'];
					$Unit=$r['Unit'];			
				}
			}
	?>
    <div id="1" class="modal2">
        <div  class="modal_overlay" onclick="returnMain()">
    
        </div>
        <div class="modal_body2">
            <div id="add1" class="modal_innerAdd2">
                <div class="logForm_container">
                    <form id="form1" action="./process/Product/updatePro.php" enctype="multipart/form-data" method=POST>
                        <div class="logForm" >
                            <div class="logForm_Header">
                                <h3 class="logForm_Heading">Sửa sản phẩm</h3>
                                <a href="/genPro.php" class="btn btn-home">Quay Lại</a>
                            </div>
                            <div class="logForm_main">
                                <div class="form-group">
                                    <input readonly="readonly" id="Id" name="Id" value="<?php echo $Id; ?>" type="text" class="logForm_input" placeholder="Id">
                                    <span class="formMessage"></span>
                                </div>
                                <div class="form-group">
                                    <input id="DisplayName" name="DisplayName" value="<?php echo $DisplayName; ?>" type="text" class="logForm_input" placeholder="Tên sản phẩm">
                                    <span class="formMessage"></span>
                                </div>
                                <div class="form-group">
                                <select name="Unit" id="Unit" class="logForm_input">
                                        <option value="">----- Đơn Vị ------</option>
                                        <option value="Cái" <?php if($Unit == 'Cái') echo 'selected'; ?>>Cái</option>
                                        <option value="Chiếc" <?php if($Unit == 'Chiếc') echo 'selected'; ?>>Chiếc</option>
                                        <option value="Thùng" <?php if($Unit == 'Thùng') echo 'selected'; ?>>Thùng</option>
                                        <option value="Quyển" <?php if($Unit == 'Quyển') echo 'selected'; ?>>Quyển</option>
                                        <option value="Bộ" <?php if($Unit == 'Bộ') echo 'selected'; ?>>Bộ</option>
                                        <option value="Kg" <?php if($Unit == 'Kg') echo 'selected'; ?>>Kg</option>
                                        <option value="Bao"<?php if($Unit == 'Bao') echo 'selected'; ?>>Bao</option>
                                        <option value="Bọc"<?php if($Unit == 'Bọc') echo 'selected'; ?>>Bọc</option>

                                    </select>
                                    <span class="formMessage"></span>
                                </div>
                                <div class="form-group">
                                    <span class="logForm_title">Ảnh</span>
                                    <input id="Image" name="Image" type="file" class="logForm_input files" >
                                    <span class="formMessage"></span>
                                </div>
                                <div class="form-group">
                                    <span class="logForm_title">QR Code</span>
                                    <input id="QRCode" name="QRCode" type="file" class="logForm_input files">
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

</body>
</html>