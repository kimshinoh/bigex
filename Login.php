<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./interface/css/index.css">
    <title>Đăng nhập</title>
</head>

<body>
    <?php 
    $error = '';
    if(isset($_REQUEST['err'])){
        $err = $_REQUEST['err'];
        if($err == 'tk'){
            $error = "Tài khoản không tồn tại";
        }
        if($err == 'mk'){
            $error = "Sai mật khẩu";
        }   
    }
    ?>
    <div class="grid">
    <div class="logForm_container">
        <form id="form1" action="./process/Login.php" method=POST>
            <div class="logForm">
                <div class="logForm_Header">
                    <h3 class="logForm_Heading" style="margin: auto;margin-top: 100px;margin-bottom: 100px;color: rgb(0, 0, 0);padding: 20px 50px; background-color: white;border-radius: 5px">
                    Đăng nhập
                </h3>
                </div>
                <div class="logForm_main">
                    <div class="form-group">
                    <?php 
                        if(isset($_REQUEST['err'])){
                            $err = $_REQUEST['err'];
                            if($err == 'tk'){
                               echo "<span class='formMessage err'>Tài khoản không tồn tại </span>";
                            }
                            if($err == 'mk'){
                                echo "<span class='formMessage err'>Sai mật khẩu</span>";
                            }   
                        }
                        ?>
                        <input  id="username" name="username" type="text" class="logForm_input login" placeholder="Tài khoản"  required>
                    </div>
                    <div class="form-group">
                        <input id="password" name="password" type="password" class="logForm_input login" placeholder="Mật khẩu" required>
                        <span class="formMessage"></span>
                    </div>


                </div>
            </div>
            <div class="logForm_control">
                <input type="submit" value="Đăng nhập" style="margin-top:50px;width: 100%;height: 50px;background-color: blue;color: white;font-weight: 700;" class="btn btn-main"></input>
            </div>
        </form>
    </div>
</div>
<script>
    
    document.addEventListener('DOMContentLoaded', function(){
  let err = '';
  err = <?php echo $error; ?>;
  if(err.length > 1){
    alert('Bạn cần đăng nhập trước khi thao tác chức năng này')
  }
  })
    </script>
</body>
</html>