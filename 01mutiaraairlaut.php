<?php
require "config.php";
$sql = "SELECT produk.*,categori.nm_categori from produk, 
categori WHERE produk.id_categori=categori.id_categori and categori.nm_categori like '%Mutiara Air Laut%'
		";
$query = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<!--[if IE 8]> <html class="ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<title>Mutiara Lombok</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
	<link rel="stylesheet" media="all" href="css/style.css">
	<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>
<body>

	<header id="header">
		<div class="container">
			<a href="index.html" id="logo" title="Mutiara Lombok">Mutiara Lombok</a>
			<div class="right-links">
				<ul>
					<p>Time: <span id="tanggalwaktu"></span></p>
					<script>
					var dt = new Date();
					document.getElementById("tanggalwaktu").innerHTML = (("0"+(dt.getMonth()+1)).slice(-2)) +"/"+ (("0"+dt.getDate()).slice(-2)) +"/"+ (dt.getFullYear()) +" "+ (("0"+dt.getHours()+1).slice(-2)) +":"+ (("0"+dt.getMinutes()+1).slice(-2));
					</script>
				</ul>

				<ul>
					<li><a href="login.php"><span class="ico-account"></span>Login</a></li>
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
				<li><a href="products.html">Koleksi Terbaru</a></li>
				<li><a href="products.html">Kategori Produk</a></li>
				<li><a href="products.html">Jenis Produk</a></li>	
				<li><a href="contact.html">Kontak</a></li>
			</ul>
		</div>
		<!-- / container -->
	</nav>
	<!-- / navigation -->

	<!-- / body -->

	<div id="body">
		<div class="container">
			<div class="last-products">
				<h1>Mutiara Air Tawar</h>
				<section class="products">
				<?php
        $no = 1;
while($isi = mysqli_fetch_object($query)){
        ?>
        <article>
			<img src="<?= "file/". $isi->poto ?>" alt="">
			<h3><?=$isi->nm_categori;?></h3>
			<h4><?=$isi->deskripsi?></h4>
			<h5><?=$isi->harga?></h5>
			<a href="cart.html" class="btn-add">Add to cart</a>
			</article>
          
        <?php } ?>
				
				
				<article style="background-image: url(images/4.jpg)">
					<a href="#" class="table">
						<div class="cell">
							<div class="text">
								<h4>culpa qui officia</h4>
								<hr>
								<h3>magnam aliquam</h3>
							</div>
						</div>
					</a>
				</article>
			</section>
		</div>
		<!-- / container -->
	</div>
	<!-- / body -->

	<footer id="footer">
		<div class="container">
			<div class="cols">
				<div class="col">
					<h3>Frequently Asked Questions</h3>
					<ul>
						<li><a href="#">Fusce eget dolor adipiscing </a></li>
						<li><a href="#">Posuere nisl eu venenatis gravida</a></li>
						<li><a href="#">Morbi dictum ligula mattis</a></li>
						<li><a href="#">Etiam diam vel dolor luctus dapibus</a></li>
						<li><a href="#">Vestibulum ultrices magna </a></li>
					</ul>
				</div>
				<div class="col media">
					<h3>Social media</h3>
					<ul class="social">
						<li><a href="https://web.facebook.com/FitrimutiaraLombokk/?_rdc=1&_rdr"><span class="ico ico-fb"></span>Facebook</a></li>
						<li><a href="#"><span class="ico ico-tw"></span>Twitter</a></li>
						<li><a href="#"><span class="ico ico-gp"></span>Instagram</a></li>
						<li><a href="#"><span class="ico ico-pi"></span>shopee</a></li>
					</ul>
				</div>
				<div class="col contact">
					<h3>Contact us</h3>
					<p>Fitri Mutiara Lombok<br>Kode Pos 83112, Jl. Tanggul Lingkungan Sukaraja Timur No.22, Central Ampenan, Ampenan, Mataram City, West Nusa Tenggara<br>Indonesia</p>
					<p><span class="ico ico-em"></span><a href="#">pi2t_ris@yahoo.com</a></p>
					<p><span class="ico ico-ph"></span>0812-3614-3339</p>
				</div>
				<div class="col newsletter">
					<h3>Join our newsletter</h3>
					<p>Sed ut perspiciatis unde omnis iste natus sit voluptatem accusantium doloremque laudantium.</p>
					<form action="#">
						<input type="text" placeholder="Your email address...">
						<button type="submit"></button>
					</form>
				</div>
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
</body>
</html>
