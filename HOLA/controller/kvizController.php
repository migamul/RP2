<?php

class KvizController extends BaseController
{
	public function index()
	{
		header( 'Location: ' . __SITE_URL . '/kviz.php' );

	}

	public function profile(){
		$ls = new LibraryService();

		$user_id='';
		if(strpos($_GET['rt'],'id')!==false){
			$poz=strpos($_GET['rt'],'id');
			$poz+=3;
			while($poz<strlen($_GET['rt']) && $_GET['rt'][$poz]!=='/'){
					$user_id=$user_id.$_GET['rt'][$poz];
					$poz++;
			}
			$arr = $ls->getProfilebyUserId($user_id);
			if(count($arr) === 0) {
				$this->registry->template->profilList = $ls->getAllAboutProfil();
			}
			else {
				$this->registry->template->profilList = $arr;
			}
		} else {
			//treba mi mail, profilna, i nesta o njemu
			$this->registry->template->profilList = $ls->getAllAboutProfil();
		}
		$this->registry->template->show( 'profile' );
	}
};

?>
