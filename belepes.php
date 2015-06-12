<!--
	Beléptető rendszer.
	
	Készítette: Urbán Norbert.
	Verzió: 1.0
-->

<?php
	$errNev = "";
	$errJelszo = "";
	if(isset($_POST["submit"])) {
		$nev = isset($_POST['nev']) ? $_POST['nev'] : null;
		$jelszo = isset($_POST['jelszo']) ? $_POST['jelszo'] : null;
		
		if (!$_POST['jelszo'] && !$_POST['nev']) {
			echo "<script language='javascript'>
					window.alert('Nem adtál meg azonosítót és jelszót!');
				  </script>";
		}
		
		else if(!$_POST['nev']) {
			echo "<script language='javascript'>
					window.alert('Nem adtál meg azonosítót!');
				  </script>";
		}
		
		else if (!$_POST['jelszo']) {
            echo "<script language='javascript'>
					window.alert('Nem adtál meg jelszót!');
				  </script>";
        }
		
		else {
			$servernev = "localhost";
			$user = "root";
			$pwd = "lol6946lol";
			$conn = new mysqli($servernev, $user, $pwd);
			if(mysqli_connect_error()) {
				echo "<script language='javascript'>
						window.alert('Csatlakozás sikertelen!');
					  </script>";
			}
			
			$db = "practice";
			$select_db = mysqli_select_db($conn, $db);
			
			if(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM belepteto WHERE idlogin='$nev' AND idpass='$jelszo'"))==1) {
				echo "<script language='javascript'>
						window.alert('Belépés sikeres!');
					  </script>";
			}
			else {
				echo "<script language='javascript'>
						window.alert('Belépés sikertelen! Helytelen felhasználónév vagy jelszó!');
					  </script>";
			}
		}
	}
?>

<!DOCTYPE html>
<html lang="hu">
  <head>
    <meta charset="utf-8">
	<title>Bejelentkezés</title>
	<meta name="description" content="Húsvét napjának kiszámolása">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
	<style type="text/css">
		.fo_h1 {
			color: white;
		}
		.control-label {
			font-size: 1.2em;
			color: white;
		}
	</style>
  </head>
  <body style="background: #4169E1">
	<header>
		<div class="container text-center">
			<h1 class="fo_h1">Bejelentkezés</h1>
		</div>
	</header>
	
	<hr/>
	
  	<div class="container">
  		<div class="row">
  			<div class="col-md-4 col-md-offset-4">
				<form class="form-horizontal" role="form" method="post" action="belepes.php">
					<table class="table table-condensed">
						<tbody>
						<tr>
							<td><label class="control-label">Felhasználónév<label></td>
							<td><input type="text" class ="form-control" id="nev" name="nev"></td>
						</tr>
						<tr>
							<td><label class="control-label">Jelszó</label></td>
							<td><input type="password" class="form-control" id="jelszo" name="jelszo"></td>
						</tr>
						<tr>
							<td></td>
							<td><input id="submit" name="submit" type="submit" value="Belépés" class="btn btn-success"></td>
						</tr>
						</tbody>
					</table>
				</form>
			</div>
		</div>
	</div>   
  </body>
</html>