<?php
	include_once "includes/config.php";
  include_once "includes/class.user.php";
	?>
<!DOCTYPE html>
<html>
<head>
<title>Bookpage</title> <!-- Titel som syns uppe i "tabben" -->
<link rel="stylesheet" href="css/styles.css"> <!-- Länka in CSS-filen -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@300;400&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link href="fontawesome/css/all.css" rel="stylesheet"> <!--load all styles -->
<meta charset="UTF-8"> <!-- Välj teckenuppsättning som innehåller ÅÄÖ -->
<meta name="viewport" content="width=device-width, initial-scale=1.0"><!-- välj viewport för responsivitet i olika skärmar -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="script.js"></script> 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</head>
<body>



<nav class="navbar navbar-expand-lg navbar-light" id="test0">
  <a class="navbar-brand mx-5" href="index.php">Bokhandel AB</a>
  

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse justify-content-end mx-5" id="navbarNav">
    <ul class="navbar-nav">

    <li class="nav-item">
        <a class="nav-link" href="adminlogin.php">Logga in</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Hem <span class="sr-only"></span></a>
      </li>
      <li class="nav-item" id="test2">
        <a class="nav-link" href="#">Böcker</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Om oss</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Kontakt</a>
      </li>
   
    </ul>
  </div>
</nav>



  
</div>
<div class="clear"></div>
<div class="main-wrapper container-fluid">