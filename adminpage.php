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
      if(isset($_POST['featuredcheck'])){
        $isFeatured = 1;
      }
      else {
        $isFeatured = 0;
      }
		createBook($conn, $_POST['titel'], $_POST['description'], $_POST['author'], $_POST['illustrator'],$_POST['language'],$_POST['pubyear'],$_POST['numofpages'],$_POST['price'],$_FILES['cover']['name'],$_POST['bcategory'],$_POST['bgenre'],$_POST['bseries'], $_POST['bagerecom'],$_POST['bpublisher'], $isFeatured, $_POST['brating']);

	}

    if(isset($_POST['category-submit'])){
		createCategory($conn, $_POST['category']);

	}

    if(isset($_POST['genre-submit'])){
		createGenre($conn, $_POST['genre']);

	}

    if(isset($_POST['serie-submit'])){
		createSerie($conn, $_POST['serie']);

	}

    if(isset($_POST['agerecom-submit'])){
		createAgerecom($conn, $_POST['agerecom']);

	}
    if(isset($_POST['publisher-submit'])){
		createPublisher($conn, $_POST['publisher']);

	}

  if(isset($_POST['bauthor-submit'])){
		createAuthor($conn, $_POST['bauthor']);

	}

  if(isset($_POST['billustrator-submit'])){
		createIllustrator($conn, $_POST['billustrator']);

	}

    $searchErr = '';
    $book_details='';
    if(isset($_POST['save']))
    {
        if(!empty($_POST['search']))
        {
            $search = $_POST['search'];
            $stmt = $conn->prepare("select * from table_books where Book_title like '%$search%'");
            $stmt->execute();
            $book_details = $stmt->fetchAll(PDO::FETCH_ASSOC);
            //print_r($employee_details);
            
        }
        else
        {
            $searchErr = "Please enter the information";
        }
       
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
	    <textarea rows="7" cols="35" id="description" placeholder="" name="description" required="required"></textarea><br />

	 

      <label for="author">Författare:</label><br>
      <select name="author" id="author">
      <?php
	    $allAuthor = fetchAuthor($conn);
	    foreach($allAuthor as $row){
		echo "<option value='{$row['Author_id']}'>{$row['Author_name']}</option>";
	        }
		?>
    
    </select><br>



      
    <label for="illustrator">Illustrator:</label><br>
      <select name="illustrator" id="illustrator">
      <?php
	    $allIllustrator = fetchIllustrator($conn);
	    foreach($allIllustrator as $row){
		echo "<option value='{$row['Illustrator_id']}'>{$row['Illustrator_name']}</option>";
	        }
		?>
    
    </select><br>


 

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
	<input type="number" id="pubyear" placeholder="" name="pubyear" required="required"><br />


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
	<input type="text" id="price" placeholder="" name="price" required="required"><br />

  <label for="brating">Betygsättning:</label><br />
	<input type="text" id="brating" placeholder="" name="brating" required="required"><br />

  <input type="checkbox" id="featuredcheck" name="featuredcheck" value="1" >
  <label for="featuredcheck">Featured</label><br>

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
             <form method="post" action="" enctype="multipart/form-data">
             <h3>Skapa genre</h3>
             <label for="genre">Namn:</label><br />
	        <input type="text" id="genre" placeholder="" name="genre" required="required"><br />
            <input type="submit" name="genre-submit" value="Skicka">
        </form>
        <form method="post" action="" enctype="multipart/form-data">
             <h3>Skapa serie</h3>
             <label for="serie">Namn:</label><br />
	        <input type="text" id="serie" placeholder="" name="serie" required="required"><br />
            <input type="submit" name="serie-submit" value="Skicka">
        </form>
        <form method="post" action="" enctype="multipart/form-data">
             <h3>Skapa Åldersrekommendation</h3>
             <label for="agerecom">Rekommendation:</label><br />
	        <input type="text" id="agerecom" placeholder="" name="agerecom" required="required"><br />
            <input type="submit" name="agerecom-submit" value="Skicka">
        </form>
        <form method="post" action="" enctype="multipart/form-data">
             <h3>Skapa Förlag</h3>
             <label for="publisher">Namn:</label><br />
	        <input type="text" id="publisher" placeholder="" name="publisher" required="required"><br />
            <input type="submit" name="publisher-submit" value="Skicka">
        </form>

        <form method="post" action="" enctype="multipart/form-data">
             <h3>Skapa Författare</h3>
             <label for="bauthor">Namn:</label><br />
	        <input type="text" id="bauthor" placeholder="" name="bauthor" required="required"><br />
            <input type="submit" name="bauthor-submit" value="Skicka">
        </form>

        <form method="post" action="" enctype="multipart/form-data">
             <h3>Skapa Illustratör</h3>
             <label for="billustrator">Namn:</label><br />
	        <input type="text" id="billustrator" placeholder="" name="billustrator" required="required"><br />
            <input type="submit" name="billustrator-submit" value="Skicka">
        </form>

        </div>
     </div>
</div>

<form class="form-horizontal" action="#" method="post">
	<div class="row">
		<div class="form-group">
		    <label class="control-label col-sm-4" for="email"><b>Sök en bok:</b>:</label>
		    <div class="col-sm-4">
		      <input type="text" class="form-control" name="search" placeholder="search here">
		    </div>
		    <div class="col-sm-2">
		      <button type="submit" name="save" class="btn btn-success btn-sm">Submit</button>
		    </div>
		</div>
		<div class="form-group">
			<span class="error" style="color:red;">* <?php echo $searchErr;?></span>
		</div>
		
	</div>
    </form>

    <?php
		    	 if(!$book_details)
		    	 {
		    		echo '<tr>No data found</tr>';
		    	 }
		    	 else{
		    	 	foreach($book_details as $key=>$value)
		    	 	{
		    	 		?>
		    	 	<tr>
		    	 		<td><?php echo $key+1;?></td>
		    	 		<td><?php echo $value['Book_title'];?></td>

                        <a href="editbook.php?bookID=<?php echo $value['Book_id'];?>" type='button'>Redigera book</a>
		    	 	</tr>
                    
		    	 		<?php
                    }
                }
                ?>

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
