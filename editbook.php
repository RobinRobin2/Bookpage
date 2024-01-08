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
		updateBook($conn, $_POST['edittitle'], $_POST['editagerecom'],  $_POST['editauthor'], $_POST['editillustrator'],  $_POST['editcategory'], $_POST['editgenre'], $bookData['Book_id']);
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
	


	
	</select><br>
	<label for="editrating">Betygsättning:</label><br />
	<input type="text" id="editrating" value="<?php if(isset ($bookData['Book_rating'])) {echo $bookData['Book_rating'];}?>" name="editrating" required="required"><br />

	<input type="submit" name="form-submit" value="Skicka">

</form>

