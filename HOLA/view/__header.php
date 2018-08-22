<!DOCTYPE html>
<html>
<head>
	<meta charset="utf8">
	<title> Hola - Login</title>
  <link rel="stylesheet" href="<?php echo __SITE_URL;?>/css/login.css">
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" />
	<link href="//fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900&subset=latin,latin-ext" rel="stylesheet" />
	<link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet"/>
</style>
</head>
<body>
	<div class = "name-logo-box">
		<p1><img src="http://www.holaprestamo.es/assets/design/logo.png" style="width:100px; height:50px;"></p1>
	</div>
	<?php if($title!=='Prijavi se!'){
		?><script>alert("Ups! Username/password is wrong.");</script>
<?php	} ?>
