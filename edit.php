<?php 
require 'config.php';
if (isset($_POST["update"])) {
    $id = $_POST['id'];
    $jenis = $_POST['jenis'];
    $produk = $_POST['produk'];
    $harga = $_POST['harga'];
    $deskripsi =  mysqli_real_escape_string($conn, $_POST['deskripsi']);
    $stok = $_POST['stok'];
    $nama = $_FILES['berkas']['name'];


    if ($nama != "") {
        $file_tmp = $_FILES['berkas']['tmp_name'];
        $namabaru = $_FILES['berkas']['name'];
        move_uploaded_file($file_tmp, 'file/'.$namabaru);
    }
    
    $sql = "UPDATE produk SET id_categori='$jenis', id_jenisproduk='$produk', harga='$harga',deskripsi='$deskripsi',poto='$namabaru',stok='$stok' WHERE id_produk = '$id'";
    try {
		$result = mysqli_query($conn, $sql);
		if(!$result){
			$e = mysqli_error($conn);
			throw new Exception($e);
		}else{
			header("location: admin/pages/tables/basic-table.php");
		}
	} catch (\Exception $th) {
		echo $e;
	}
} 
else{
	echo "error";

}