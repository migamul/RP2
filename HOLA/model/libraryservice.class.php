<?php

class LibraryService
{
	function getAllAboutUser()
	{
		try
		{
			$db = DB::getConnection();
			$st = $db->prepare( 'SELECT id_user, username, score, id_lesson FROM llUsers WHERE username=:username' );
			$st->execute(array('username'=>$_SESSION['username']));
		}catch( PDOException $e ) { exit( 'PDO error ' . $e->getMessage() ); }

		$arr=array();
		while( $row = $st->fetch() )
		{

			$arr[] = new User( $row['id_user'],$row['username'], $row['score'],$row['id_lesson']);
		}

		return $arr;
	}

	function getAllAboutProfil()
	{
		try
		{
			$db = DB::getConnection();
			$st = $db->prepare( 'SELECT about_me, email, profile_image, score, id_lesson, username FROM llUsers WHERE username=:username' );
			$st->execute(array('username'=>$_SESSION['username']));
		}catch( PDOException $e ) { exit( 'PDO error ' . $e->getMessage() ); }

		$arr=array();
		while( $row = $st->fetch() )
		{

			$arr[] = new Profil( $row['about_me'],$row['email'], $row['profile_image'],$row['username'],$row['score'],$row['id_lesson']);
		}

		return $arr;
	}
	
	function getProfilebyUserId($user_id)
    {
        try
        {
            $db = DB::getConnection();
            $st = $db->prepare( 'SELECT about_me, email, profile_image, score, id_lesson, username FROM llUsers WHERE id_user=:user_id' );
            $st->execute(array('user_id'=>$user_id));
        }catch( PDOException $e ) { exit( 'PDO error ' . $e->getMessage() ); }

        $arr=array();
        while( $row = $st->fetch() )
        {

            $arr[] = new Profil( $row['about_me'],$row['email'], $row['profile_image'],$row['username'],$row['score'],$row['id_lesson']);
        }

        return $arr;
    }
	
	  
      function getAllUsers()
    {    
        try 
        {
            $db = DB::getConnection();
            $st = $db->prepare( 'SELECT id_user,username,score FROM llUsers ORDER BY score DESC' );
            $st->execute();
        } catch( PDOException $e ) { exit( 'PDO error ' . $e->getMessage() ); }
        
        $arr=array();
        while( $row = $st->fetch() )
        {
            $arr[] = new User( $row['id_user'],$row['username'], $row['score'], NULL);
        }
        return $arr;
    }




  function getAllAboutCurrentLesson()
  {
     //dohvatimo sve o lessonsima
		try
		{
			$db = DB::getConnection();
			$st = $db->prepare( 'SELECT * FROM llLessons' );
			$st->execute();
		}catch( PDOException $e ) { exit( 'PDO error ' . $e->getMessage() ); }
		//sada vracamo polje trenutng stanje lessonsa za tog korisnika
		$pom_arr=$this->getAllAboutUser();//sada imam id_lesson
		$current_lesson=$pom_arr[0]->id_lesson;
		$arr=array();
		while( $row = $st->fetch() )
		{
			//ako je lesson manji dajemo mu link od obojane slike, a ako je veci tada crno-bijelu
			if($row['id_lesson']<=$current_lesson){
			  $arr[] = new Lesson( $row['id_lesson'],$row['title'], $row['link'],$row['image'],1);
			}else{
				 $arr[] = new Lesson( $row['id_lesson'],$row['title'], $row['link'],$row['image_locked'],0);
			}
		}

		return $arr;

  }

	function getInfoAboutLesson($lesson){

		try
		{
			$db = DB::getConnection();
			$st = $db->prepare( 'SELECT id_lesson, title, link,image FROM llLessons WHERE id_lesson=:id' );
			$st->execute(array('id'=>$lesson));
		}catch( PDOException $e ) { exit( 'PDO error ' . $e->getMessage() ); }

		$arr=array();
		while( $row = $st->fetch() )
		{

			$arr[] = new Lesson( $row['id_lesson'],$row['title'], $row['link'],$row['image'],0);
		}

		return $arr;
	}

	function getAllDisscusions($lesson){
		try
		{
			$db = DB::getConnection();
			$st = $db->prepare( 'SELECT id_discussion, text, id_user,id_lesson,date FROM llDiscussion WHERE id_lesson=:id' );
			$st->execute(array('id'=>$lesson));
		}
		catch( PDOException $e ) { exit( 'PDO error ' . $e->getMessage() ); }

		$arr=array();
		while( $row = $st->fetch() )
		{

			$arr[] = new Discussion( $row['id_discussion'],$row['text'], $row['id_user'],$row['id_lesson'],$row['date']);
		}

		return $arr;
	}

	function je_li_unutra(){

		if( !isset( $_POST['username'] ) || !isset( $_POST['password'] ) )
		{
			return false;
		}

		if( !preg_match( '/^[a-zA-Z]{3,10}$/', $_POST['username'] ) )
		{

			return false;
		}

		// Dakle dobro je korisničko ime.
		// Provjeri taj korisnik postoji u bazi; dohvati njegove ostale podatke.
		$db = DB::getConnection();

		try
		{
			$st = $db->prepare( 'SELECT username, password_hash, has_reg FROM llUsers WHERE username=:username' );
			$st->execute( array( 'username' => $_POST['username'] ) );
		}
		catch( PDOException $e ) { exit( 'Greška u bazi: ' . $e->getMessage() ); }

		$row = $st->fetch();

		if( $row === false )
		{

			return false;
		}
		else if( $row['has_reg'] === '0' )
		{

			return false;
		}
		else if( !password_verify( $_POST['password'], $row['password_hash'] ))
		{

	   		return false;
		}
		else
		{
			// Sad je valjda sve OK. Ulogiraj ga.
			return true;
		}
	}




	function je_li_ok(){
		if( !isset( $_POST['username'] ) || !isset( $_POST['password'] ) || !isset( $_POST['email'] ) )
		{
			return false;
		}

		if( !preg_match( '/^[A-Za-z]{3,10}$/', $_POST['username'] ) )
		{
			return false;
		}
		else if( !filter_var( $_POST['email'], FILTER_VALIDATE_EMAIL) )
		{
			return false;
		}
		else
		{
			// Provjeri jel već postoji taj korisnik u bazi
			$db = DB::getConnection();

			try
			{
				$st = $db->prepare( 'SELECT * FROM llUsers WHERE username=:username' );
				$st->execute( array( 'username' => $_POST['username'] ) );
			}
			catch( PDOException $e ) { exit( 'Greška u bazi: ' . $e->getMessage() ); }

			if( $st->rowCount() !== 0 )
			{
				return false;
			}

			$db = DB::getConnection();

			try
			{
				$st = $db->prepare( 'SELECT * FROM llUsers' );
				$st->execute();
			}
			catch( PDOException $e ) { exit( 'Greška u bazi: ' . $e->getMessage() ); }

			$br=$st->rowCount()+1;
			// Dakle sad je napokon sve ok.
			// Dodaj novog korisnika u bazu. Prvo mu generiraj random string od 10 znakova za registracijski link.
			$reg_seq = '';
			for( $i = 0; $i < 20; ++$i )
				$reg_seq .= chr( rand(0, 25) + ord( 'a' ) ); // Zalijepi slučajno odabrano slovo

			try
			{
				$st = $db->prepare( 'INSERT INTO llUsers(id_user, username, password_hash, email, reg_seq, has_reg,score,id_lesson) VALUES ' .
					                '(:id, :username, :password, :email, :reg_seq, 0,0,1)' );

				$st->execute( array( 'id' => $br, 'username' => $_POST['username'],
					                 'password' => password_hash( $_POST['password'], PASSWORD_DEFAULT ),
					                 'email' => $_POST['email'],
					                 'reg_seq'  => $reg_seq ) );
			}
			catch( PDOException $e ) { exit( 'Greška u bazi: ' . $e->getMessage() ); }

			// Sad mu još pošalji mail
			$to       = $_POST['email'];
			$subject  = 'Registracijski mail';
			$message  = 'Poštovani ' . $_POST['username'] . "!\nZa dovršetak registracije kliknite na sljedeći link: ";
			$message .= 'http://' . $_SERVER['SERVER_NAME'] . htmlentities( dirname( $_SERVER['PHP_SELF'] ) ) . '/register.php?niz=' . $reg_seq . "\n";
			$headers  = 'From: rp2@studenti.math.hr' . "\r\n" .
			            'Reply-To: rp2@studenti.math.hr' . "\r\n" .
			            'X-Mailer: PHP/' . phpversion();

			$isOK = mail($to, $subject, $message, $headers);

			if( !$isOK )
				return false;

			// Zahvali mu na prijavi.
			return true;
		}
	}
};

?>
