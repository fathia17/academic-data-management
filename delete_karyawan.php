<?php
include_once 'koneksi_db.php';

$id_karyawan = $_GET['id_karyawan'];

//delete users from database on id
$result = mysqli_query($connection, "DELETE FROM karyawan WHERE id_karyawan='$id_karyawan'");

header("Location: index.php");
?>