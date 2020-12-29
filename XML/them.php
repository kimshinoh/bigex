<?php
$name1="";
$age1="";
$salary1="";
if(isset($_POST['them'])){
if(isset($_POST["author"])) { $author1 = $_POST['author']; }
if(isset($_POST["title"])) { $title1 = $_POST['title']; }
if(isset($_POST["genre"])) { $genre1 = $_POST['genre'];}
if(isset($_POST["price"])) { $price1 = $_POST['price'];}
if(isset($_POST["publish_date"])) { $publish_date1 = $_POST['publish_date'];}
if(isset($_POST["description"])) { $description1 = $_POST['description'];}
$doc = new DOMDocument ();
$doc->load ( 'sach.xml' );

$newNode = $doc->createElement('book');

$author = $newNode->appendChild($doc->createElement("author"));
$author->appendChild($doc->createTextNode("$author1"));

$title = $newNode->appendChild($doc->createElement('title'));
$title->appendChild($doc->createTextNode("$title1"));

$genre = $newNode->appendChild($doc->createElement('genre'));
$genre->appendChild($doc->createTextNode($genre1));

$price = $newNode->appendChild($doc->createElement('price'));
$price->appendChild($doc->createTextNode($price1));

$publish_date = $newNode->appendChild($doc->createElement('publish_date'));
$publish_date->appendChild($doc->createTextNode($publish_date1));

$description = $newNode->appendChild($doc->createElement('description'));
$description->appendChild($doc->createTextNode($description1));

$node = $doc->importNode($newNode, true);
$doc->documentElement->appendChild($node);

$doc->save("sach.xml");
    header('location:doc.php');
}
?>
<a href="doc.php">Về danh sách</a>
<form style="margin-left: 15%" action="" method="POST">
  <table width="600" border="1"> 
      <tr>
    <td colspan="2" style="text-align:center;font-size:25px;">Thêm  sách</td>
  </tr>
    <tr>
        <td>Author</td>
        <td><input name="author" type="text" ></td>
    </tr>
    <tr>
        <td>Title</td>
        <td><input  name="title" type="text"></td>
    </tr>
    <tr>
        <td>Genre</td>
        <td><input name="genre" type="text"></td>
    </tr>
      <tr>
        <td>Price</td>
        <td><input name="price" type="text"></td>
    </tr>
      <tr>
        <td>Publish Date</td>
        <td><input name="publish_date" type="text"></td>
    </tr>
      <tr>
        <td>Description</td>
        <td><input name="description" type="text"></td>
    </tr>
      <tr>
    <td colspan="2"><div align="center">
      <input type="submit" name="them" value="Add book">
    </div></td>
  </tr>
  </table> 
</form>