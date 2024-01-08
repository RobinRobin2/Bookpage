<?php

	include_once "header.php"; 
    include_once "functions.php"; 
    $errorMessage ="";
if(isset($_GET['bookID'])){
$currentBook = $_GET['bookID'];
$bookData = selectSingleBook($conn,$currentBook);
}
else {
    $errorMessage = "No car has been chosen.";
}

?>


<div class="container">
    <div class="row">
        
        <div class="col" style="text-align:center;"><img style='height: 300px; width: 300px;'src="uploads/<?php echo $bookData['Book_cover'];?> ">
        <h2><?php echo "{$bookData['Book_title']} ";?> </h2>
      <p><?php echo "  {$bookData['Book_description']}";?><p>
      <p>Författare:<?php echo "  {$bookData['Author_name']}";?><p>
      <p>Kategori:<?php echo "  {$bookData['Category_name']}";?><p>
      <p>Förlag:<?php echo "  {$bookData['Publisher_name']}";?><p>
      <p>Illustratör:<?php echo "  {$bookData['Illustrator_name']}";?><p>
      <p>Språk:<?php echo "  {$bookData['Language_name']}";?><p>
      <p>Utgiven:<?php echo "  {$bookData['Book_pubyear']}";?><p>
      <p>Antal sidor:<?php echo "  {$bookData['Book_numofpages']}";?><p>
      <p>Pris:<?php echo "  {$bookData['Book_price']}";?><p>
      <p>Genre:<?php echo "  {$bookData['Genre_name']}";?><p>
      <p>Serie:<?php echo "  {$bookData['Series_name']}";?><p>
      <p>Åldersrekommendation:<?php echo "  {$bookData['Agerecom_name']}";?><p>
      <p>Betygsättning:<?php echo "  {$bookData['Book_rating']}";?><p>


      </div>
    </div>

</div>







<?php

	include_once "footer.php"; 

?>





