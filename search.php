

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
			$Book_price = $row['Book_price'];
            $Book_id = $row['Book_id'];
			
			echo"<div>$Book_title $Book_price </div> ";
			      echo"<a href='singlebook.php?bookID=$Book_id'> visa</a>";
		}

        
	}
	
}

?>