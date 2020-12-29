<?php
    $xml_string=file_get_contents('http://localhost/test/sinhvien.xml');
    $xml=simplexml_load_string($xml_string);
    $json=json_encode($xml,JSON_UNESCAPED_UNICODE);
    echo($json);
?>