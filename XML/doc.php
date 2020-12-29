<a href="them.php"> Thêm Sách </a> </br>
<a href="json.php">Xuất sang dạng JSON</a>
<div class="bang" style="margin-left: 50px;"  >  
	<div style="margin-left: 20px;margin-right: 20px;";  class="col-lg-12 col-md-12 col-xs-12">
	<h3 style="margin-left: 420px;margin-bottom: 20px;"  > Catelogy </h3>
<table  style="margin-left: 330px;height: 100px;width: 400px;">
       
     <thread >
       <tr style=" border:1px solid black";>
            <th style=" border:1px solid black; width: 100px"> Author</th>
            <th style=" border:1px solid black; width: 100px"> Title </th>
            <th style=" border:1px solid black; width: 100px">Genre</th>
           <th style=" border:1px solid black; width: 100px">Price</th>  
           <th style=" border:1px solid black; width: 100px">Publish Date</th>  
           <th style=" border:1px solid black; width: 100px">Description</th>  
       </tr>
     </thread>
    <tbody>
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
       echo "<tr>     
                <td style=' border:1px solid black';>".$author."</td>
                <td style=' border:1px solid black';>".$title."</td>
                <td style=' border:1px solid black';>".$genre."</td>  
                <td style=' border:1px solid black';>".$price."</td>   
                <td style=' border:1px solid black';>".$publish_date."</td> 
                <td style=' border:1px solid black';>".$description."</td> 
        </tr>";   
}
      ?>   
      </tbody>  
    
</table>
     </div>
</div>
