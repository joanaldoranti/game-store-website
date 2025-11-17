<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header('Location: fr_login.php');
    exit();
}

include('condb.php');
include('includes/header.php');
include('includes/navbarAdmin.php');

if (!isset($_SESSION['user_id'])) {
    header("Location: fr_login.php");
    exit();
}

$query = "SELECT * FROM users";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}
?>

<main style="background-image: linear-gradient(rgba(0, 0, 0, 0.9), rgba(0, 0, 0, 0.9), rgba(11, 21, 33, 0.9), rgba(11, 21, 33, 1)),
    url(images/scifi-2.jpg); background-size: cover; background-position: top; height: 100vh;">
    <div class="container pb-5 pt-5 table-responsive">
        <h1 class="text-light text-center mb-4">Daftar Pengguna Terdaftar</h1>
        
        <table class="table text-light" style="background-color:#091b29">
            <thead>
                <tr class="text-center h6">
                    <th class="p-3">ID Pengguna</th>
                    <th class="p-3">Email</th>
                    <th class="p-3">Username</th>
                    <th class="p-3">Role</th>
                    <th class="p-3">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr class="text-center">
                        <td class="p-3"><?= $row['id'] ?></td>
                        <td class="p-3"><?= $row['email'] ?></td>
                        <td class="p-3"><?= $row['username'] ?></td>
                        <td class="p-3"><?= $row['role'] ?></td>
                        <td class="p-3">
                            <a href="edit_user.php?id=<?= $row['id'] ?>" class="btn btn-warning rounded-pill">EDIT</a>
                            <a href="delete_user.php?id=<?= $row['id'] ?>" class="btn btn-danger rounded-pill" onclick="Del(this.href);return false;">DELETE</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</main>


<script src="js/bootstrap.bundle.min.js"></script>

<script language="Javascript">
    function Del(mypage) {
        var agree = confirm("Apakah mau menghapus pengguna tersebut?    ");
        if (agree) {
            window.location = mypage;
        }
    }
</script>

<?php include 'includes/footer.php'; ?>
