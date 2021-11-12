<?php
require_once("config.php");

//Mendapatkan data ID Barang
if( isset($_POST["id_barang"])) $id_barang = $_POST["id_barang"];
else{
    echo "ID Barang tidak ditemukan! <a href='index.html'>Kembali</a>";
    exit();
}

//Query Get Data Barang
$query = "SELECT * FROM barang WHERE id_barang = '{$id_barang}'";

//Eksekusi Query
$result = mysqli_query($mysqli, $query);

//Fetching Data
foreach($result as $produk){
    <td><?=$no++;?></td>
    <td><?=$isi->nm_categori;?></td>
    <td><?=$isi->nm_jenisproduk;?></td>
    <td><?=$isi->harga?></td>
    <td><?=$isi->deskripsi?></td>
    <td><img src="<?= "file/". $isi->poto ?>/></td>


    //Mengambil data file upload
    $files = $_FILES['foto'];
    $path = "penyimpanan/";

    //Menangani File Upload
    if( !empty($files['name'])){
        $filepath = $path. $files["name"];
        $upload = move_uploaded_file($files["tmp_name"], $filepath);

        if( $upload ){
            unlink($foto);
        }
    }
    else{
        $filepath = $foto;
        $upload = false;
    }
    //Menangani Error saat Mengupload
    if( $upload !=true && $filepath !=$foto){
        exit("Gagal Mengupload File <a href='form_edit.php?nis={$nis}'>Kembali</a>");

    }

    //Menyiapkan Query MySQL untuk diekssekusi
    $query ="UPDATE barang SET
    nm_categori ='{$nama_categori}',
    nm_jenisproduk ='{$nm_jenisproduk}',
    harga ='{$harga}',
    foto = '{$filepath}'
    WHERE id_barang = '{$id_produk}'";

    //Mengeksekusi MySQL Query
    $update = mysqli_query($mysqli, $query);

    //Menangani Ketika error pada saat eksekusi query
    if( $update == false){
        echo "Error dalam mengubah data. <a href='index.html'>Kembali</a>";
    } else{
        header("Location: index.html");
    }
}

?>