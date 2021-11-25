

<?php

include "config.php"; 


$id = $_GET['id_produk']; 
$delete = "delete from produk where id_produk = '$id'";
echo $sql;
try {
    $del = mysqli_query($conn, $delete);
    if($del)
{
    mysqli_close($conn); 
    header("location: admin/pages/tables/basic-table.php"); 
    exit;	
}
else
{
    $error = mysqli_error($conn);
    throw new Exception($error);
    
}
} catch (\Exception $e) {
    echo $error;
}
 
print_r ($_GET);

?>

