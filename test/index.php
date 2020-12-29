<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài kiểm tra</title>
    <link rel="stylesheet" href="./main.css">
    <style>
    a{
        text-decoration: none;
    }
</style>
</head>
<body style="text-align: center;">
    <h1>Danh sách sinh viên</h1>

    <table border='1'>
    <?php
    $doc=new DOMDocument();
    $doc->load('./sinhvien.xml');
    $sinhviens=$doc->getElementsByTagName("sinhvien");
    echo "<tr>
        <th>Ma Sinh Vien</th>
        <th>Ho va ten</th>
        <th>Ngay sinh</th>
        <th>Que quan</th>
        <th>Diem tin hoc</th>
    </tr>";
    foreach ($sinhviens as $sinhvien){
        $a=$sinhvien->getElementsByTagName("masinhvien");
        $masinhvien=$a->item(0)->nodeValue;
        $b=$sinhvien->getElementsByTagName("hovaten");
        $hovaten=$b->item(0)->nodeValue;
        $c=$sinhvien->getElementsByTagName("ntnamsinh");
        $ntnamsinh=$c->item(0)->nodeValue;
        $d=$sinhvien->getElementsByTagName("quequan");
        $quequan=$d->item(0)->nodeValue;
        $e=$sinhvien->getElementsByTagName("diemtinhoc");
        $diemtinhoc=$e->item(0)->nodeValue;

        echo "<tr><td>$masinhvien</td>
        <td>$hovaten</td>
        <td>$ntnamsinh</td>
        <td>$quequan</td>
        <td>$diemtinhoc</td>
        </tr>";
        }  
    ?>
    </table>
    <div class="class-btn" align="center">
        <button class="button" type="submit">
            <a href="./importData.php">Thêm dữ liệu từ giao diện web vào file XML</a>
        </button>
        <button>
            <a href="exportJSON.php">Xuất dữ liệu từ XML sang JSON lên web</a>
        </button>
        <button>
            <a href="sinhvien.xml">Hiển thị dữ liệu từ XML lên web</a>
        </button>
    </div>
</body>
</html>