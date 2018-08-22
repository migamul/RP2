<?php

require_once 'crtaj_html.php';
require_once 'analiziraj_POST.php';
require_once 'rad_s_bazom.php';
require_once 'db.class.php';

session_start();

if( !isset( $_SESSION['username'] ))
  analiziraj_POST_login();

crtaj_header1();

textBoxDodajQuack();
if( isset( $_SESSION['username'] ) )
{
  $username = $_SESSION['username'];
  $id = getIdUser( $username );

  if( isset ($_POST['noviQuack']) && $_POST['noviQuack'] !== '')
  {
    $date = date('Y-m-d H:i:s');
    $quack = $_POST['noviQuack'];
    insertNewQuack( $id, $quack, $date );
      $page = $_SERVER['PHP_SELF'];
      $sec = "1";
      header("Refresh: $sec; url=$page");
  }
  $id = getIdUser( $username );
  getMyQuacks( $id );
}
crtaj_footer();
?>
