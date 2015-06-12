<!--
	Kapcsolat felvétel emailen keresztül.
	
	Készítette: Urbán Norbert.
	Verzió: 1.0
-->

<?php
	$errNev = "";
	$errEmail = "";
	$errUzenet = "";
	$errOsszeg = "";
	$eredmeny = "";
	if(isset($_POST["submit"])) {
		$nev = isset($_POST['nev']) ? $_POST['nev'] : null;
		$email = isset($_POST['email']) ? $_POST['email'] : null;
		$uzenet = isset($_POST['uzenet']) ? $_POST['uzenet'] : null;
		$osszeg = isset($_POST['ellenorzo']) ? intval($_POST['ellenorzo']) : null;
		$kinek = "pelda@gmail.com";
		$tema = "Üzenetküldő példa";
		
		if(!$_POST['nev']) {
			$errNev = "Kérem addja meg a nevét!";
		}
		
		if (!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errEmail = 'Kérem adjon meg egy valós e-mail címet!';
        }
		
		if(!$_POST['uzenet']) {
			$errUzenet = "Kérem írja meg az üzenetét!";
		}
		
		if($osszeg !== 5) {
			$errOsszeg = "Nem megfelelő az eredmény!";
		}
		
		if(!$errNev && !$errEmail && !$errUzenet && !$errOsszeg) {
			if(mail($kinek, $tema, $uzenet, 'From: $name <$email>'))
				$eredmeny = "<p class='alert alert-danger'>Köszönöm az üzenetét! Hamarosan válaszolok!</p>";
			else {
				$eredmeny = "<p class='alert alert-danger'>Kérem minden mezőt rendesen töltsön ki!</p>";
			}
		}
	}
?>

<!DOCTYPE html>
<html lang="hu">
  <head>
    <meta charset="utf-8">
	<title>Kapcsolat</title>
	<meta name="description" content="Húsvét napjának kiszámolása">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
  </head>
  <body style="background: #FFF8DC">
  	<div class="container">
  		<div class="row">
  			<div class="col-md-6 col-md-offset-3">
  				<h1 class="page-header text-center">Kapcsolatfelvétel</h1>
				<form class="form-horizontal" role="form" method="post" action="kapcsolat.php">
					<div class="form-group">
						<label for="nev" class="col-sm-2 control-label">Név</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="nev" name="nev" placeholder="Család-, és keresztnév">
							<?php echo "<p class='text-danger'>$errNev</p>"; ?>
						</div>
					</div>
					<div class="form-group">
						<label for="email" class="col-sm-2 control-label">E-mail</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="email" name="email" placeholder="példa@mail.com">
							<?php echo "<p class='text-danger'>$errEmail</p>"; ?>
						</div>
					</div>
					<div class="form-group">
						<label for="uzenet" class="col-sm-2 control-label">Üzenet</label>
						<div class="col-sm-10">
							<textarea class="form-control" rows="4" name="uzenet"></textarea>
							<?php echo "<p class='text-danger'>$errUzenet</p>"; ?>
						</div>
					</div>
					<div class="form-group">
						<label for="ellenorzo" class="col-sm-2 control-label">2 + 3 = ?</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="ellenorzo" name="ellenorzo" placeholder="A válaszod">
							<?php echo "<p class='text-danger'>$errOsszeg</p>"; ?>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-10 col-sm-offset-2">
							<input id="submit" name="submit" type="submit" value="Send" class="btn btn-success">
						</div>
					</div>
					
					<div class="form-group">
						<div class="col-sm-10 col-sm-offset-2">
							<?php echo $eredmeny; ?>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>   
  </body>
</html>