<style>input {width: 50%;} </style>
<style>button {width: 10%;} </style>

<?php

function crtaj_header()
{
	?>
	<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf8">
		<title>Login</title>
	</head>
	<body>
	<?php
}

function crtaj_header1()
{
	?>
	<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf8">
		<title>Login</title>
	</head>
	<body>
		<h1 style = " background-color: lightblue; width = 200 px; height = 200 px; font-style: italic;">
			<l1 style = "font-size: 60px;" >Quack!</l1>
		</br>
			<p style = "font-size: 30px; " >@<?php echo $_SESSION['username'] ?> </p>
			<p style = "font-size: 30px; text-align: right;"> <a href="logout.php">Logout</a> </p></h1>


		<p style = "font-style: italic; font-size: 30px;" >
				&nbsp; &nbsp; <a href="quack.php" name="1">My quacks</a>
				&nbsp; &nbsp; <a href="following.php" name="2">Following</a>
				&nbsp; &nbsp; <a href="followers.php" name="3">followers</a>
				&nbsp; &nbsp; <a href="quacksUsername.php" name="4">quacks @<?php echo $_SESSION['username'] ?></a>
				&nbsp; &nbsp; <a href="search.php" name="5">#search</a>
		</p>
		<?php
}

function crtaj_footer()
{
	?>
	</body>
	</html>
	<?php
}

function crtaj_formaZaLogin( $errorMsg = '' )
{
	crtaj_header();
	?>

	<form method="post" action="<?php echo htmlentities( $_SERVER["PHP_SELF"] ); ?>">
		<h2 style = "background-color: lightblue;">
		Korisničko ime: <input type="text" name="username" />
		<br />
		Lozinka:<input type="password" name="password" />
		<br />
		<button type="submit">Ulogiraj se!</button>
	</h2>
	</form>
	<p>
		Ako nemate korisnički račun, otvorite ga <a href="novi.php">ovdje</a>.
	</p>

	<?php
	if( $errorMsg !== '' )
		echo '<p>Greška: ' . $errorMsg . '</p>';

	crtaj_footer();
}

function crtaj_formaZaNovogKorisnika( $errorMsg = '' )
{
	crtaj_header();
	?>

	<form method="post" action="<?php echo htmlentities( $_SERVER["PHP_SELF"] ); ?>">
		Odaberite korisničko ime: <input type="text" name="username" />
		<br />
		Odaberite lozinku: <input type="password" name="password" />
		<br />
		Vaša mail-adresa: <input type="text" name="email" />
		<br />
		<button type="submit">Stvori korisnički račun!</button>
	</form>

	<p>
		Povratak na <a href="quack.php">početnu stranicu</a>.
	</p>

	<?php
	if( $errorMsg !== '' )
		echo '<p>Greška: ' . $errorMsg . '</p>';

	crtaj_footer();
}

function crtaj_ulogiraniKorisnik( )
{
	crtaj_header1();
	?>

	<?php
	crtaj_footer();
}

function crtaj_zahvalaNaPrijavi( $errorMsg = '' )
{
	crtaj_header();
	?>

	<p>
		Zahvaljujemo na prijavi. Da biste dovršili registraciju, kliknite na link u mailu kojeg smo Vam poslali.
	</p>

	<p>
		Povratak na <a href="quack.php">početnu stranicu</a>.
	</p>

	<?php
	crtaj_footer();
}

function crtaj_zahvalaNaRegistraciji( $errorMsg = '' )
{
	crtaj_header();
	?>

	<p>
		Registracija je uspješno provedena.<br />
		Sada se možete ulogirati na <a href="quack.php">početnoj stranici</a>.
	</p>

	<?php
	crtaj_footer();
}

function textBoxDodajQuack()
{
	?>

	<form method="post" action="<?php echo htmlentities( $_SERVER["PHP_SELF"] ); ?>">
	New Quack: <input type="text" name="noviQuack"/>
	<button type="submit" name="dodajQuack">Add</button>
  </br>
</form>

	<?php
}

function textBoxKorisnik()
{
	?>
<form method="post" action="<?php echo htmlentities( $_SERVER["PHP_SELF"] ); ?>">
	User: <input type="text" name="Korisnik"/>
	<button type="submit" name="dodajKorisnika">Follow</button>
	<button type="submit" name="ukloniKorisnika">Unfollow</button>
  </br>
</form>
	<?php
}

function textBoxHashtag()
{
	?>

<form method="post" action="<?php echo htmlentities( $_SERVER["PHP_SELF"] ); ?>">
	<b>#</b><input type="text" name="hashtag"/>
	<button type="submit">Search</button>
	</br>
</form>

	<?php
}

?>
