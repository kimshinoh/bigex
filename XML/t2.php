<!DOCTYPE html>
<html lang="en">
<head>
    <title>t2</title>
</head>
<body>
<?php
    $ten='{"Anh":20,"Binh":21,"Tam":22}';
    $json=json_decode($ten);
    foreach ($json as $key => $value) {
        echo $key . "=" . $value . " Tuoi" . "<br>";
    }
?>    
</body>
</html>