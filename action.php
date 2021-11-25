<?php 
require 'config.php';
if (isset($_POST["submit"])) {
	$jenis = $_POST['jenis'];
	$produk = $_POST['produk'];
	$harga = $_POST['harga'];
	$deskripsi =  mysqli_real_escape_string($conn, $_POST['deskripsi']);
	$stok = $_POST['stok'];
	$file_tmp = $_FILES['berkas']['tmp_name'];
	$nama = $_FILES['berkas']['name'];
	move_uploaded_file($file_tmp, 'file/'.$nama);
	
	$sql = "INSERT INTO produk VALUES(Null,'$jenis','$produk','$harga','$deskripsi', '$nama','$stok')";
	echo $sql;
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

?>
