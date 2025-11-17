<?php
include 'condb.php';
$game_id = $_GET['cart_id'];

$sql = "DELETE FROM cart WHERE cart_id = '$game_id' ";
if(mysqli_query($conn,$sql)){
    echo "<script>alert('berhasil menghapus');</script>";
    echo "<script>window.location = 'cart.php';</script>";
} else {
    echo "Error : " . $sql . "<br>" , mysqli_error($conn);
    echo "<script>alert('tidak berhasil');</script>";
}

mysqli_close($conn);

?>