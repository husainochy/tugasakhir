<?php 
include 'config.php';
if (isset($_POST["submit"])) {
  
	$jenis = $_POST['jenis'];
	$produk = $_POST['produk'];
	$harga = $_POST['harga'];
	$deskripsi = $_POST['deskripsi'];
  
	$sql = "INSERT into produk VALUES(NULL, '$jenis','$produk','$harga', '$deskripsi', '-')";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    header("Location: semuadata.php");
} 

?>
