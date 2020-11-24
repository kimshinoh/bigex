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
			$Unit=$_POST['Unit'];			
			$target_dir="../../storeImg/";
			$Image="";
			$target_fileImage = $target_dir.basename($_FILES["Image"]["name"]);
			if($_FILES["Image"]["error"]!=0)
			{
				echo "Error:".$_FILES["Image"]["error"]."<br />";
				exit();
			}
			else
			{
				move_uploaded_file($_FILES["Image"]["tmp_name"], $target_fileImage);
				$Image=$_FILES["Image"]["name"];
			}
			$QRCode="";
			$target_fileQRCode = $target_dir.basename($_FILES["QRCode"]["name"]);
			if($_FILES["QRCode"]["error"]!=0)
			{
				echo "Error:".$_FILES["QRCode"]["error"]."<br />";
				exit();
			}
			else
			{
				move_uploaded_file($_FILES["QRCode"]["tmp_name"], $target_fileQRCode);
				$QRCode=$_FILES["QRCode"]["name"];
			}

			$sql_query="Insert into object values('".$id."','".$displayname."','".$Unit."','".$Image."','".$QRCode."')";
			mysqli_query($db,$sql_query);		
			header('location:../../genPro.php');
		}
	?>