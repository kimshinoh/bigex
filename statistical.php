
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
    <title>Thống kê - Báo cáo</title>
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
                        <li class="optionBar-item ">
                            <a class="optionBar-item-link" href="/genPro.php">Hàng Hóa</a>
                        </li>
                        <li class="optionBar-item">
                            <a class="optionBar-item-link" href="/genCus.php">Khách Hàng</a>
                        </li>
                        <li class="optionBar-item optionBar-item-active">
                            <a class="optionBar-item-link" href="#">Thống kê</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="contentForm">
                <div class="grid">
                    <div class="home__content">
                        <div class="content-layer">
                            <div class="home__filter home-static">
                                <span class="logForm_title">Thông tin muốn thống kê: </span>
                                <select name="information" id="information" style="width: 120px; height: 40px; font-size: 1.4rem;font-weight:600; margin-left: 10px; ">
                                    <option value="input">Nhập Hàng</option>
                                    <option value="output">Xuất Hàng</option>
                                    <option value="object">Hàng hóa</option>
                                </select>
                                <select name="object" id="object" style='margin: 0 10px; height: 40px;font-size: 1.4rem;font-weight:600;display:none'>
                                    <option value="">Chọn sản phẩm</option>
                                    <?php 
                                    include "./process/db.php";
                                        $query = "select DisplayName,Id from object";
                                        $va = mysqli_query($db, $query);
                                        if(mysqli_num_rows($va)>0){
                                            while($row=mysqli_fetch_array($va)){
                                                $name = $row['DisplayName'];
                                                $id = $row['Id'];
                                                echo "<option value='$id'>$name</option>";
                                            }
                                        }
                                        
                                        ?> 
                                </select>
                                <span class="logForm_title">Ngày cần thống kê: </span>
                                <input style="width: 160px; margin-left: 10px; margin-bottom: 5px" id="DateSearch" name="DateSearch" type="date" class="logForm_input" required>
                                <span style="margin-left:10px; font-size: 1.5rem">=></span>
                                <input style="width: 160px; margin-left: 10px; margin-bottom: 5px" id="DateAfter" name="DateAfter" type="date" class="logForm_input" required>
                                <button id='btn-search' class="btn btn-main" style="margin-left: 30px; cursor: pointer">Thống kê</button>
                                <button id='export' class="btn btn-main" style="margin-left: 10px; cursor: pointer">Xuất file</button>
                            </div>
                            <table id="stati-list">
                                <thead>
                                    <th id='switch'>Sản phẩm</th>
                                    <th>Số lượng</th>
                                    <th>Đối tác</th>
                                    <th>Giá</th>
                                </thead>
                                <tbody id="body-list">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include './interface/partials/footer.php'; ?>
    <script src="./interface/js/index.js"></script>
    <script src="./interface/js/jquery.js"></script>
    <script src="./interface/js/jquery.table2excel.js"></script>
    <script>
        $(document).ready(function(){ 
            $('#information').change(function(){
                var selectSearch = document.getElementById('information').value;
                var objectHidden = document.getElementById('object');
                var switchThTag = document.getElementById('switch');
                if(selectSearch == 'object'){
                    objectHidden.style.display = 'block';
                    switchThTag.innerHTML = 'Phân loại';
                } else {
                    objectHidden.style.display = 'none';
                    switchThTag.innerHTML = 'Sản phẩm';
                }
            })
            $('#btn-search').click(function(){
                var dateSearch = document.getElementById('DateSearch').value;
                var information = document.getElementById('information').value;
                var dateAfter = document.getElementById('DateAfter').value;
                var bodyList = document.getElementById('body-list');
                var object = document.getElementById('object').value;
                $.ajax({ 
                    type: "get", 
                    url: `/process/Searching/Statistical.php?DateSearch=${dateSearch}&DateAfter=${dateAfter}&Information=${information}&Object=${object}`, 
                    success: function(result){ 
                        bodyList.innerHTML = result;
                        var priceElement = document.getElementsByClassName('price');
                        var countElement = document.getElementsByClassName('count');
                        let total = 0;
                        var arrayPrice = Array.from(priceElement);
                        var arrayCount = Array.from(countElement);
                        if(information != 'object'){
                            for(i = 0 ; i< arrayPrice.length ; i++){
                                total += ((+arrayPrice[i].innerHTML) * (+arrayCount[i].innerHTML))
                            }
                            bodyList.innerHTML += `<tr id='totalElement'><td colspan='4'><span style='margin-left:80%; font-weight: 600; font-size: 1.6rem;'>Tổng &emsp;&emsp;&emsp;&emsp;&emsp;  ${total}</span></td></tr>`;
                        } else {
                            var totalElement = document.getElementById(totalElement);
                            if(Array.from(totalElement).length != 0){
                                totalElement.remove()
                            }
                        }
                    }
                });
            });
            $("#export").click(function(){
                $("#stati-list").table2excel({
                    name: "Báo cáo",
                    filename: "BaoCao",
                    fileext: ".xls",
                    preserveColors:true

                });
            });
        });
    </script>
</body>

</html>
