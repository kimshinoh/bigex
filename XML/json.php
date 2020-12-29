<h4><a href="doc.php">Về danh sách</a></h4> </br>
<?php
  $doc = new DOMDocument ();
  $doc->load ( 'sach.xml' );
  
  $catalogs = $doc->getElementsByTagName ( "book" );
  foreach ( $catalogs as $book ) {
   $authors = $book->getElementsByTagName ( "author" );
   $author = $authors->item ( 0 )->nodeValue;
    
   $titles = $book->getElementsByTagName ( "title" );
   $title = $titles->item ( 0 )->nodeValue;
  
   $genres = $book->getElementsByTagName ( "genre" );
   $genre = $genres->item ( 0 )->nodeValue; 
      
   $prices = $book->getElementsByTagName ( "price" );
   $price = $prices->item ( 0 )->nodeValue; 

   $publish_dates = $book->getElementsByTagName ( "publish_date" );
   $publish_date = $publish_dates->item ( 0 )->nodeValue;
      
   $descriptions = $book->getElementsByTagName ( "description" );
   $description = $descriptions->item ( 0 )->nodeValue;
  $array = array(
    "author" => "$author",
    "title" => "$title",
    "genre" => "$genre",  
    "price" => "$price", 
    "publish_date" => "$publish_date" ,
    "description" => "$description" 
  );
  
  echo json_encode($array);// in ra mảng dữ liệu dạng json
  }
?>
<?php
//viet ra json
    $xml = simplexml_load_file("sach.xml");
	$fp = fopen('sach.json', 'w');
	fwrite($fp, json_encode($xml,JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT));
	fclose($fp);
	echo "Chuyển đổi từ XML sang JSON thành công!!!!";
?>
