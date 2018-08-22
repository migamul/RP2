<?php

// Manualno inicijaliziramo bazu ako već nije.
require_once 'db.class.php';

$db = DB::getConnection();
/*
try
{
	$st = $db->prepare(
		'CREATE TABLE IF NOT EXISTS llSentence (' .
		'id_sentence int NOT NULL PRIMARY KEY AUTO_INCREMENT,' .
		'eng varchar(50) NOT NULL,' .
		'spa varchar(50) NOT NULL,' .
		'missing INT NOT NULL,' .
		'option1 varchar(255) NOT NULL,' .
		'option2 varchar(255) NOT NULL,' .
		'option3 varchar(255) NOT NULL,' .
		'option4 varchar(255) NOT NULL,' .
	  'correct INT NOT NULL)'
	);

	$st->execute();
}
catch( PDOException $e ) { exit( "PDO error #1: " . $e->getMessage() ); }

echo "Napravio tablicu users.<br />";
*/

try
{
	$st = $db->prepare(
		'CREATE TABLE IF NOT EXISTS llLessons (' .
		'id_lesson int NOT NULL PRIMARY KEY AUTO_INCREMENT,' .
		'title varchar(50) NOT NULL,' .
		'link  varchar(50) NOT NULL,' .
		'image varchar(50) NOT NULL,' .
		'image_locked varchar(50) NOT NULL)'
	);

	$st->execute();
}
catch( PDOException $e ) { exit( "PDO error #1: " . $e->getMessage() ); }

echo "Napravio tablicu llLessons.<br />";


/*
try
{
	$st = $db->prepare(
		'CREATE TABLE IF NOT EXISTS books (' .
		'id int NOT NULL PRIMARY KEY AUTO_INCREMENT,' .
		'author varchar(50) NOT NULL,' .
		'title varchar(50) NOT NULL)'
	);

	$st->execute();
}
catch( PDOException $e ) { exit( "PDO error #2: " . $e->getMessage() ); }

echo "Napravio tablicu books.<br />";


try
{
	$st = $db->prepare(
		'CREATE TABLE IF NOT EXISTS loans (' .
		'id int NOT NULL PRIMARY KEY AUTO_INCREMENT,' .
		'id_user INT NOT NULL,' .
		'id_book INT NOT NULL,' .
		'lease_end DATE NOT NULL)'
	);

	$st->execute();
}
catch( PDOException $e ) { exit( "PDO error #3: " . $e->getMessage() ); }

echo "Napravio tablicu loans.<br />";


// Ubaci neke korisnike unutra
try
{
	$st = $db->prepare( 'INSERT INTO users(name, surname, password) VALUES (:name, :surname, :password)' );

	$st->execute( array( 'name' => 'Pero', 'surname' => 'Perić', 'password' => password_hash( 'perinasifra', PASSWORD_DEFAULT ) ) );
	$st->execute( array( 'name' => 'Mirko', 'surname' => 'Mirić', 'password' => password_hash( 'mirkovasifra', PASSWORD_DEFAULT ) ) );
	$st->execute( array( 'name' => 'Slavko', 'surname' => 'Slavić', 'password' => password_hash( 'slavkovasifra', PASSWORD_DEFAULT ) ) );
	$st->execute( array( 'name' => 'Ana', 'surname' => 'Anić', 'password' => password_hash( 'aninasifra', PASSWORD_DEFAULT ) ) );
	$st->execute( array( 'name' => 'Maja', 'surname' => 'Majić', 'password' => password_hash( 'majinasifra', PASSWORD_DEFAULT ) ) );
}
catch( PDOException $e ) { exit( "PDO error #4: " . $e->getMessage() ); }

echo "Ubacio korisnike u tablicu users.<br />";


// Ubaci neke knjige unutra
try
{
	$st = $db->prepare( 'INSERT INTO books(author, title) VALUES (:author, :title)' );

	$st->execute( array( 'author' => 'Clarke, Arthur C.', 'title' => 'Rendezvous with Rama' ) );
	$st->execute( array( 'author' => 'Clarke, Arthur C.', 'title' => '2001: A Space Odyssey' ) );
	$st->execute( array( 'author' => 'Asimov, Isaac', 'title' => 'Foundation' ) );
	$st->execute( array( 'author' => 'Asimov, Isaac', 'title' => 'The Gods Themselves' ) );
	$st->execute( array( 'author' => 'Card, Orson Scott', 'title' => 'Ender\'s game' ) );
}
catch( PDOException $e ) { exit( "PDO error #5: " . $e->getMessage() ); }

echo "Ubacio knjige u tablicu books.<br />";


// Ubaci neke posudbe unutra (ovo nije baš pametno ovako raditi, preko hardcodiranih id-eva usera i knjiga)
try
{
	$st = $db->prepare( 'INSERT INTO loans(id_user, id_book, lease_end) VALUES (:id_user, :id_book, :lease_end)' );

	$st->execute( array( 'id_user' => 1, 'id_book' => 2, 'lease_end' => '2016-04-11') );
	$st->execute( array( 'id_user' => 3, 'id_book' => 1, 'lease_end' => '2016-05-03') );
	$st->execute( array( 'id_user' => 5, 'id_book' => 4, 'lease_end' => '2016-03-21') );
	$st->execute( array( 'id_user' => 3, 'id_book' => 5, 'lease_end' => '2016-05-12') );
}
catch( PDOException $e ) { exit( "PDO error #5: " . $e->getMessage() ); }

echo "Ubacio knjige u tablicu books.<br />";
*/
?>
