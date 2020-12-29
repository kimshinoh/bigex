<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Sinh Viên</title>
    <link rel="stylesheet" href="./main.css">

</head>

<body>

    <?php 
    if(isset($_REQUEST['add']))
    {
        $xml=new DOMDocument("1.0","UTF_8");
        $xml->formatOutput=TRUE;
        $xml->preserveWhiteSpace=FALSE;
        $xml->load('sinhvien.xml');
        $root=$xml->firstChild;
        $sinhvien=$xml->createElement("sinhvien");
    
        $aTag=$xml->createElement("masinhvien",$_REQUEST['masinhvien']);
        $bTag=$xml->createElement("hovaten",$_REQUEST['hovaten']);
        $cTag=$xml->createElement("ntnamsinh",$_REQUEST['ntnamsinh']);
        $dTag=$xml->createElement("quequan",$_REQUEST['quequan']);
        $eTag=$xml->createElement("diemtinhoc",$_REQUEST['diemtinhoc']);
    
        $sinhvien->appendChild($aTag);
        $sinhvien->appendChild($bTag);
        $sinhvien->appendChild($cTag);
        $sinhvien->appendChild($dTag);
        $sinhvien->appendChild($eTag);
    
        $root->appendChild($sinhvien);
        $xml->save('sinhvien.xml');
        header('location:./index.php');
    }
    ?>
    <center>
        <textarea cols="70" rows="18" class="XML">
        <?php
        if (empty($_REQUEST['add']))
        {
            $xml=new DOMDocument("1.0","UTF_8");
            $xml->load('sinhvien.xml');
        }
        print($xml->saveXML());
        ?>
        </textarea>

    </center>
    <center>
        <h2>Thêm sinh viên</h2>
        <table class='form-add' border="2">
            <form method="POST">
                    <td>Mã sinh viên</td>
                    <td><input class='form-input' type="text" name="masinhvien"></td>
                </tr>
                <tr>
                    <td>Họ và tên</td>
                    <td><input class='form-input' type="text" name="hovaten"></td>
                </tr>
                <tr>
                    <td>Ngày sinh</td>
                    <td> <input class='form-input' type="text" name="ntnamsinh"></td>
                </tr>
                <tr>
                    <td>Quê quán</td>
                    <td><input class='form-input' type="text" name="quequan"></td>
                </tr>
                <tr>
                    <td>Điểm tin học</td>
                    <td> <input class='form-input' type="text" name="diemtinhoc"></td>
                </tr>
                <tr>
                    <td colspan="3" align="center">
                        <input type="submit" name="add" value="Thêm">
                        <input type="reset" name="add" value="Nhập lại">
                    </td>
                </tr>
            </form>
        </table>
        <button><a href="./index.php">Bảng danh sách</a> </button>
    </center>
</body>

</html>