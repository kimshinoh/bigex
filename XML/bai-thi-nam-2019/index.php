<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hiển thị danh sách sinh viên</title>
    <center><h1>Danh sách sinh viên</h1></center>
    <style>
    a{
        text-decoration: none;
    }
</style>
</head>
<body style="text-align: center;">
    <table style="display:inline-block;"  border="2" align="center">
    <?php
    $doc=new DOMDocument();
    $doc->load('Sinhvien.xml');
    $dssinhvien=$doc->getElementsByTagName("sinhvien");
    echo "<tr background:>
        <th>Mã sinh viên</th>
        <th>Họ tên</th>
        <th>Ngày sinh</th>
        <th>Địa chỉ</th>
        <th>Số điện thoại</th>
        <th>Lớp</th>
        <th>Môn học</th>
    </tr>";
    foreach ($dssinhvien as $sinhvien){
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
        echo "<tr><td>$masv</td>
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
    <div class="class-btn" align="center">
        <button class="button" type="submit">
            <a href="them.php">Thêm sinh viên</a>
        </button>
        <button>
            <a href="xuat.php">Xuất file JSON</a>
        </button>
    </div>
</body>
</html>