<?php
		//Kết nối và kiểm tra kết nối
		$db=mysqli_connect('localhost','root','12345','quanlykho',3306);
		if(!$db)
		{
			echo "404";
		}
		else
		{
			$id=$_POST['Id'];
			$displayname=$_POST['DisplayName'];
			$idunit=$_POST['IdUnit'];			
			$idsuplier=$_POST['IdSuplier'];
			$qrcode=$_POST['QRCode'];
			$barcode=$_POST['BarCode'];		
			$sql_query="Insert into object values('".$id."','".$displayname."','".$idunit."','".$idsuplier."','".$qrcode."','".$barcode."')";
			mysqli_query($db,$sql_query);		
			header('location:../../genPro.php');
		}
	?>