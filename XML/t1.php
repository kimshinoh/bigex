<!DOCTYPE html>
<html lang="en">
<head>
    <title>t1</title>
</head>
<body>
    <?php
    $ten='{"Anh":20,"Binh":21,"Tam":22}';
    $json=json_decode($ten);
    echo $json ->Anh."<br \>";
    echo $json ->Binh."<br \>";
    echo $json ->Tam."<br \>";
    ?>
</body>
</html>