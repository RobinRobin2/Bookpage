<?php
include_once "header.php";
include_once "functions.php";
?>



<h2 id="new-books">Våra böcker</h2>
	<div class="row my-5 mx-5">
  		
<?php

$selectedBooks = selectBooks($conn, 20);

$queryResult = $conn->prepare("SELECT * FROM table_books WHERE Book_title");

$queryResult->execute();
foreach ($selectedBooks as $row){

echo "

<div class='col-sm-3'>
<div class='card my-5' style='width: 12rem;'>
  <img class='card-img-top' src='uploads/{$row['Book_cover']}' style='border: 5px solid #807e74;' alt='Card image cap'>
  <div class='card-body'>
    <h5>{$row['Book_title']}</h5>
 
  </div>
  <ul class='list-group list-group-flush'>
    <li class='list-group-item'>Pris: {$row['Book_price']}</li>
	<li class='list-group-item'>Betygsättning: {$row['Book_rating']}</li>
  </ul>
  
  <div class='card-body'>
    <a href='singlebook.php?bookID={$row['Book_id']}' '>Läs mer</a><br>
  </div>



</div>
</div>";

}
?>
</div>








<?php
include_once "footer.php";
?>