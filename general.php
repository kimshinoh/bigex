<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./interface/css/bass.css">
    <link rel="stylesheet" href="./interface/css/index.css">
    <link rel="stylesheet" href="./interface/css/normalize.css">
    <link rel="shortcut icon" type="image/x-icon" href="./interface/img/mainico.ico" />
    <link rel="stylesheet" href="./interface/fonts/fontawesome-free-5.14.0-web/css/all.css">
    <title>Tổng quan</title>
</head>

<body>
    <div class="app">
    <?php include './interface/partials/header.php'; ?>
        <div class="container">
            <div class="optionBar">
                <div class="grid">
                    <ul class="optionBar-list">
                        <li class="optionBar-item optionBar-item-active">
                            <a class="optionBar-item-link " href="#">Tổng Quan</a>
                        </li>
                        <li class="optionBar-item">
                            <a class="optionBar-item-link " href="/inputNote.php">Nhập xuất</a>
                        </li>
                        <li class="optionBar-item ">
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
                    <div class="home__content">
                        <div class="content-layer">
                            <div class="content-general">
                            <?php
                                            $db = mysqli_connect('localhost','root','12345','quanlykho',3306);
                                            if(!$db){
                                                echo 'Lỗi';

                                            } 
                                        ?>
                                <div class="general-card">
                                        
                                        <span class="title-general">Tồn kho</span>
                                    <ul class="general-list">
                                            <?php
                                                $select_table = 'select * from inventorygeneral order by Id+0 asc';
                                                $value = mysqli_query($db, $select_table);
                                                if(mysqli_num_rows($value)>0){
                                                    while($r=mysqli_fetch_array($value)){
                                                        $IdObject = $r['IdObject'];
                                                        $Total = $r['Total'];
                                                        $SelectObject = "select DisplayName, Unit from object where Id='".$IdObject."'";
                                                        $va = mysqli_query($db, $SelectObject);
                                                        if(mysqli_num_rows($va)>0){
                                                            while($r=mysqli_fetch_array($va)){
                                                                $Object = $r['DisplayName'];
                                                                $Unit = $r['Unit'];
                                                            echo "<li class='general-item'><i class='icon-item fas fa-boxes'></i>".$Object;
                                                            echo ":   <span class='title-item'>$Total</span>";
                                                            echo "  (".$Unit.")</li>";
                                                            }
                                                        }
                                                    }
                                                }
                                            
                                        ?>
                                        
                                    </ul>
                                </div>
                                <div class="general-card">
                                    <span class="title-general">Đã xuất</span>
                                    <ul class="general-list">
                                        <?php

                                            $value1 = mysqli_query($db, $select_table);
                                            if(mysqli_num_rows($value1)>0){
                                                while($r=mysqli_fetch_array($value1)){
                                                    $IdObject = $r['IdObject'];
                                                    
                                                    $Sold = $r['sold'];
                                                    if($Sold != 0){
                                                    $SelectObject = "select DisplayName, Unit from object where Id='".$IdObject."'";
                                                    $va = mysqli_query($db, $SelectObject);
                                                    if(mysqli_num_rows($va)>0){
                                                        while($r=mysqli_fetch_array($va)){
                                                            $Object = $r['DisplayName'];
                                                            $Unit = $r['Unit'];
                                                        echo "<li class='general-item'><i class='icon-item far fa-check-circle'></i>".$Object;
                                                        echo ":   <span class='title-item'>$Sold</span>";
                                                        echo "  (".$Unit.")</li>";
                                                    }
                                                        }
                                                    }
                                                }
                                            }
                                        ?>
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
    <script src="./interface/js/index.js"></script>
</body>

</html>