
<?php

	require_once 'db.class.php';
	define( '__SITE_URL', dirname( $_SERVER['PHP_SELF'] ) );

  $bodovi=$_GET['bodovi'];
	$kraj=(int)$_GET['end'];
	$pocetak=(int)$_GET['begin'];
	$correct=(int)$bodovi;
	$correct=$correct/5;


	//imamo iz baze sada id_lesson!
  $db = DB::getConnection();
  $st = $db->prepare( "SELECT score, id_lesson,username FROM llUsers where username=:username" );
  $st->execute(array('username'=>$_GET['user']));

  while( $row = $st->fetch() )
  {
		$stari_lesson=(int)$row['id_lesson'];
  	$bodovi=(int)$row['score']+$bodovi;  //ovo cu staviti samo ako je $bodovi/5 >=12!
    $lesson=(int)$row['id_lesson']+1;
  }


 if($kraj===$stari_lesson && $kraj===$pocetak){  //stavi u bazu samo ako je $bodovi/5>=12
   if($correct>=12){
  	$db = DB::getConnection();
  	$st = $db->prepare( "UPDATE llUsers SET score=".$bodovi.",id_lesson=".$lesson." WHERE username=:username" );
  	$st->execute(array('username'=>$_GET['user']));
	}
}else{
	$db = DB::getConnection();
	$st = $db->prepare( "UPDATE llUsers SET score=".$bodovi." WHERE username=:username" );
	$st->execute(array('username'=>$_GET['user']));
}



  function sendJSONandExit( $message )
  {
      header( 'Content-type:application/json;charset=utf-8' );
      echo json_encode( $message );
      flush();
      exit( 0 );
  }
$message=[];
$message['bodovi']=$bodovi;
$message['lesson']=$lesson;
sendJSONandExit($message);

//	$db = DB::getConnection();

?>
