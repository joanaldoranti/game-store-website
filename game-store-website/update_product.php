<?php
include 'condb.php';
$game_name = $_POST['game_name'];
$publisher = $_POST['publisher'];
$genre_id = $_POST['genre'];
$description = $_POST['description'];
$price = $_POST['price'];

$sql="UPDATE game set game_name='$game_name', publisher='$publisher', description='$description', price='$price' WHERE game_name='$game_name' ";
$result=mysqli_query($conn,$sql);
if($result){
    echo "<script>alert('Berhasil di update');</script> ";
    echo "<script>window.location='show_product.php';</script>";
}
else{
    echo "<script> alert('Gagal'); </script>";
}
mysqli_close($conn)
?>