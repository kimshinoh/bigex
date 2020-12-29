<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài kiểm tra</title>
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
    $doc->load('books.xml');
    $catalog=$doc->getElementsByTagName("book");
    echo "<tr background:>
        <th>Author</th>
        <th>Title</th>
        <th>Genre</th>
        <th>Price</th>
        <th>Publish_date</th>
        <th>Description</th>
    </tr>";
    foreach ($catalog as $book){
        $a=$book->getElementsByTagName("author");
        $author=$a->item(0)->nodeValue;
        $b=$book->getElementsByTagName("title");
        $title=$b->item(0)->nodeValue;
        $c=$book->getElementsByTagName("genre");
        $genre=$c->item(0)->nodeValue;
        $d=$book->getElementsByTagName("price");
        $price=$c->item(0)->nodeValue;
        $e=$book->getElementsByTagName("publish_date");
        $publish_date=$e->item(0)->nodeValue;
        $f=$book->getElementsByTagName("description");
        $description=$f->item(0)->nodeValue;
        
        echo "<tr><td>$author</td>
        <td>$title</td>
        <td>$genre</td>
        <td>$price</td>
        <td>$publish_date</td>
        <td>$description</td>
        </tr>";
        }  
    ?>
    </table>
    <div class="class-btn" align="center">
        <button>
            <a href="cau2.php">Câu 2</a>
        </button>
        <button class="button" type="submit">
            <a href="them.php">Thêm dữ liệu từ giao diện web vào file XML</a>
        </button>
        <button>
            <a href="xuat.php">Xuất dữ liệu từ XML sang JSON lên web</a>
        </button>
        <button>
            <a href="books.xml">Hiển thị dữ liệu từ XML lên web</a>
        </button>
    </div>
</body>
</html>