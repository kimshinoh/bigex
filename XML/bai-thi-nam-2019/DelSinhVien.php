<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xoá thông tin nhân viên</title>
</head>
<body>
    <?php
    $doc=new DOMDocument();
    $doc->load('Sinhvien.xml');
    $dssinhvien=$doc->getElementsByTagName("sinhvien");
    
    $masv = $_POST['masv'];
    $sql = 'delete from student where masv = '.$masv;
    execute($sql);
	echo 'Xoá sinh viên thành công';
    header('location:index.php');
    
    ?>
</body>
</html>