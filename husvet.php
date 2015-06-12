<!--
	Húsvét napjának kiszámolása adott évben.
	
	Készítette: Urbán Norbert.
	Verzió: 1.0
-->

<?php
	if (isset($_GET['evmegadas'])) {
		if($_GET['evmegadas'] > 1900 && $_GET['evmegadas'] < 2100)
			$E = $_GET['evmegadas'];
	}
	else
		$E = 2005;
	
	$T = $E;
	
	function evSzam(){
		global $T;
		print $T;
	}
		 
	function husvet(){
		global $T;
		$A = $T % 19;
		$B = $T % 4;
		$C = $T % 7;
		$D = (19 * $A + 24) % 30;
		$E = (2 * $B + 4 * $C + 6 * $D + 5) % 7;
		$H = 22 + $D + $E;
		if($H <= 31) {
            print "március $H.";
        }
        elseif($E==6 && $D==29){
            $H = 50;
            $F = $H - 31;
            print "április $F.";
        }
        elseif($E==6 && $D==28 && $A>10) {
            $H = 49;
            $F = $H - 31;
            print "április $F.";
        }
        else {
            $F = $H - 31;
            print "április $F.";
		}
	}
?>

<!DOCTYPE html>
<html lang="hu">
<head>
	<meta charset="utf-8">
	<title>Húsvét napja</title>
	<meta name="description" content="Húsvét napjának kiszámolása">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
</head>

<body>

	<header>
		<div class="jumbotron">
			<div class="container">
				<h2>
					<?php 
						evSzam();
					?>. évi húsvét napja
				</h2>
			</div> 
		</div> 
	</header>
		
	<div class="container">
		<div class="row">
			<div class="col-lg-3">
				<div class="well">Húsvét napja 
					<?php
						husvet();
					?>
				</div>
			</div>
		</div>
	</div>
		
	<footer>
		<div class="container">
			<p> <small><a href="http://hu.wikipedia.org/wiki/H%C3%BAsv%C3%A9t">Olvass</a> a húsvétról</small></p>
		</div>
	</footer>
</body>	
</html>