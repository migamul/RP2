<?php

class LoginController extends BaseController
{


  	public function index(){
   		 $this->registry->template->title='Prijavi se!';
    	 	 $this->registry->template->show( 'ulogiraj_se' );
 	 }


	public function provjeri(){

    		$ls=new LibraryService();
    		if($ls->je_li_unutra()===false){
     			 $this->registry->template->title='Ups, nema vas';
     			 $this->registry->template->show( 'ulogiraj_se' );
    		}else{
      			$_SESSION['username']=$_POST['username'];
      			header( 'Location: ' . __SITE_URL . '/index.php?rt=users' );
   		 }
  	}







	function odlogiraj_se(){
		session_unset();
    session_destroy();
		header( 'Location: ' . __SITE_URL . '/index.php?rt=index' );
	}


	function registriraj(){
		$this->registry->template->title='Registracija';
    		$this->registry->template->show( 'registriraj_se' );
	}

	function provjeri2(){

		$ls=new LibraryService();
		if($ls->je_li_ok()===false){
			 $this->registry->template->title='ups!';
       $this->registry->template->show( 'ulogiraj_se' );

		 }else{
       $this->registry->template->title='Prijavi se!';
			 $this->registry->template->show('registriraj_se');
		 }
	}

	function potvrda(){

		  $ls=new LibraryService();
			if($ls->obavi()!==false){
			  header('Location: ' .__SITE_URL . '/index.php?rt=login');
		}else{
			header('Location: ' .__SITE_URL . '/index.php?rt=login');
		}
	}
};
?>
