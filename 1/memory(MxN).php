<?php

class Memory
{
	protected $imeIgraca, $brojPoteza, $gameOver, $errorMsg;
	protected $rows, $cols, $brojKarata, $karte, $prvaKarta, $drugaKarta, $rez, $pom, $k1, $k2, $k3;
	// Imena konstanti
	const ISTE_KARTE = 1, RAZLICITE_KARTE = 0, SVE_OKRENUTO = -1;

	function __construct()
	{
		$this->imeIgraca = false;
		$this->brojPoteza = 0;
		$this->gameOver = false;
		$this->errorMsg = false;
		$this->cols = false;
		$this->rows = false;
		$this->brojKarata = false;
		// Karte su polje
		$this->karte = array();
		// $prvaKarta i $drugaKarta su mjesta u polju ... to su lokacije trenutno otvorenih brojKarata
		// Na početku postavljene na -1 (nema tog indexa u polju)
		$this->prvaKarta = -1;
		$this->drugaKarta = -1;
		// $rez je varijabla koja ce moc poprimit vrijednost jednu od gornje 3 konstante, a na pocetku postavljena na random 8
		$this->rez = 8;
		// Pomocno polje koje na pocetku sve 1, a kasnije ako se pogode karte njihove lokacije postaju 0 i one se više ne zatvaraju
		$this->pom = array();
		// Kontrole
		$this->k1 = 0; $this->k2 = 0; $this->k3 = 100;
		//shuffle($this->karte);
	}

	function ispisiFormuZaIme()
	{
		// Ispisi formu koja ucitava ime igraca
		?>
		<!DOCTYPE html>
		<html>
		<head>
			<meta charset="utf-8">
			<title>1.dz - Memory Game</title>
		</head>
		<body>
			<p style="font-size:200%";><b> Memory! </b> </p>
			<form method="post" action="<?php echo htmlentities( $_SERVER['PHP_SELF']); ?>">
				Unesi svoje ime: <input type="text" name="imeIgraca" />
				<br/>
				Unesi broj redaka M: <input type="text" name="M" />
				<br/>
				Unesi broj stupaca N: <input type="text" name="N" />
				<br/>
				<button type="submit">Započni igru!</button>
			</form>

			<?php if( $this->errorMsg !== false ) echo '<p>Greška: ' . htmlentities( $this->errorMsg ) . '</p>'; ?>
		</body>
		</html>

		<?php
	}

	function ispisiFormuZaIgru($prethodni)
	{
		// Ispisuje formu za igru. $prethodni se odnosi na prethodni potez koji je obrađen
		// Povećaj brojač poteza
		++$this->brojPoteza;

		?>
		<!DOCTYPE html>
		<html>
		<head>
			<meta charset="utf-8">
			<title>Memory!</title>
			<style>table, th, td { border: solid 2px; width: 200px; height: 40px; text-align: center;}</style>
		</head>
		<body>
			<p style="font-size:200%";><b> Memory! </b> </p>
			<p>
				Igrač: <?php echo htmlentities( $this->imeIgraca ); ?>!
				<br/>
				Potez broj: <?php echo ($this->brojPoteza - 1); ?>
			</p>

	<form method="post" action="<?php echo htmlentities( $_SERVER['PHP_SELF']); ?>">

		<table>
			<?php
			// Ako je obrađeni potez t.d. su okrenute iste karte onda se u polju pom mijenjaju 1->0
			// Na lokaciji tih karata u polju $karte
				if($prethodni === Memory::ISTE_KARTE)
				{
					$this->pom[$this->prvaKarta] = 0;
					$this->pom[$this->drugaKarta] = 0;
				}
				// Šetamo po tablici
				for( $r = 0; $r < $this->rows; ++$r )
				{
					for( $c = 0; $c < $this->cols; ++$c )
					{
						// Ako u polju pom na toj lokaciji = 0, onda to znaci da su te karte pogodene i njih ne diramo vise
						if($this->pom[$r*($this->cols)+$c] === 0)
							echo "<td bgcolor=green>" . $this->karte[$r*($this->cols)+$c] . "</td>";
						// Inace, otvori karte koje su odabrane u žutom (i njih nece pamtit nego ce ih nakon novog poteza zatvorit)
						else
						{
							if(($r*($this->cols)+$c) === $this->prvaKarta && $this->k1 === 0 && $this->k2 === 0)
								echo "<td bgcolor=yellow>" . $this->karte[$this->prvaKarta] . "</td>";
							else if(($r*($this->cols)+$c) === $this->drugaKarta && $this->k1 === 0 && $this->k2 === 0)
								echo "<td bgcolor=yellow>" . $this->karte[$this->drugaKarta] . "</td>";
							else
								echo "<td &nbsp>" . "</td>";
					 	}
					}
					echo "</tr>";
				}
			?>
		</table>
		<?php
		$this->k3 = 0;
		for($i = 0; $i < $this->brojKarata; $i++)
			if($this->pom[$i] !== 0)
				$this->k3 = 1;

		if($this->k3 === 0)
		{
			// Ako je igrač zavrsio s igrom, ispiši mu čestitku.
			$this->ispisiCestitku();
			$this->gameOver = true;
		}
		 ?>

			Odaberi dvije karte!
			<br/>
			<p> Prva karta - red:
					<select name="red1" id="red1">
					<?php
							for($i = 1; $i <= $this->rows; $i++)
								echo "<option value=".$i.">".$i."</option>";
					 ?>
					</select>

					stupac:
					<select name="stupac1" id="stupac1">
						<?php
								for($i = 1; $i <= $this->cols; $i++)
									echo "<option value=".$i.">".$i."</option>";
						 ?>
					</select>
			</p>

			<p> Druga karta - red:
					<select name="red2" id="red2">
						<?php
								for($i = 1; $i <= $this->rows; $i++)
									echo "<option value=".$i.">".$i."</option>";
						 ?>
					</select>

					stupac:
					<select name="stupac2" id="stupac2">
						<?php
								for($i = 1; $i <= $this->cols; $i++)
									echo "<option value=".$i.">".$i."</option>";
						 ?>
					</select>
			</p>

				<button type="submit">Otkrij odabrane karte!</button>
				<br/>
				<button name="reset" type="submit" id="reset">Hoću sve ispočetka!</button>
			</form>

			<?php if( $this->errorMsg !== false ) echo '<p>Greška: ' . htmlentities( $this->errorMsg ) . '</p>'; ?>
		</body>
		</html>
		<?php
	}

// Forma za igru na pocetku kada nema odabranih karata
	function ispisiFormuZaIgruNaPocetku( )
	{
		++$this->brojPoteza;

		?>
		<!DOCTYPE html>
		<html>
		<head>
			<meta charset="utf-8">
			<title>Memory!</title>
			<style>table, th, td { border: solid 2px; width: 200px; height: 40px; text-align: center;}</style>
		</head>
		<body>
			<p style="font-size:200%";><b> Memory! </b> </p>
			<p>
				Igrač: <?php echo htmlentities( $this->imeIgraca ); ?>!
				<br/>
				Potez broj: <?php echo ($this->brojPoteza - 1); ?>
			</p>

	<form method="post" action="<?php echo htmlentities( $_SERVER['PHP_SELF']); ?>">
		<table>
			<?php
				for( $r = 0; $r < $this->rows; ++$r )
				{
					for( $c = 0; $c < $this->cols; ++$c )
							echo "<td &nbsp>" . "</td>";
					echo "</tr>";
				}
			?>
		</table>

			Odaberi dvije karte!
			<br/>
			<p> Prva karta - red:
					<select name="red1" id="red1">
						<?php
								for($i = 1; $i <= $this->rows; $i++)
									echo "<option value=".$i.">".$i."</option>";
						 ?>
					</select>

					stupac:
					<select name="stupac1" id="stupac1">
						<?php
								for($i = 1; $i <= $this->cols; $i++)
									echo "<option value=".$i.">".$i."</option>";
						 ?>
					</select>
			</p>

			<p> Druga karta - red:
					<select name="red2" id="red2">
						<?php
								for($i = 1; $i <= $this->rows; $i++)
									echo "<option value=".$i.">".$i."</option>";
						 ?>
					</select>

					stupac:
					<select name="stupac2" id="stupac2">
						<?php
								for($i = 1; $i <= $this->cols; $i++)
									echo "<option value=".$i.">".$i."</option>";
						 ?>
					</select>
			</p>

				<button type="submit">Otkrij odabrane karte!</button>
				<br/>
				<button name="reset" type="submit" id="reset">Hoću sve ispočetka!</button>
			</form>

			<?php if( $this->errorMsg !== false ) echo '<p>Greška: ' . htmlentities( $this->errorMsg ) . '</p>'; ?>
		</body>
		</html>

		<?php
	}

// Ukoliko igrac dode do kraja(tj. sve karte otvorene) ispisuje mu se cestitka
	function ispisiCestitku()
	{
		?>
		<!DOCTYPE html>
		<html>
		<head>
			<meta charset="utf-8">
			<title> Memory - Bravo!</title>
		</head>
		<body>
			<p>
				Bravo, <?php echo htmlentities( $this->imeIgraca ); ?>!
				<br/>
				Završio si igru u <?php echo ($this->brojPoteza - 1); ?> poteza!
				<br/>
			</p>
		</body>
		</html>

		<?php
	}

	function get_imeIgraca()
	{
		// Je li već definirano ime igrača?
		if( $this->imeIgraca !== false )
			return $this->imeIgraca;

		// Možda nam se upravo sad šalje ime igrača?
		if( isset( $_POST['imeIgraca'] ) )
		{
			// Šalje nam se ime igrača. Provjeri da li se sastoji samo od slova.
			if( !preg_match( '/^[a-zA-Z]{1,20}$/', $_POST['imeIgraca'] ) )
			{
				// Nije dobro ime. Dakle nemamo ime igrača.
				$this->errorMsg = 'Ime igrača treba imati između 1 i 20 slova.';
				return false;
			}
			else
			{
				// Dobro je ime. Spremi ga u objekt.
				$this->imeIgraca = $_POST['imeIgraca'];
				return $this->imeIgraca;
			}
		}
		// Ne šalje nam se sad ime. Dakle nemamo ga uopće.
		return false;
	}

	function get_M_i_N()
	{
		if($this->rows !== false)
			return $this->rows;
		if($this->cols !== false)
			return $this->cols;
		if( isset($_POST['M'] ) && isset($_POST['N'] ) )
		{
			//provjera parnosti
			if(((int) $_POST['M']) % 2 !== 0 && ((int) $_POST['N']) % 2 !== 0)
			{
				$this->errorMsg = 'Jedan od M i N mora biti paran broj';
				return false;
			}

			$this->rows = (int) $_POST['M'];
			$this->cols = (int) $_POST['N'];
			$this->brojKarata = ($this->rows)*($this->cols);

			$j = 1;
			for($i = 0; $i < $this->brojKarata; $i++)
			{
				array_push($this->karte, $j);
				array_push($this->pom, 1);
				$i = $i + 1;
				array_push($this->karte, $j);
				array_push($this->pom, 1);
				$j = $j + 1;
			}
			shuffle($this->karte);
		}
		return $this->karte;
	}

// Obraduje jedan potez
// $prva je lokacija(index) prve karte u tablici/polju, $druga je lokacija druge
 function obradiPotez($prva, $druga, $kontrola)
 {
			if($this->karte[$prva] === $this->karte[$druga] && $kontrola === 1)
				return Memory::ISTE_KARTE;
			if($this->karte[$prva] !== $this->karte[$druga] && $kontrola === 1)
				return Memory::RAZLICITE_KARTE;
			if($kontrola === 0)
				return Memory::SVE_OKRENUTO;
	}

	function isGameOver()
	{
		return $this->gameOver;
	}

	function run()
	{
		// Funkcija obavlja "jedan potez" u igri.
		// Prvo, resetiraj poruke o greški.
		$this->errorMsg = false;

		// Prvo provjeri jel imamo uopće ime igraca
		if( $this->get_imeIgraca() === false || $this->get_M_i_N() === false)
		{
			// Ako nemamo ime igrača, ispiši formu za unos imena i to je kraj.
			$this->ispisiFormuZaIme();
			return;
		}

		// Ako je igra na pocetku
		if($this->brojPoteza === 0)
		{
			$this->ispisiFormuZaIgruNaPocetku();
			return ;
		}

		// Isčitaj što je odabrano u formi
		$prvaKartaRed = (int) $_POST['red1'];
		$prvaKartaStupac = (int) $_POST['stupac1'];
		$drugaKartaRed = (int) $_POST['red2'];
		$drugaKartaStupac = (int) $_POST['stupac2'];

		// Pretvori to u lokaciju(index) tablice/polja
		$prvaMjesto = ($prvaKartaRed-1)*($this->cols) + ($prvaKartaStupac-1);
		$drugaMjesto = ($drugaKartaRed-1)*($this->cols) + ($drugaKartaStupac-1);

		$this->k1 = 0;
		$this->k2 = 0;
		$this->k3 = 0;

		//provjera jesu li sve karte vec otvorene
		for($i = 0; $i < $this->brojKarata; $i++)
			if($this->pom[$i] !== 0)
				$this->k3 = 1;

		if($this->k3 === 0)
		{
			// Ako je igrač zavrsio s igrom, ispiši mu čestitku.
			$this->ispisiCestitku();
			$this->gameOver = true;
		}

		// Ako je igrač dva puta izabrao istu kartu
		if($prvaMjesto === $drugaMjesto)
		{
			$this->k1 = 1;
			$this->ispisiFormuZaIgru($this->rez);
			return ;
		}

		// Ako je igrač izabrao mjesto na kojem je već pogođena karta,a nije kraj igre
		if(($this->pom[$prvaMjesto] === 0 && $this->rez !== Memory::SVE_OKRENUTO)
		 	|| ($this->pom[$drugaMjesto] === 0 && $this->rez !== Memory::SVE_OKRENUTO))
		{
			$this->k2 = 1;
			$this->ispisiFormuZaIgru($this->rez);
			return ;
		}

		$this->prvaKarta = $prvaMjesto;
		$this->drugaKarta = $drugaMjesto;

		// Obradi taj potez, s trenutnim $prvaKarta i $drugaKarta
		$this->rez = $this->obradiPotez($this->prvaKarta, $this->drugaKarta, $this->k3);

	 if($this->rez === Memory::SVE_OKRENUTO || $this->k3 === 0)
		{
			// Ako je igrač zavrsio s igrom, ispiši mu čestitku.
			$this->ispisiCestitku();
			$this->gameOver = true;
		}
	 else
	 		$this->ispisiFormuZaIgru($this->rez);
	}
};

// --------------------------------------------------------------------------------------------
session_start();

// Ako je igrač stisnuo gumb za reset, vrati ga na pocetak
if(isset($_POST['reset'] ) )
{
	$igra = new Memory();
	$_SESSION['igra'] = $igra;
}

if( !isset( $_SESSION['igra'] ) )
{
	// Ako igra još nije započela, stvori novi objekt tipa Memory i spremi ga u $_SESSION
	$igra = new Memory();
	$_SESSION['igra'] = $igra;
}
else
{
	// Ako je igra već ranije započela, dohvati ju iz $_SESSION-a
	$igra = $_SESSION['igra'];
}

// Izvedi jedan korak u igri, u kojoj god fazi ona bila.
$igra->run();

if( $igra->isGameOver() )
{
	// Kraj igre -> prekini session.
	session_unset();
	session_destroy();
	#session_start();
}
else
{
	// Igra još nije gotova -> spremi trenutno stanje u SESSION
	$_SESSION['igra'] = $igra;
}
