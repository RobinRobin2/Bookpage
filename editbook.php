<?php
include_once "header.php";
include_once "functions.php";



if(isset($_GET['bookID'])){
    $currentBook = $_GET['bookID'];
	$bookData = selectSingleBook($conn,$currentBook);

	
	}
	
	else {
		$errorMessage = "No car has been chosen.";
	}
	if(isset($_POST['form-submit'])){
		updateBook($conn, $_POST['edittitle'], $_POST['editagerecom'],  $_POST['editauthor'], $_POST['editillustrator'],  $_POST['editcategory'], $_POST['editgenre'], $_POST['editserie'], $_POST['editlanguage'], $_POST['editpubyear'], $_POST['editpublisher'], $_POST['editnumofpages'], $_POST['editprice'], $_FILES['editcover']['name'], $bookData['Book_id']);
	}

?>

<form method="post" action="" enctype="multipart/form-data">
    <label for="edittitel">Titel:</label><br />
	<input type="text" id="edittitel" value="<?php if(isset ($bookData['Book_title'])) {echo $bookData['Book_title'];}?>" name="edittitle" required="required"><br />

    <label for="editdescription">Beskrivning:</label><br />
	<textarea rows="7" cols="35" id="editdescription" name="editdescription" required="required"> <?php if(isset ($bookData['Book_description'])) {echo $bookData['Book_description'];}?></textarea><br />



	<label for="editauthor">Författare:</label><br />
	<select  name="editauthor" id="editauthor">
		
	<?php if(isset ($bookData['Author_name'])){
		echo "<option value='{$bookData['Author_id']}'>Nuvarande: {$bookData['Author_name']}</option>";
	}
	    $allAuthor = fetchAuthor($conn);
	    foreach($allAuthor as $row){
		echo "<option value='{$row['Author_id']}'>{$row['Author_name']}</option>";
	
	        }
		
		?>
</select><br>

<label for="editillustrator">Illustratör:</label><br />
	<select  name="editillustrator" id="editillustrator">
		
	<?php if(isset ($bookData['Illustrator_name'])){
		echo "<option value='{$bookData['Illustrator_id']}'>Nuvarande: {$bookData['Illustrator_name']}</option>";
	}
	    $allIllustrator = fetchIllustrator($conn);
	    foreach($allIllustrator as $row){
		echo "<option value='{$row['Illustrator_id']}'>{$row['Illustrator_name']}</option>";
	
	        }
		
		?>
</select><br>





	<label for="editagerecom">Åldersrekommendation:</label><br />
	<select  name="editagerecom" id="editagerecom">
		
	<?php if(isset ($bookData['Agerecom_name'])){
		echo "<option value='{$bookData['Agerecom_id']}'>Nuvarande: {$bookData['Agerecom_name']}</option>";
	}
	    $allAgerecommendations = fetchAgerecommendations($conn);
	    foreach($allAgerecommendations as $row){
		echo "<option value='{$row['Agerecom_id']}'>{$row['Agerecom_name']}</option>";
	
	        }
		
		?>
	
	</select><br>
	

<label for="editcategory">Kategori:</label><br />
	<select  name="editcategory" id="editcategory">
		
	<?php if(isset ($bookData['Category_name'])){
		echo "<option value='{$bookData['Category_id']}'>Nuvarande: {$bookData['Category_name']}</option>";
	}
	    $allCategories = fetchCategories($conn);
	    foreach($allCategories as $row){
		echo "<option value='{$row['Category_id']}'>{$row['Category_name']}</option>";
	
	        }
		
		?>
</select><br>


<label for="editgenre">Genre:</label><br />
	<select  name="editgenre" id="editgenre">
		
	<?php if(isset ($bookData['Genre_name'])){
		echo "<option value='{$bookData['Genre_id']}'>Nuvarande: {$bookData['Genre_name']}</option>";
	}
	    $allGenres = fetchGenres($conn);
	    foreach($allGenres as $row){
		echo "<option value='{$row['Genre_id']}'>{$row['Genre_name']}</option>";
	
	        }
		
		?>
</select><br>


<label for="editserie">Serie:</label><br />
	<select  name="editserie" id="editserie">
		
	<?php if(isset ($bookData['Series_name'])){
		echo "<option value='{$bookData['Series_id']}'>Nuvarande: {$bookData['Series_name']}</option>";
	}
	    $allSeries = fetchSeries($conn);
	    foreach($allSeries as $row){
		echo "<option value='{$row['Series_id']}'>{$row['Series_name']}</option>";
	
	        }
		
		?>
</select><br>



<label for="editlanguage">Språk:</label><br />
	<select  name="editlanguage" id="editlanguage">
		
	<?php if(isset ($bookData['Language_name'])){
		echo "<option value='{$bookData['Language_id']}'>Nuvarande: {$bookData['Language_name']}</option>";
	}
	    $allLanguages = fetchLanguages($conn);
	    foreach($allLanguages as $row){
		echo "<option value='{$row['Language_id']}'>{$row['Language_name']}</option>";
	
	        }
		
		?>
</select><br>
	
	


	<label for="editpubyear">Utgiven:</label><br />
	<input type="number" id="editpubyear" value="<?php if(isset ($bookData['Book_pubyear'])) {echo $bookData['Book_pubyear'];}?>" name="editpubyear" required="required"><br />





	<label for="editpublisher">Förlag:</label><br />
	<select  name="editpublisher" id="editpublisher">
		
	<?php if(isset ($bookData['Publisher_name'])){
		echo "<option value='{$bookData['Publisher_id']}'>Nuvarande: {$bookData['Publisher_name']}</option>";
	}
	    $allPublisher = fetchPublisher($conn);
	    foreach($allPublisher as $row){
		echo "<option value='{$row['Publisher_id']}'>{$row['Publisher_name']}</option>";
	
	        }
		
		?>
</select><br>




	<label for="editnumofpages">Antal sidor:</label><br />
	<input type="number" id="editnumofpages" value="<?php if(isset ($bookData['Book_numofpages'])) {echo $bookData['Book_numofpages'];}?>" name="editnumofpages" required="required"><br />


	<label for="editprice">Pris:</label><br />
	<input type="text" id="editprice" value="<?php if(isset ($bookData['Book_price'])) {echo $bookData['Book_price'];}?>" name="editprice" required="required"><br />
	
	
	<label for="editrating">Betygsättning:</label><br />
	<input type="text" id="editrating" value="<?php if(isset ($bookData['Book_rating'])) {echo $bookData['Book_rating'];}?>" name="editrating" required="required"><br />


	<label for="editcover">Pärmblad:</label><br />
	<input type="file" name="editcover" id="editcover" value="<?php if(isset ($bookData['Book_cover'] )) {echo $bookData['Book_cover'];}?>"><br>
	

	<input type="submit" name="form-submit" value="Skicka">

</form>

