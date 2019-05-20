<?php

$firstChar = mb_substr($_SESSION['givenname'], 0, 1, "UTF-8");
$secChar = mb_substr($_SESSION['familyname'], 0, 1, "UTF-8");

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="../css/style.css">
	<link rel="stylesheet" href="../../css/bootstrap-4.3.1/css/bootstrap.min.css">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">

	<title>KaraOK!</title>

	<script src="https://apis.google.com/js/platform.js"></script>
</head>

<body>
	<header>
		<nav id="navbar" class="navbar navbar-expand-md fixed-top nav-custom">
			<a class="navbar-brand" href="homepage.php"><img class="home-logo" src="../images/logo-karaoke.png"></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
				<i class="fas fa-bars"></i>
			</button>

			<div class="collapse navbar-collapse" id="navbarCollapse">
				<form class="form-inline" method="post" action="search-result.php">
					<input class="form-control mr-sm-6 search" id="search" name="search" type="search" placeholder="Search songs......" aria-label="Search" style="width:600px;">
					<button class="btn btn-outline-success my-2 my-sm-0" name="submit" id="submit" type="submit" hidden="hidden">Search song...</button>
				</form>
				<ul class="navbar-nav ml-auto">
					<li class="nav-item active">
						<a class="nav-link nav-home" href="homepage.php">Home <span class="sr-only"></span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link nav-home" href="pricing.php">KaraOK Plans <span class="sr-only"></span></a>
					</li>
					<li class="nav-item">
						<div class="dropdown">
							<a class="btn btn-outline-light ml-2 dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Playlist
							</a>
							<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
								<a class="dropdown-item" href="ballad.php">Ballads and Love Songs</a>
								<a class="dropdown-item" href="coachella.php">Coachella 2019</a>
								<a class="dropdown-item" href="hiphop.php">Hip-Hop &amp; Rap</a>
								<a class="dropdown-item" href="partystarter.php">Party Starters</a>
								<a class="dropdown-item" href="poprock.php">Pop Rock</a>
								<a class="dropdown-item" href="randb.php">R&amp;B</a>
							</div>
						</div>
					</li>
<!--
					<li class="nav-item">
						<a class="btn btn-outline-light ml-2 btn-plans" href="#pricing" role="button" aria-expanded="false">
							KaraOK Plans
						</a>
					</li>
-->
					<li class="nav-item">
						<div class="dropdown">
							<a class="btn avatar-size" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<div class="status-avatar-circle">
									<span class="status-initials">
										<?php echo $firstChar . $secChar; ?>
									</span>
								</div>
							</a>
							<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
								<a class="dropdown-item" href="account.php">My Account</a>
								<form class="form-login" method="post" action="logout.php">
									<button name="submitLogout" class="btn btn-outline-light btn-block text-dark" type="submit">Logout Here!</button>
								</form>
							</div>
						</div>
					</li>
				</ul>
			</div>
		</nav>
	</header>
	<main>
