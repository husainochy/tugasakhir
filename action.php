<?php 
include 'config.php';
if (isset($_POST["submit"])) {
  
	$jenis = $_POST['jenis'];
	$produk = $_POST['produk'];
	$harga = $_POST['harga'];
	$deskripsi = $_POST['deskripsi'];
	$file_tmp = $_FILES['berkas']['tmp_name'];
	$nama = $_FILES['berkas']['name'];
	move_uploaded_file($file_tmp, 'file/'.$nama);
	
	$sql = "INSERT into produk VALUES(NULL, '$jenis','$produk','$harga', '$deskripsi', '$nama')";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    header("Location: semuadata.php");
} 

?>
