<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Sinh Viên</title>
    <style>
    html{
        background-color: #AAAAAA;
    }
    table{
        background-color: white;
    }
    .SinhVienXML{
        color: white;
        background-color: black;
    }
    </style>
</head>
<body>

</body>
</html>
<?php 
if(isset($_REQUEST['add']))
{
    $xml=new DOMDocument("1.0","UTF_8");
    $xml->formatOutput=TRUE;
    $xml->preserveWhiteSpace=FALSE;
    $xml->load('SinhVien.xml');
    $root=$xml->firstChild;
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
    $xml->save('SinhVien.xml');
    header('location:index.php');
}
?>
    <center>
    <textarea cols="70" rows="18" class="SinhVienXML">
    <?php
    if (empty($_REQUEST['add']))
    {
        $xml=new DOMDocument("1.0","UTF_8");
        $xml->load('SinhVien.xml');
    }
    print($xml->saveXML());
    ?>
    </textarea>

    </center>
<center>
<h2>Thêm danh sách sinh viên</h2>
    <table style="display:inline-block;"  border="2">
    <form action="them.php" method="POST">
    <tr>
    <td colspan="2" align="center">Thêm sinh viên</td>
    <tr>
        <td>Mã sinh viên</td>
        <td><input type="text" name="masv"></td>
    </tr>
    <tr>
        <td>Tên sinh viên</td>
        <td><input type="text" name="tensv"></td>
    </tr>
    <tr>
       <td>Ngày sinh</td>
       <td> <input type="date" name="ngaysinh"></td>
    </tr>
    <tr>
       <td>Địa chỉ</td>
       <td><textarea name="diachi" id="" cols="30" rows="3"></textarea></td>
    </tr>
    <tr>
       <td>Số điện thoại</td>
       <td> <input type="text" name="sdt"></td>
    </tr>
    <tr>
       <td>Lớp</td>
       <td><input type="text" name="lop"></td>
    </tr>
    <tr>
       <td>Môn học</td>
       <td> <input type="text" name="monhoc"></td>
    </tr>
<td colspan="3" align="center">
  <input type="submit" name="add" value="Thêm">
   <input type="reset" name="add" value="Nhập lại">
   <button class="button" type="submit"> <a href="index.php">Bảng danh sách</a> </button>
</td>
    </tr>
    </form>
    </table>
    </center>

