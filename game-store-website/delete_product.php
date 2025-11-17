<?php
include 'condb.php';
$game_name = $_GET['game_name'];
$sql = "DELETE FROM game WHERE game_name = '$game_name' ";
if(mysqli_query($conn,$sql)){
    echo "<script>alert('Produk telah dihapus');</script>";
    echo "<script>window.location = 'show_product.php';</script>";
} else {
    echo "Error : " . $sql . "<br>" , mysqli_error($conn);
    echo "<script>alert('Tidak dapat menghapus produk');</script>";
}

mysqli_close($conn);

?>