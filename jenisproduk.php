<?php 
require "config.php";
$id = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM ((produk INNER JOIN categori ON produk.id_categori = categori.id_categori ) INNER JOIN jenis_produk ON produk.id_jenisproduk = jenis_produk.id_jenisproduk)
WHERE produk.id_jenisproduk = $id ");  
?>
<!DOCTYPE html>
<!--[if IE 8]> <html class="ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<title>Fitri Mutiara Lombok</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" media="all" href="css/style.css">
	<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>
<body>

	<header id="header">
		<div class="container">
			<a href="index.php" id="logo" title="Mutiara Lombok">Mutiara Lombok</a>
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

	<div id="breadcrumbs">
		<div class="container">
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="https://shopee.co.id/fitri_ummufarih?smtt=0.0.9">Kelik Pembilian di Shopee Fitri Mutiara Lombok</a></li>
			</ul>
		</div>
		<!-- / container -->
	</div>
	<!-- / body -->


				<div id="content">
					<section class="products">
						<?php 
                        while ($row = mysqli_fetch_object($query)) {
                            ?>
						<article>
						<img src="<?= "file/". $row->poto ?>" class="img-fluid" style="width: 180px;"/> 
						<h3><?= $row->nm_jenisproduk; ?></h3>
						<h5><?= $row->nm_categori; ?></h5>
						<h4>Rp. <?= $row->harga ?></h4>
						<h6>Tersedia : <?= $row->stok; ?></h6>
						<a href="https://wa.me/628970836553?text=Saya%20tertarik%20untuk%20membeli%20Produk%20<?= $row->nm_jenisproduk; ?>%20<?= $row->nm_categori; ?>%20Rp.%20 <?= $row->harga ?>%20" class="btn-add">Pesan</a>
						</article>
						<?php
                        }
						?>
					</section>
				</div>
				<!-- / content -->
			</div>
		
		</div>		
		<!-- / container -->
	</div>
	<!-- / body -->

	<footer id="footer">
	<div class="container">
			<div class="cols">
				<h3>Contact us and SOCIAL MEDIA</h3>
				<p>Fitri Mutiara Lombok<br>Kode Pos 83112, Jl. Tanggul Lingkungan Sukaraja Timur No.22, Central Ampenan, Ampenan, Mataram City, West Nusa Tenggara<br>Indonesia</p>
				<p><span class="ico ico-em"></span><a href="#">fitri.mutiaralombok@gmail.com</a></p>
				<p><span class="ico ico-ph"></span>0812-3614-3339</p>
				<p><a href="https://www.facebook.com/fitri.g.mutiara"><span class=""></span>Facebook Fitri Mutiara Lombok</a></p>
				<p><a href="https://www.instagram.com/fitri_mutiaralombok"><span class=""></span>Instagram Fitri Mutiara Lombok</a></p>	
				<p><a href="https://vt.tiktok.com/ZGJUVDLSN/"><span class=""></span>Tiktok Fitri Mutiara Lombok</a></p>
				<p><a href="https://shopee.co.id/fitri_ummufarih?smtt=0.0.9"><span class=""></span>Shopee Fitri Mutiara Lombok</a></p>			
			</div>
			<p class="copy">Copyright Husain Jong Koding 2021</p>
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
</html>
