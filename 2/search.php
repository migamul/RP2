<?php

require_once 'crtaj_html.php';
require_once 'analiziraj_POST.php';
require_once 'rad_s_bazom.php';
require_once 'db.class.php';

session_start();

crtaj_header1();

if( isset( $_SESSION['username'] ) )
{
  textBoxHashtag();
  if( isset($_POST['hashtag'] ) && $_POST['hashtag'] !== '' )
  {
    $hashtag = $_POST['hashtag'];
    $bool = getAllQuacksWithHashtag($hashtag);
    if($bool !== 1)
      echo 'No result found';
    exit();
  }


}

crtaj_footer();

 ?>
