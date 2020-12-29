<!DOCTYPE html>
<html>
<head>
	<title>Them sinh vien</title>
</head>
<body>
  <style type="text/css">
    body{
      background: grey;
    }
  </style>
  <?php
  if(isset($_REQUEST['add'])){
        $xml = new DOMDocument("1.0","UTF_8");
        $xml->formatOutput=TRUE;
        $xml->preserveWhiteSpace=FALSE;
        $xml->load('sinhvien.xml');
        $root = $xml->firstChild;
        $dataTag=$xml->createElement("sinhvien");     
        $aTag=$xml->createElement("masv",$_REQUEST['masv']);
        $bTag=$xml->createElement("tensv",$_REQUEST['tensv']);
        $cTag=$xml->createElement("ngaysinh",$_REQUEST['ngaysinh']);
        $dTag=$xml->createElement("diachi",$_REQUEST['diachi']);
        $eTag=$xml->createElement("sdt",$_REQUEST['sdt']);
        $fTag=$xml->createElement("lop",$_REQUEST['lop']);
        $gTag=$xml->createElement("monhoc",$_REQUEST['monhoc']);
         
        $dataTag->appendChild($aTag);
        $dataTag->appendChild($bTag);
        $dataTag->appendChild($cTag);
        $dataTag->appendChild($dTag);
        $dataTag->appendChild($eTag);
        $dataTag->appendChild($fTag);
        $dataTag->appendChild($gTag);
        $root->appendChild($dataTag);
        $xml->save('sinhvien.xml');
     
    }
  ?>

  <!--  <?php
   if(empty($_REQUEST['add'])){
        $xml = new DOMDocument("1.0","UTF_8");
        $xml->load("sinhvien.xml");
    }
    print($xml->saveXML());
  ?>
  <br>-->
  <center>
  <textarea rows="24" cols="70">
    <?php
     if(empty($_REQUEST['add'])){
      $xml= new DOMDocument("1.0","UTF_8");
      $xml->load("sinhvien.xml");
     }
     print($xml->saveXML());
    ?>
    
  </textarea>
</center>
  <center>
  	<table border="2">
  		<form action="them.php" method="post">
  			<tr>
  				<td colspan="2" align="center">
  					Them sinh vien
  				</td>
  			</tr>
  			<tr>
  				<td>Ma sinh vien</td>
  				<td><input type="text" name="masv" placeholder="Nhap ma sinh vien"></td>	 				
  			</tr>
  			<tr>
  				<td>Ten sinh vien</td>
  				<td><input type="text" name="tensv" placeholder="Nhap ten sinh vien"></td>	 				
  			</tr>
  			<tr>
  				<td>Ngay sinh</td>
  				<td><input type="text" name="ngaysinh" placeholder="Nhap ngay sinh"></td>	 				
  			</tr>
  			<tr>
  				<td>Dia chi</td>
  				<td><input type="text" name="diachi" placeholder="Nhap dia chi"></td>	 				
  			</tr>
  			<tr>
  				<td>So dien thoai</td>
  				<td><input type="text" name="sdt" placeholder="Nhap sdt"></td>	 				
  			</tr>
  			<tr>
  				<td>Lop</td>
  				<td><input type="text" name="lop" placeholder="Nhap lop"></td>	 				
  			</tr>
  			<tr>
  				<td>Mon hoc</td>
  				<td><input type="text" name="monhoc" placeholder="Nhap Mon hoc"></td>	 				
  			</tr>
  			<tr>
  				<td colspan="3" align="center">
                   <input type="submit" name="add" value="Them">
                   <input type="submit" name="" value="Nhap lai">
                   <button class="button" type="submit"><a href="index.php">Bang danh sach</a></button>
                </td>
  			</tr>
  		</form>
  	</table>
  </center>
</body>
</html>
