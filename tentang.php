<?php
require "config.php";
date_default_timezone_set('Asia/Makassar');
$sql = "select produk.*, categori.nm_categori, jenis_produk.nm_jenisproduk  
        from produk, categori, jenis_produk 
        where 
        produk.id_categori=categori.id_categori
        and
        produk.id_jenisproduk=jenis_produk.id_jenisproduk
        ";
$query = mysqli_query($conn, $sql);

?>
<!DOCTYPE php>
<!--[if IE 8]> <php class="ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <php lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<title>Fitri Mutiara Lombok</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" media="all" href="css/style.css">
	<!--[if lt IE 9]>
		<script src="http://php5shiv.googlecode.com/svn/trunk/php5.js"></script>
	<![endif]-->
</head>
<body>

	<header id="header">
		<div class="container">
			<a href="index.php" id="logo" title="Diana’s jewelry">Fitri Mutiara Lombok</a>
			<div class="right-links">
				<ul>
					<li><a href="login.php"><span class="ico-account"></span>Login</a></li>
					<li><a href="#"><h2 style="font-size: 17px; font-family: arial;"> <?= date("Y-m-d / H:i"); ?></h2></li>
				</ul>
			</div>
		</div>
		<!-- / container -->
	</header>
	<!-- / header -->

	<nav id="menu">
		<div class="container">
			<div class="trigger"></div>
			<ul>
                <li><a href="index.php">Home</a></li>
				<li><a href="tentang.php">Tentang Mutiara</a></li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Kategori Produk
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<?php 
						$categori = mysqli_query($conn, "SELECT * FROM categori");
                        while ($categorirow = mysqli_fetch_object($categori)) {
                            ?>
						<a class="dropdown-item" href="product.php?id_category=<?= $categorirow->id_categori; ?>"><?= $categorirow->nm_categori; ?></a>
						<?php
                        	} 
						?>
					</div>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						JENIS PRODUK
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<?php 
						$jenis = mysqli_query($conn, "SELECT * FROM jenis_produk");
                        while ($row = mysqli_fetch_object($jenis)) {
                            ?>
						<a class="dropdown-item" href="jenisproduk.php?id=<?= $row->id_jenisproduk ?>"><?= $row->nm_jenisproduk ?></a>
						<?php
                        	}
						?>
					</div>
				</li>	
				<li><a href="contact.php">Kontak</a></li>
			</ul>
		</div>
		<!-- / container -->
	</nav>


	<!-- / navigation -->

	<!-- / body -->
    <div id="slider" style="width: 100%; height: 100%;">
		<ul>
			<li style="background-image: url(images/0.jpg)">
				<h3>Make your life better</h3>
				<h2>Genuine diamonds</h2>
			</li>
			<li class="purple" style="background-image: url(images/01.jpg)">
				<h3>She will say “yes”</h3>
				<h2>engagement ring</h2>
			</li>
			<li class="yellow" style="background-image: url(images/02.jpg)">
				<h3>You deserve to be beauty</h3>
				<h2>golden bracelets</h2>
			</li>
		</ul>
	</div>
	<!-- / body -->

	<footer id="footer">
		<div class="container">
			<div class="cols">

	
					<h3>Contact us</h3>
					<p>Fitri Mutiara Lombok<br>Kode Pos 83112, Jl. Tanggul Lingkungan Sukaraja Timur No.22, Central Ampenan, Ampenan, Mataram City, West Nusa Tenggara<br>Indonesia</p>
					<p><span class="ico ico-em"></span><a href="#">pi2t_ris@yahoo.com</a></p>
					<p><span class="ico ico-ph"></span>0812-3614-3339</p>
		
				
			</div>
			<p class="copy">Copyright 2021 Jong Koding. All rights reserved.</p>
		</div>
		<!-- / container -->
	</footer>
	<!-- / footer -->


	<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
	<script>window.jQuery || document.write("<script src='js/jquery-1.11.1.min.js'>\x3C/script>")</script>
	<script src="js/plugins.js"></script>
	<script src="js/main.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</php>