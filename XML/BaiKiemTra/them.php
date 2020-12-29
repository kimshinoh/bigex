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
    .booksXML{
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
    $xml->load('books.xml');
    $root=$xml->firstChild;
    $dataTag=$xml->createElement("book");

    $aTag=$xml->createElement("author",$_REQUEST['author']);
    $bTag=$xml->createElement("title",$_REQUEST['title']);
    $cTag=$xml->createElement("genre",$_REQUEST['genre']);
    $dTag=$xml->createElement("price",$_REQUEST['price']);
    $eTag=$xml->createElement("publish_date",$_REQUEST['publish_date']);
    $fTag=$xml->createElement("description",$_REQUEST['description']);

    $dataTag->appendChild($aTag);
    $dataTag->appendChild($bTag);
    $dataTag->appendChild($cTag);
    $dataTag->appendChild($dTag);
    $dataTag->appendChild($eTag);
    $dataTag->appendChild($fTag);

    $root->appendChild($dataTag);
    $xml->save('books.xml');
    header('location:index.php');
}
?>
    <center>
    <textarea cols="70" rows="18" class="booksXML">
    <?php
    if (empty($_REQUEST['add']))
    {
        $xml=new DOMDocument("1.0","UTF_8");
        $xml->load('books.xml');
    }
    print($xml->saveXML());
    ?>
    </textarea>

    </center>
<center>
<h2>Thêm book</h2>
    <table style="display:inline-block;"  border="2">
    <form action="them.php" method="POST">
    <tr>
    <td colspan="2" align="center">Thêm book</td>
    <tr>
        <td>Author</td>
        <td><input type="text" name="author"></td>
    </tr>
    <tr>
        <td>Title</td>
        <td><input type="text" name="title"></td>
    </tr>
    <tr>
       <td>Genre</td>
       <td> <input type="text" name="genre"></td>
    </tr>
    <tr>
       <td>Price</td>
       <td><input type="text" name="price"></td>
    </tr>
    <tr>
       <td>Publish_date</td>
       <td> <input type="text" name="publish_date"></td>
    </tr>
    <tr>
       <td>Description</td>
       <td><input type="text" name="description"></td>
    </tr>
<td colspan="3" align="center">
  <input type="submit" name="add" value="Thêm">
   <input type="reset" name="add" value="Nhập lại">
   <button class="button"> <a href="index.php">Bảng danh sách</a> </button>
</td>
    </tr>
    </form>
    </table>
    </center>

