<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.js"></script>

<style>
/* Slideshow container */
.slideshow-container {
  max-width: 900px;
  position: relative;
  margin-top: 5px;
  margin-left: 15%;
}

/* Next & previous buttons */
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  padding: 16px;
  margin-top: -22px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
  background-color: #956ec4;
}


/* Number text (1/3 etc) */
.numbertext {
  color: gray;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  text-decoration: bold;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  cursor: pointer;
  height: 15px;
  width: 15px;

  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active, .dot:hover {
  background-color: #717171;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}


</style>
<head>
	<meta charset="utf8">
	<title>Hola - preQuiz</title>
	<link rel="stylesheet" href="<?php echo __SITE_URL;?>/css/preQuiz.css">
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" />
	<link href="//fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900&subset=latin,latin-ext" rel="stylesheet" />
	<link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet"/>

</head>
<body>
