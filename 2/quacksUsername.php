<?php

require_once 'crtaj_html.php';
require_once 'analiziraj_POST.php';
require_once 'rad_s_bazom.php';
require_once 'db.class.php';

session_start();

crtaj_header1();

if( isset( $_SESSION['username'] ) )
{
  $username = $_SESSION['username'];
  getAllQuacksWithUsername( $username );
}

crtaj_footer();

 ?>
