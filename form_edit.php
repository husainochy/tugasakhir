<?php
//Pengambilan file koneksi
require_once("config.php");

//Status tidak error
$error = 0;

//Mendapatkan Data ID produk
if( isset($_GET["id_produk"])) $id_produk = $_GET["id_produk"];
else echo "ID produk tidak ditemukan! <a href='index.php'>Kembali</a>";

$query = "SELECT * FROM produk  WHERE  id_produk ='{$id_produk}'";

$result = mysqli_query($mysqli, $query);

foreach( $result as $produk){
    <td><?=$no++;?></td>
    <td><?=$isi->nm_categori;?></td>
    <td><?=$isi->nm_jenisproduk;?></td>
    <td><?=$isi->harga?></td>
    <td><?=$isi->deskripsi?></td>
    <td><img src="<?= "file/". $isi->poto ?>" class="img-fluid" style="width: 100px;"/></td>
      
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko</title>
    <!-- memanggil bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Bootstap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <!-- Memanggil css external -->
    <link href="style.css" rel="stylesheet" />
</head>
<body>
    <!-- Header -->
    <?php
    require('navbar.php');
    ?>
   <div id="form" class="pt-5">

        <div class="container">

            <div class="row d-flex justify-content-center">

                <div class="col col-8 p-4 bg-light">

                    <form action="action_edit.php" method="POST" enctype="multipart/form-data">

                        <?php if(!is_null($foto) && !empty($foto)) :?>
                        <div class="form-group mb-2">
                            <img src="<?=$foto?>" class="preview">
                            <a href="hapus_foto.php?id_produk=<?=$id_produk?>">Hapus Data</a>
                        </div>
                        <?php endif; ?>

                        <div class="form-group mb-2">
                            <label for="foto">Foto</label>
                            <input name="foto" id="foto" class="form-control" type="file">
                        </div>

                        <div class="form-group mb-2">
                            <label for="id_produk">ID produk</label>
                            <input name="id_produk" id="id_produk" value="<?=$id_produk?>" class="form-control" type="text" placeholder="ID produk" required>
                        </div>

                        <div class="form-group mb-2">
                            <label for="name">Nama produk</label>
                            <input name="nama_produk" id="name" value="<?=$nama_produk?>" class="form-control" type="text" placeholder="Nama produk" required>
                        </div>

                        <div class="form-group mb-2">
                            <label for="name">Harga produk</label>
                            <input name="harga" id="tmp_lahir" value="<?=$harga?>" class="form-control" type="text" placeholder="Harga produk" required>
                        </div>

                        <input name="submit" type="submit" value="Kirim" class="btn btn-primary ">

                    </form>

                </div>

            </div>

        </div>

    </div>
    
</body>
</html>