<!DOCTYPE html>
<html>
<head>
	<title>Hien thi danh sach sinh vien</title>
	<center><h1>Danh sach sinh vien</h1></center>
</head>
<body>
	<table border="2" align="center">
   <?php
     $doc=new DOMDocument();
     $doc->load('sinhvien.xml');
     $dssinhvien=$doc->getElementsByTagName("sinhvien");
     echo "<tr background:>
     <th>Ma sinh vien</th>
     <th>Ten sinh vien</th>
     <th>Ngay sinh</th>
     <th>Dia chi</th>
     <th>So dien thoai</th>
     <th>Lop</th>
     <th>Mon hoc</th>
     </tr>";
     foreach ($dssinhvien as $sinhvien) {
     	$a=$sinhvien->getElementsByTagName("masv");
        $masv=$a->item(0)->nodeValue;

        $b=$sinhvien->getElementsByTagName("tensv");
        $tensv=$b->item(0)->nodeValue;
        
        $c=$sinhvien->getElementsByTagName("ngaysinh");
        $ngaysinh=$c->item(0)->nodeValue;
        
        $d=$sinhvien->getElementsByTagName("diachi");
        $diachi=$d->item(0)->nodeValue;
        
        $e=$sinhvien->getElementsByTagName("sdt");
        $sdt=$e->item(0)->nodeValue;

        $f=$sinhvien->getElementsByTagName("lop");
        $lop=$f->item(0)->nodeValue;

        $g=$sinhvien->getElementsByTagName("monhoc");
        $monhoc=$g->item(0)->nodeValue;
        
        
        
        echo"<tr>
          <td>$masv</td>
          <td>$tensv</td>
          <td>$ngaysinh</td>
          <td>$diachi</td>
          <td>$sdt</td>
          <td>$lop</td>
          <td>$monhoc</td>
        </tr>";
    }
 
   ?>
   </table>
   <div class ="class-btn" align="center">
   	    <button type="submit"><a href="them.php">Them sinh vien</a></button>
   		<button type="submit"><a href="xuat.php">Xuat file JSON</a></button>
   </div>
</body>
</html>