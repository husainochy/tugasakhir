<?php
require "config.php";
$sql = "select produk.*, categori.nm_categori, jenis_produk.nm_jenisproduk  
        from produk, categori, jenis_produk 
        where 
        produk.id_categori=categori.id_categori
        and
        produk.id_jenisproduk=jenis_produk.id_jenisproduk
        ";
$query = mysqli_query($conn, $sql);
?>
<html>
  <head>
    <title>Action PHP</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    
    <link rel="stylesheet" href="style.css">
  </head>

  <body>
    
    <!-- <div id="profile"> -->

      <div class="container" style="width: 100%;">

        <div class="row d-flex justify-content-center">
        <li><a href="inputdata.php"><span class="ico-account"></span>Tambah Data</a></li>
        <a href="inputdata.php" class="btn">Tambah Data</a>
        <a href="logout.php" class="btn">Logout</a>
        <div class="table-responsive">
          
<table class="table">
    <thead>
        <tr>
            <th>No</th>
            <th>Kategori</th>
            <th>Jenis</th>
            <th>Harga</th>
            <th>Deskripsi</th>
            <th>Gambar</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
while($isi = mysqli_fetch_object($query)){
        ?>
        <tr>
            <td><?=$no++;?></td>
            <td><?=$isi->nm_categori;?></td>
            <td><?=$isi->nm_jenisproduk;?></td>
            <td><?=$isi->harga?></td>
            <td><?=$isi->deskripsi?></td>
            <td> 
            <img src="<?= "file/". $isi->poto ?>" class="img-fluid" style="width: 100px;"/>            
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>
</div>

          </div>

        </div>
      
      </div>

    <!-- </div> -->

  </body>
</html>