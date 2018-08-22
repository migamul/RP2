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
  $id = getIdUser( $username );
  $list = array();
  $list = getIdOfFollowers( $id );
  $size = sizeof($list);

  for( $i = 0; $i < $size ; $i++ )
  {
    getUsernameOfFollowers($list[$i]);
  }

}

crtaj_footer();

 ?>
