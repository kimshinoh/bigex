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
			$target_dir="../../storeImg/";
			$qrcode="";
			$target_fileQR = $target_dir.basename($_FILES["QRCode"]["name"]);
			if($_FILES["QRCode"]["error"]!=0)
			{
				echo "Error:".$_FILES["QRCode"]["error"]."<br />";
				exit();
			}
			else
			{
				move_uploaded_file($_FILES["QRCode"]["tmp_name"], $target_fileQR);
				$qrcode=$_FILES["QRCode"]["name"];
			}
			$barcode="";
			$target_fileBar = $target_dir.basename($_FILES["BarCode"]["name"]);
			if($_FILES["BarCode"]["error"]!=0)
			{
				echo "Error:".$_FILES["BarCode"]["error"]."<br />";
				exit();
			}
			else
			{
				move_uploaded_file($_FILES["BarCode"]["tmp_name"], $target_fileBar);
				$barcode=$_FILES["BarCode"]["name"];
			}

			$sql_query="Insert into object values('".$id."','".$displayname."','".$idunit."','".$idsuplier."','".$qrcode."','".$barcode."')";
			mysqli_query($db,$sql_query);		
			header('location:../../genPro.php');
		}
	?>