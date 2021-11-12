<?php
require_once("connection.php");

//Mendapatkan data ID Barang
if( isset($_POST["id_barang"])) $id_barang = $_POST["id_barang"];
else{
    echo "ID Barang tidak ditemukan! <a href='index.php'>Kembali</a>";
    exit();
}

//Query Get Data Barang
$query = "SELECT * FROM barang WHERE id_barang = '{$id_barang}'";

//Eksekusi Query
$result = mysqli_query($mysqli, $query);

//Fetching Data
foreach( $result as $barang){
    $foto = $barang["foto"];
    $id_barang = $barang["id_barang"];
    $nama_barang = $barang["nama_barang"];
    $harga = $barang["harga"];

    if( isset($_POST['id_barang'])) $id_barang = $_POST['id_barang'];

    if( isset($_POST['nama_barang'])) $nama_barang = $_POST['nama_barang'];

    if( isset($_POST['harga'])) $harga = $_POST['harga'];

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
    id_barang ='{$id_barang}',
    nama_barang ='{$nama_barang}',
    harga ='{$harga}',
    foto = '{$filepath}'
    WHERE id_barang = '{$id_barang}'";

    //Mengeksekusi MySQL Query
    $update = mysqli_query($mysqli, $query);

    //Menangani Ketika error pada saat eksekusi query
    if( $update == false){
        echo "Error dalam mengubah data. <a href='index.php'>Kembali</a>";
    } else{
        header("Location: index.php");
    }
}

?>