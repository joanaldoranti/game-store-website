<?php
include 'condb.php';
$game_name = $_GET['game_name'];
$price = $_GET['price'];
$sql="INSERT INTO cart(game_name,price)
VALUES('$game_name','$price')";

if(mysqli_query($conn,$sql)){
    echo "<script>alert('ditambahkan dikeranjang');</script>";
    echo "<script>window.location = 'cart.php';</script>";
} else {
    echo "Error : " . $sql . "<br>" , mysqli_error($conn);
    echo "<script>alert('gagal ditambahkan');</script>";
}
mysqli_close($conn);

?>