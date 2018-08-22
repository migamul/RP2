<?php

require_once 'crtaj_html.php';
require_once 'analiziraj_POST.php';
require_once 'rad_s_bazom.php';
require_once 'db.class.php';

session_start();

crtaj_header1();

if( isset( $_SESSION['username'] ) )
{
  textBoxKorisnik();

  $username = $_SESSION['username'];
  $id1 = getIdUser( $username );

  if( isset($_POST['dodajKorisnika'] ) )
  {
    if( isset($_POST['Korisnik'] ) && $_POST['Korisnik'] !== '' )
    {
      $user = $_POST['Korisnik'];
      $id2 = getIdUser($user);
      insertFollowingUser($id1, $id2);
    }
    $page = $_SERVER['PHP_SELF'];
    $sec = "1";
    header("Refresh: $sec; url=$page");
    exit();
  }

  if( isset($_POST['ukloniKorisnika'] ) )
  {
    if( isset($_POST['Korisnik'] ) && $_POST['Korisnik'] !== '' )
    {
      $user = $_POST['Korisnik'];
      $id2 = getIdUser($user);
      deleteFollowingUser($id1,$id2);
    }
    $page = $_SERVER['PHP_SELF'];
    $sec = "1";
    header("Refresh: $sec; url=$page");
    exit();
  }

  /*$list = array();
  $list = getIdOfFollowing( $id1 );
  $size = sizeof($list);

  for( $i = 0; $i < $size ; $i++ )
  {
    getAllQuacksOfFollowing($list[$i]);
  }*/

  getQuacksOfFollowed($id1);

}

crtaj_footer();

 ?>
