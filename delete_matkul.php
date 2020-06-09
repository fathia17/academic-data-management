<?php
include_once 'koneksi_db.php';

$kode = $_GET['kode'];

//delete users from database on id
$result = mysqli_query($connection, "DELETE FROM matakuliah WHERE kode='$kode'");

header("Location: index.php");
?>