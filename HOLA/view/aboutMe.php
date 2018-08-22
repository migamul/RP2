<?php

	require_once 'db.class.php';
	define( '__SITE_URL', dirname( $_SERVER['PHP_SELF'] ) );
	
	function sendJSONandExit( $message )
	{
      header( 'Content-type:application/json;charset=utf-8' );
      echo json_encode( $message );
      flush();
      exit( 0 );
	}
	
	if(!isset($_POST['text']) || !isset($_POST['username']))
	{
		return;
	}
		
	$text = $_POST['text'];
	if(trim($text) == '') return;
	
	$username = $_POST['username'];

	$db = DB::getConnection();
	$st2 = $db->prepare( "update llUsers set about_me=:text where username=:username" );
	$st2->execute(array('text'=>$text, 'username'=>$username));
?>