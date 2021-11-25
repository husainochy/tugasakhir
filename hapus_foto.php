<?php

require_once("config.php");

//Mendapatkan Data NIS
if( isset($_GET["id_produk"])) $id_barang = $_GET["id_produk"];
else{
    echo "ID Barang Tidak Ditemukan! <a href='semuadata.php'>Kembali</a>";
    exit();
}

//Query Get Data Siswa
$query = "SELECT * FROM barang WHERE id_barang = '{$id_produk}'";

//Eksekusi Query
$result = mysqli_query($mysqli, $query);

//Fetching Data
foreach( $result as $barang){
    <td><? $no++;?></td>
    <td><?=$isi->nm_categori;?></td>
    <td><?=$isi->nm_jenisproduk;?></td>
    <td><?=$isi->harga?></td>
    <td><?=$isi->deskripsi?></td>
    <td> 
    <img src="<?= "file/". $isi->poto ?>" class="img-fluid" style="width: 100px;"/>            
    </td>
}

if( !is_null($foto) && !empty($isi) ){
    $remove = unlink($isi);

    if($remove){
        //Menyiapkan Query MySQL untuk dieksekusi
        $query = "UPDATE produk SET $isi = NULL WHERE id_produk = '{$id_barang}'";

        //Mengeksekusi Query
        $insert = mysqli_query($mysqli, $query);
    }
}

header("Location: form_edit.php?id_produk={$id_produk}");
?>