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
	
	if(!isset($_GET['text']) || !isset($_GET['id_user']) || !isset($_GET['id_lesson']))
	{
		return;
	}
		
	$text = $_GET['text'];
	if(trim($text) == '') return;
	
	$id_user = $_GET['id_user'];
	$id_lesson = (int)$_GET['id_lesson'];
	
	$nowTime = date("Y-m-d H:i:s", time());
	$db = DB::getConnection();
	$st2 = $db->prepare( "INSERT INTO llDiscussion(text, id_user, id_lesson, date) VALUES (:text,:id_user,:id_lesson, :date)" );
	$st2->execute(array('text'=>$text, 'id_user'=>$id_user, 'id_lesson'=>$id_lesson, 'date'=>$nowTime));
?>