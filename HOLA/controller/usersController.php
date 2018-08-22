<?php

class UsersController extends BaseController
{

	public function index()
	{
		// Kontroler koji prikazuje popis svih usera

		$ls = new LibraryService();
		$this->registry->template->title1 = 'Aplication_name';
		$this->registry->template->userList = $ls->getAllAboutUser(); //polje s objektom o podacima korisnika
		$this->registry->template->lessonList = $ls->getAllAboutCurrentLesson(); //vraca polje objekata linkova na sliku
    $this->registry->template->show( 'my_lesson' );
	}

  public function lesson(){
		$var='';
		$var1='';

		if(strpos($_GET['rt'],'smijes')!==false){
			$poz=strpos($_GET['rt'],'smijes');
			$poz+=7;
			while($poz<strlen($_GET['rt']) && $_GET['rt'][$poz]!=='/'){
					$var1=$var1.$_GET['rt'][$poz];
					$poz++;
				}
		}

		if($var1==='0'){
			header( 'Location: ' . __SITE_URL . '/index.php?rt=users' );
			return;
		}else{

		if(strpos($_GET['rt'],'niz')!==false){
			$poz=strpos($_GET['rt'],'niz');
			$poz+=4;
			while($poz<strlen($_GET['rt'])){
					$var=$var.$_GET['rt'][$poz];
					$poz++;
				}
			}
		$ls = new LibraryService();
		$_SESSION['lesson']=$var;
		$this->registry->template->lessonList = $ls->getInfoAboutLesson($var);
		$this->registry->template->discussionList = $ls->getAllDisscusions($var);
    $this->registry->template->show( 'lesson_view' );
	}
}

	public function leaderboard() {
		$ls = new LibraryService();
		$this->registry->template->allUsers = $ls->getAllUsers();
		$this->registry->template->show('leaderboard');
	}

};

?>
