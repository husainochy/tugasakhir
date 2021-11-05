<?php
require "config.php";
$categori = "select * from categori";
$q = mysqli_query($conn, $categori);

$jenis = "select * from jenis_produk";
$q2 = mysqli_query($conn, $jenis);
?>
<html>
  <head>
    <title>Input form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <div id="form" class="pt-5">
      
      <div class="container">
        <div class="row d-flex justify-content-center">
          <div class="col col-8 p-4 bg-light">
            <form action="action.php" method="POST">
              <div class="form-group mb-2">
			  </div>
			  <label for="name"><h3>Input Data Mutiara Lombok</h3></label>

              <div class="form-group mb-2">
                <label for="mutiara">Jenis Mutiara</label>
                <select name="jenis" id="mutiara" class="form-control">
                  <option value="">**Pilih Jenis Mutiara**</option>
                  <?php
                  while($isi = mysqli_fetch_object($q)){
                  ?>
                    <option value="<?=$isi->id_categori;?>"><?=$isi->nm_categori;?></option> 
                  <?php } ?>				  
                </select>
              </div>

              <div class="form-group mb-2">
                <label for="perhiasan">Jenis Perhiasan</label>
                <select name="produk" id="perhiasan" class="form-control">
                  <option value="">**Pilih Jenis Mutiara**</option>
				  <?php
				  while($isi = mysqli_fetch_object($q2)){
				  ?>
                  <option value="<?=$isi->id_jenisproduk;?>"><?=$isi->nm_jenisproduk;?></option> 
				  <?php } ?>				
				  </select>
              </div>
				
				<div class="form-group mb-2">
					<label for="harga">Harga</label>
					<input name="harga" type="text" id="harga" class="form-control" placeholder="Harga" required>
				</div>
			                
				<div class="form-group mb-2">
					<label for="deskripsi">Deskripsi</label>
					<textarea name="deskripsi" id="deskripsi" rows="3" class="form-control"></textarea>
				</div>
				
        Pilih Gambar Perhiasan: <input type="file" name="berkas" />
        <input type="submit" name="upload" value="upload" />

              <input name="submit" type="submit" value="Kirim" class="btn btn-primary">
			  <a href="logout.php" class="btn">Logout</a>
            
			</form>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>