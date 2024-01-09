

<?php

include 'includes/config.php';







function selectBooks($conn, $amount){
    $amount=intval($amount);
    $selectedBooks = $conn->prepare('SELECT * FROM table_books 
    INNER JOIN table_categories ON table_books.Book_category_fk = table_categories.Category_id
    ORDER BY Book_created DESC
     LIMIT :amount');	
    $selectedBooks->bindParam(':amount', $amount, PDO::PARAM_INT);
    $selectedBooks->execute();
    return $selectedBooks;
}


function selectFeaturedBooks($conn, $amount){
    $amount=intval($amount);
    $selectedFeaturedBooks = $conn->prepare('SELECT * FROM table_books 
    INNER JOIN table_categories ON table_books.Book_category_fk = table_categories.Category_id
    WHERE Book_featured = 1
    ORDER BY Book_created DESC
     LIMIT :amount ');	
    $selectedFeaturedBooks->bindParam(':amount', $amount, PDO::PARAM_INT);
    $selectedFeaturedBooks->execute();
    return $selectedFeaturedBooks;
}


function createBook($conn, $title, $description, $author, $illustrator, $language, $pubyear, $numofpages, $price, $cover, $bcategory, $bgenre, $bseries, $bagerecom,  $bpublisher, $featured, $rating){
		
        
		$stmt_insertBook = $conn->prepare("INSERT INTO table_books (Book_title, Book_description, Book_author_fk, Book_illustrator_fk, Book_language_fk, Book_pubyear, Book_numofpages, Book_price, Book_cover, Book_category_fk, Book_genre_fk, Book_series_fk, Book_agerecom_fk, Book_publisher_fk, Book_featured, Book_rating) VALUES (:title, :description, :author, :illustrator, :language, :pubyear, :numofpages, :price, :cover, :bcategory, :bgenre, :bseries, :bagerecom, :bpublisher, :featured, :rating)");
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
		$stmt_insertBook->bindParam(':featured', $featured, PDO::PARAM_INT);
        $stmt_insertBook->bindParam(':rating', $rating, PDO::PARAM_STR);
		
	

		$stmt_insertBook->execute();
		
	}


    function createCategory($conn, $category){
		
		$stmt_insertCategory = $conn->prepare("INSERT INTO table_categories (Category_name) VALUES (:category)");
		$stmt_insertCategory->bindParam(':category', $category, PDO::PARAM_STR);

		$stmt_insertCategory->execute();
		
	}

    function createGenre($conn, $genre){
		
		$stmt_insertGenre = $conn->prepare("INSERT INTO table_genre (Genre_name) VALUES (:genre)");
		$stmt_insertGenre->bindParam(':genre', $genre, PDO::PARAM_STR);

		$stmt_insertGenre->execute();
		
	}

    function createSerie($conn, $serie){
		
		$stmt_insertSerie = $conn->prepare("INSERT INTO table_series (Series_name) VALUES (:serie)");
		$stmt_insertSerie->bindParam(':serie', $serie, PDO::PARAM_STR);

		$stmt_insertSerie->execute();
		
	}

    function createAgerecom($conn, $agerecom){
		
		$stmt_insertAgerecom = $conn->prepare("INSERT INTO table_agerecom (Agerecom_name) VALUES (:agerecom)");
		$stmt_insertAgerecom->bindParam(':agerecom', $agerecom, PDO::PARAM_STR);

		$stmt_insertAgerecom->execute();
		
	}

    function createPublisher($conn, $publisher){
		
		$stmt_insertPublisher = $conn->prepare("INSERT INTO table_publisher (Publisher_name) VALUES (:publisher)");
		$stmt_insertPublisher->bindParam(':publisher', $publisher, PDO::PARAM_STR);

		$stmt_insertPublisher->execute();
		
	}


    function createAuthor($conn, $author){
		
		$stmt_insertAuthor = $conn->prepare("INSERT INTO table_author (Author_name) VALUES (:author)");
		$stmt_insertAuthor->bindParam(':author', $author, PDO::PARAM_STR);

		$stmt_insertAuthor->execute();
		
	}


    function createIllustrator($conn, $illustrator){
		
		$stmt_insertIllustrator = $conn->prepare("INSERT INTO table_illustrator (Illustrator_name) VALUES (:illustrator)");
		$stmt_insertIllustrator->bindParam(':illustrator', $illustrator, PDO::PARAM_STR);

		$stmt_insertIllustrator->execute();
		
	}


    function fetchAuthor($conn){
        $authorFetch = $conn->prepare('SELECT * 
        FROM table_author');
         $authorFetch->execute();
         return $authorFetch;
    
    }

    function fetchIllustrator($conn){
        $illustratorFetch = $conn->prepare('SELECT * 
        FROM table_illustrator');
         $illustratorFetch->execute();
         return $illustratorFetch;
    
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

	



    function updateBook($conn, $title, $agerecomc, $authorc, $illustratorc, $categoryc, $genrec, $seriesc, $languagec, $pubyearc, $publisherc, $numofpagesc, $pricec, $coverc, $id){
		
        $stmt_insertOwner = $conn->prepare("UPDATE table_books  SET Book_title = :title, Book_agerecom_fk = :agerecomc, Book_author_fk = :authorc, Book_illustrator_fk = :illustratorc, Book_category_fk = :categoryc, Book_genre_fk = :genrec, Book_series_fk = :seriesc, Book_language_fk = :languagec, Book_pubyear = :pubyearc, Book_publisher_fk = :publisherc, Book_numofpages = :numofpagesc, Book_price = :pricec, Book_cover = :coverc WHERE Book_id = :bid");
        $stmt_insertOwner->bindParam(':title', $title, PDO::PARAM_STR);
        $stmt_insertOwner->bindParam(':agerecomc', $agerecomc, PDO::PARAM_STR);
        $stmt_insertOwner->bindParam(':authorc', $authorc, PDO::PARAM_STR);
        $stmt_insertOwner->bindParam(':illustratorc', $illustratorc, PDO::PARAM_STR);
        $stmt_insertOwner->bindParam(':categoryc', $categoryc, PDO::PARAM_STR);
        $stmt_insertOwner->bindParam(':genrec', $genrec, PDO::PARAM_STR);
        $stmt_insertOwner->bindParam(':seriesc', $seriesc, PDO::PARAM_STR);
        $stmt_insertOwner->bindParam(':languagec', $languagec, PDO::PARAM_STR);
        $stmt_insertOwner->bindParam(':pubyearc', $pubyearc, PDO::PARAM_INT);
        $stmt_insertOwner->bindParam(':publisherc', $publisherc, PDO::PARAM_STR);
        $stmt_insertOwner->bindParam(':numofpagesc', $numofpagesc, PDO::PARAM_INT);
        $stmt_insertOwner->bindParam(':pricec', $pricec, PDO::PARAM_STR);
        $stmt_insertOwner->bindParam(':coverc', $coverc, PDO::PARAM_STR);
        $stmt_insertOwner->bindParam(':bid', $id, PDO::PARAM_INT);
        $stmt_insertOwner->execute();
        
        $insertedOwnerId = $conn->lastInsertId();
        return $insertedOwnerId;
    }




?>