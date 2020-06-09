<?php
include_once 'koneksi_db.php';

$nrp = $_GET['nrp'];

//delete users from database on id
$result = mysqli_query($connection, "DELETE FROM mahasiswa WHERE nrp='$nrp'");

header("Location: index.php");
?>