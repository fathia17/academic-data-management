<?php
include_once 'koneksi_db.php';

$nip = $_GET['nip'];

//delete users from database on id
$result = mysqli_query($connection, "DELETE FROM dosen WHERE nip='$nip'");

header("Location: index.php");
?>