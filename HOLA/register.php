<?php

	require_once 'view/db.class.php';
	define( '__SITE_URL', dirname( $_SERVER['PHP_SELF'] ) );


	if( !isset( $_GET['niz'] ) || !preg_match( '/^[a-z]{20}$/', $_GET['niz'] ) )
		exit( 'Nešto ne valja s nizom.' );


	$db = DB::getConnection();

	try
	{
		$st = $db->prepare( 'SELECT * FROM llUsers WHERE reg_seq=:reg_seq' );
		$st->execute( array( 'reg_seq' => $_GET['niz'] ) );
	}
	catch( PDOException $e ) { exit( 'Greška u bazi: ' . $e->getMessage() ); }

	$row = $st->fetch();

	if( $st->rowCount() !== 1 )
		exit( 'Taj registracijski niz ima ' . $st->rowCount() . 'korisnika, a treba biti točno 1 takav.' );
	else
	{
		try
		{
			$st = $db->prepare( 'UPDATE llUsers SET has_reg=1 WHERE reg_seq=:reg_seq' );
			$st->execute( array( 'reg_seq' => $_GET['niz'] ) );
		}
		catch( PDOException $e ) { exit( 'Greška u bazi: ' . $e->getMessage() ); }

	// Sve je uspjelo, zahvali mu na registraciji.
		header('Location: ' .__SITE_URL . '/index.php?rt=login');
	}

?>
