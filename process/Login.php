<?php
    if(isset($_POST['username'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        if($username == 'admin'){
            if($password == 'admin'){
                header('location:../../general.php');
            } else {
                header("location:../../XLogin/Login.php?err=mk");
            }
        } else {
            header("location:../../XLogin/Login.php?err=tk");
        }
    } 
	?>