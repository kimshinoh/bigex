<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xuất file JSON</title>
</head>
<body>
    <?php
    $xml_string=file_get_contents('http://localhost/test/XML/bai-thi-nam-2019/SinhVien.xml');
    $xml=simplexml_load_string($xml_string);
    $json=json_encode($xml,JSON_UNESCAPED_UNICODE);
    echo($json);
    ?>
</body>
</html>