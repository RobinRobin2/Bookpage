

<?php

function createBook($conn, $title, $description, $author, $illustrator, $language, $pubyear, $numofpages, $price, $cover, $bcategory, $bgenre, $bseries, $bagerecom,  $bpublisher, $status){
		
		$stmt_insertBook = $conn->prepare("INSERT INTO table_books (Book_title, Book_description, Book_author_fk, Book_illustrator_fk, Book_language_fk, Book_pubyear, Book_numofpages, Book_price, Book_cover, Book_category_fk, Book_genre_fk, Book_series_fk, Book_agerecom_fk, Book_publisher_fk, Book_status_fk) VALUES (:title, :description, :author, :illustrator, :language, :pubyear, :numofpages, :price, :cover, :bcategory, :bgenre, :bseries, :bagerecom, :bpublisher, :status)");
		$stmt_insertBook->bindParam(':title', $title, PDO::PARAM_STR);
		$stmt_insertBook->bindParam(':description', $description, PDO::PARAM_STR);
		$stmt_insertBook->bindParam(':author', $author, PDO::PARAM_STR);
		$stmt_insertBook->bindParam(':illustrator', $illustrator, PDO::PARAM_STR);
		$stmt_insertBook->bindParam(':language', $language, PDO::PARAM_STR);
		$stmt_insertBook->bindParam(':pubyear', $pubyear, PDO::PARAM_STR);
		$stmt_insertBook->bindParam(':numofpages', $numofpages, PDO::PARAM_STR);
		$stmt_insertBook->bindParam(':price', $price, PDO::PARAM_STR);
		$stmt_insertBook->bindParam(':cover', $cover, PDO::PARAM_STR);
		$stmt_insertBook->bindParam(':bcategory', $bcategory, PDO::PARAM_STR);
		$stmt_insertBook->bindParam(':bgenre', $bgenre, PDO::PARAM_STR);
		$stmt_insertBook->bindParam(':bseries', $bseries, PDO::PARAM_STR);
		$stmt_insertBook->bindParam(':bagerecom', $bagerecom, PDO::PARAM_STR);
        $stmt_insertBook->bindParam(':bpublisher', $bpublisher, PDO::PARAM_STR);
		$stmt_insertBook->bindParam(':status', $status, PDO::PARAM_STR);
		
	

		$stmt_insertBook->execute();
		
	}


    function createCategory($conn, $category){
		
		$stmt_insertCategory = $conn->prepare("INSERT INTO table_categories (Category_name) VALUES (:category)");
		$stmt_insertCategory->bindParam(':category', $category, PDO::PARAM_STR);

		$stmt_insertCategory->execute();
		
	}



    function fetchAgerecommendations($conn){
        $agerecommendationFetch = $conn->prepare('SELECT * 
        FROM table_agerecom');
         $agerecommendationFetch->execute();
         return $agerecommendationFetch;
    
    }

    function fetchCategories($conn){
        $categoryFetch = $conn->prepare('SELECT * 
        FROM table_categories');
         $categoryFetch->execute();
         return $categoryFetch;
    
    }

    function fetchGenres($conn){
        $genreFetch = $conn->prepare('SELECT * 
        FROM table_genre');
         $genreFetch->execute();
         return $genreFetch;
    
    }

    function fetchSeries($conn){
        $serieFetch = $conn->prepare('SELECT * 
        FROM table_series');
         $serieFetch->execute();
         return $serieFetch;
    
    }

    function fetchLanguages($conn){
        $languageFetch = $conn->prepare('SELECT * 
        FROM table_language');
         $languageFetch->execute();
         return $languageFetch;
    
    }

    function fetchPublisher($conn){
        $publisherFetch = $conn->prepare('SELECT * 
        FROM table_publisher');
         $publisherFetch->execute();
         return $publisherFetch;
    
    }



    function selectSingleBook($conn, $id){
        $selectedSingleBook = $conn->prepare('SELECT * 
        FROM table_books 
        INNER JOIN table_categories ON table_books.Book_category_fk = table_categories.Category_id 
        INNER JOIN table_publisher ON table_books.Book_publisher_fk = table_publisher.Publisher_id
        INNER JOIN table_author ON table_books.Book_author_fk = table_author.Author_id
        INNER JOIN table_illustrator ON table_books.Book_illustrator_fk = table_illustrator.Illustrator_id
        INNER JOIN table_language ON table_books.Book_language_fk = table_language.Language_id
        INNER JOIN table_genre ON table_books.Book_genre_fk = table_genre.Genre_id
        INNER JOIN table_series ON table_books.Book_Series_fk = table_series.Series_id
        INNER JOIN table_agerecom ON table_books.Book_agerecom_fk = table_agerecom.Agerecom_id
        WHERE table_books.Book_id = :id');	

        $selectedSingleBook->bindParam(':id', $id, PDO::PARAM_INT);
        $selectedSingleBook->execute();
        $bookData = $selectedSingleBook->fetch();
        return $bookData;
    }

?>