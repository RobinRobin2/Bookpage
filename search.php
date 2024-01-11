

<style>
#searchlink:link {
  color: black;
  background-color: transparent;
  text-decoration: none;
  font-size: 20px;

}

#searchlink:visited {
  color: black;
  background-color: transparent;
  text-decoration: none;
}

#searchlink:hover {
  color: blue;
  background-color: transparent;
  text-decoration: underline;
}

</style>


<?php
include 'includes/config.php';


if(isset($_POST['search'])){
	
	$search = $_POST['search'];
	$search = "%$search%";
	
	
	if(strlen($search) > 3) {
		
		$sql = "SELECT * FROM table_books WHERE Book_title LIKE :s ";
		
		$stmt = $conn->prepare($sql);
		$stmt->bindParam('s',$search);
		$stmt->execute();

		while($row = $stmt->fetch()){
			$Book_title = $row['Book_title'];
            $Book_id = $row['Book_id'];
			
			
			      echo"<a href='singlebook.php?bookID=$Book_id' id='searchlink'>$Book_title</a>";
		}

        
	}
	
}

?>