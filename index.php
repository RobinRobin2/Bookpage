

<?php

	include "header.php"; 
	include_once "functions.php";

?>





<body>
<!-- Hero 1 - Bootstrap Brain Component -->
	<section class="bg-image d-flex justify-content-center align-items-center"  style="background-image: url('img/bookcover1.jpg'); width: auto; height: 450px;">
  		<div class="container" >
    		<div class="row justify-content-md-center">
      			<div class="col-12 col-md-11 col-lg-9 col-xl-7 col-xxl-6 text-center text-black">
      				<div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
			  		<input id="search" type="search"  class="form-control"  placeholder="sök en bok"/>
					</div>
					<span id="result"></span>
				</div>
			</div>
		</div>
	</section>	






<section class="my-5">
<h2 id="popular-categories">Populära kategorier</h2>

<div class="row my-5 mx-5">
  <div class="col-sm-3">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Deckare</h5>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        <a href="#" class="btn btn-primary">Läs mer</a>
      </div>
    </div>
  </div>
</div>

</section>






<h2 id="new-books">Nya böcker</h2>
<div class="row">
<?php

$selectedBooks = selectBooks($conn, 4);

$queryResult = $conn->prepare("SELECT * FROM table_books WHERE Book_title");

$queryResult->execute();
foreach ($selectedBooks as $row){

echo "


<div class='card my-5' style='width: 18rem;'>
  <img class='card-img-top' src='uploads/{$row['Book_cover']}' alt='Card image cap'>
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


</div>";
}
?>
</div>






<h2 id="featured-books">Featured books</h2>
<div class="row">
<?php

$selectedFeaturedBooks = selectFeaturedBooks($conn, 4);

$queryResult = $conn->prepare("SELECT * FROM table_books WHERE Book_title");

$queryResult->execute();
foreach ($selectedFeaturedBooks as $row){

echo "


<div class='card my-5' style='width: 18rem;'>
  <img class='card-img-top' src='uploads/{$row['Book_cover']}' alt='Card image cap'>
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


</div>";
}
?>
</div>



<section class="my-5">
	<div class="row mx-5 py-5">
		<div class="col-sm-6">
		<img src="img/bookcover2.jpg"  width="500" height="400">
		</div>
		<div class="col-sm-6">
		<h3>Vem är vi?</h3>
		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce interdum felis in nisi aliquam, eu eleifend eros tempus. Quisque scelerisque massa nunc, vel tempus lectus vestibulum sed. Praesent ultricies ex sed quam tristique, et posuere quam placerat. Duis ornare ipsum nec risus consectetur feugiat. Vivamus dapibus aliquet dolor, ut elementum nisi laoreet eu.</p>
		</div>
	</div>

</section>


<section class="my-5">
	
	<div class="row mx-5 py-5">
		<div class="col-sm-6">
		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce interdum felis in nisi aliquam, eu eleifend eros tempus. Quisque scelerisque massa nunc, vel tempus lectus vestibulum sed. Praesent ultricies ex sed quam tristique, et posuere quam placerat. Duis ornare ipsum nec risus consectetur feugiat. Vivamus dapibus aliquet dolor, ut elementum nisi laoreet eu.</p>
		</div>
		<div class="col-sm-6">
		<img src="img/bookcover2.jpg"  width="500" height="400">
		</div>
	</div>

</section>


<?php

	include "footer.php"; 
?>

</body>



