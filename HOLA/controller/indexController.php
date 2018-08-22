<?php

class IndexController extends BaseController
{
	public function index()
	{
		// Samo preusmjeri na users podstranicu.
		if(!isset($_SESSION['username']) || !isset($_SESSION['OK'])){
			header('Location: ' . __SITE_URL . '/view/index.php');
		}else{
		header( 'Location: ' . __SITE_URL . '/index.php?rt=users' );
	}
	}
};

?>
