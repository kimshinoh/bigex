<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>
    
        <table>
            <tr>
                <th>sothutu</th>
                <th>ten</th>
                <th>gia</th>
                <th>note</th>
                <th>anh</th>
            </tr>
            <?php
                include 'configDatabase.php';
                $select_table = 'select * from nguongoc order by manguon+0 asc';
                $value = mysqli_query($db, $select_table);
                if(mysqli_num_rows($value)>0){
                    while($r=mysqli_fetch_array($value)){
                        echo "<tr>";
                        echo "<td>".$r['manguon']."</td>";
                        echo "<td>".$r['tennguon']."</td>";
                        echo "<td>".$r['gianhap']."</td>";
                        echo "<td>".$r['note']."</td>";
                        echo "<td>".$r['anh']."</td>";
                        echo "</tr>";
                    }
                }
            ?>
        </table>
    </body>
</html>