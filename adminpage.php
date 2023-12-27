<?php

	include_once "header.php"; 
    include_once "functions.php"; 
    include "includes/fileupload.php";
    if($user->checkLoginStatus()){
        if(!$user->checkUserRole(10)){
            $user->redirect("index.php");
        }
    }
    
    else{
        $user->redirect("adminpage.php");
    }
    
    if(isset($_POST['form-submit'])){
		createBook($conn, $_POST['titel'], $_POST['description'], $_POST['author'], $_POST['illustrator'],$_POST['language'],$_POST['pubyear'],$_POST['numofpages'],$_POST['price'],$_FILES['cover']['name'],$_POST['bcategory'],$_POST['bgenre'],$_POST['bseries'], $_POST['bagerecom'],$_POST['bpublisher'], 1);

	}

    if(isset($_POST['category-submit'])){
		createCategory($conn, $_POST['category']);

	}
//check if form has been sent
if(isset($_POST['submit_register'])){
    //Function returns success or error message that is saved in $checkReturn.
    $checkReturn = $user->register();
    
    //If all checks are passed, run register-fuction
    if($checkReturn == "success"){
        $registerResult = $user->register();
        echo "<p class='bg-info text-white text-center'>{$registerResult} <a href='index.php'>Log in</a></p></p>";
    }
    //If something does not meet requirements, echo out what went wrong.
    else {
        echo "<p class='text-white bg-danger text-center'>{$checkReturn}";
    }
}
 
?>

<div class="container">
    <div class="row">
        <div class="col-6">
        <form method="post" action="" enctype="multipart/form-data">
	    <h3>Skapa bok</h3>
	    <label for="titel">Titel:</label><br />
	    <input type="text" id="titel" placeholder="" name="titel" required="required"><br />
	    <label for="description">Beskrivning:</label><br />
	    <input type="text" id="description" placeholder="" name="description" required="required"><br />
	    <label for="author">Författare:</label><br />
	    <input type="text" id="author" placeholder="" name="author" required="required"><br />	
	    <label for="illustrator">Illustratör:</label><br />
	    <input type="text" id="illustrator" placeholder="" name="illustrator" required="required"><br />


 



    <label for="bagerecom">Åldersrekommendation</label><br>
      <select name="bagerecom" id="bagerecom">
      <?php
	    $allAgerecommendations = fetchAgerecommendations($conn);
	    foreach($allAgerecommendations as $row){
		echo "<option value='{$row['Agerecom_id']}'>{$row['Agerecom_name']}</option>";
	        }
		?>
    
    </select><br>





    <label for="bcategory">Kategori</label><br>
      <select name="bcategory" id="lang">
      <?php
	    $allCategories = fetchCategories($conn);
	    foreach($allCategories as $row){
		echo "<option value='{$row['Category_id']}'>{$row['Category_name']}</option>";
	        }
		?>
    
    </select><br>


    <label for="bgenre">Genre</label><br>
      <select name="bgenre" id="bgenre">
      <?php
	    $allGenres = fetchGenres($conn);
	    foreach($allGenres as $row){
		echo "<option value='{$row['Genre_id']}'>{$row['Genre_name']}</option>";
	        }
		?>
    
    </select><br>


    <label for="bseries">Serie</label><br>
      <select name="bseries" id="bseries">
      <?php
	    $allSeries = fetchSeries($conn);
	    foreach($allSeries as $row){
		echo "<option value='{$row['Series_id']}'>{$row['Series_name']}</option>";
	        }
		?>
    
    </select><br>


 
    <label for="language">Språk</label><br>
      <select name="language" id="language">
      <?php
	    $allLanguages = fetchlanguages($conn);
	    foreach($allLanguages as $row){
		echo "<option value='{$row['Language_id']}'>{$row['Language_name']}</option>";
	        }
		?>
    
    </select><br>


    <label for="pubyear">Utgivningsår:</label><br />
	<input type="date" id="pubyear" placeholder="" name="pubyear" required="required"><br />

    <label for="bpublisher">Förlag</label><br>
      <select name="bpublisher" id="bpublisher">
      <?php
	    $allPublisher = fetchPublisher($conn);
	    foreach($allPublisher as $row){
		echo "<option value='{$row['Publisher_id']}'>{$row['Publisher_name']}</option>";
	        }
		?>
    
    </select><br>



    <label for="numofpages">Antal sidor:</label><br />
	<input type="number" id="numofpages" placeholder="" name="numofpages" required="required"><br />

    <label for="price">Pris:</label><br />
	<input type="number" id="price" placeholder="" name="price" required="required"><br />

    <label for="cover">Pärmblad:</label><br />
	<input type="file" name="cover" id="cover"><br>

    <input type="submit" name="form-submit" value="Skicka">

</form>
        </div>
        <div class="col-6">
            <form method="post" action="" enctype="multipart/form-data">
            <h3>Skapa kategori</h3>
            <label for="category">Namn:</label><br />
	        <input type="text" id="category" placeholder="" name="category" required="required"><br />
            <input type="submit" name="category-submit" value="Skicka">
             </form>
        </div>
     </div>
</div>

<div id="content">
	<div class="content-inner">
		<div class="wrapper fadeInDown">
			<div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
				<div class="fadeIn first">
				  <i class="fas fa-house-user login-icon"></i>
				  <h2>Skapa admin</h2>
				</div>

				<!-- Login Form -->
				<form method="POST">
				  <input type="text" id="username" class="fadeIn second" name="username" placeholder="User name or e-mail">
				  <input type="password" id="password" class="fadeIn third" name="password" placeholder="Password">
				  <input type="submit" name="submit_register" class="fadeIn fourth" value="skapa">
				</form>

				<!-- Remind Passowrd -->
				

			</div>
		</div>
	</div>
</div>
