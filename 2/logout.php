<?php

// Uništi session i preusmjeri korisnika na početnu stranicu.

session_start();

session_unset();
session_destroy();

header( 'Location: quack.php' );
exit();

?>
