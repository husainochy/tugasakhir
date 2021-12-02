<?php 
 
$server = "jongkreatif.com";
$user = "u5250287_fitrimutiaralombok";
$pass = "fitrimutiaralombok1234";
$database = "u5250287_fitrimutiaralombok";
 
$conn = mysqli_connect($server, $user, $pass, $database);
 
if (!$conn) {
    die("<script>alert('Gagal tersambung dengan database.')</script>");
}
 
?>