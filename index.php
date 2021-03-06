<?php
	
	require('lib/autobahn.php');

	define('AUTOBAHN_DB_CONFIG', AUTOBAHN_ROOT.'db_config.php');

	$library = Autobahn::getConnection('default');

	//	Classic SQL
	$authors = $library->query('SELECT Author.*, Book.* FROM authors Author, books Book WHERE Book.author_id = Author.id');
	
	//	Find (like Select)
	$book = $library->findBooksById(1);
	$books = $library->findAllBooks();
	$favorite_books = $library->findAllBooksById(1,2,3,4,5);

	//	Insert
	$newBook = array('id' => null, 'author_id' => 1, 'title' => 'Frameworks for languages');
	$library->insertBooks($newBook);

	//	Update
	$values = array('title' => 'Frameworks for PHP 5', 'description' => '...');
	$conditions = array('id' => 1);
	$library->updateBooks($values, $conditions);
	
	//	Delete
	$library->deleteBooksById(99);

	//	Show stats of all queries :) ... only for CLI mode
	$library->showLogs();

?>
