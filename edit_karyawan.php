<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Academic Data Management</title>

  <link rel = "shortcut icon" type="image/x-icon" href="img/web_icon.png"/>

  <!-- Custom fonts for this theme -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

  <!-- Theme CSS -->
  <link href="css/freelancer.min.css" rel="stylesheet">

</head>

<body id="page-top">
  <?php
  session_start();
  if($_SESSION['status']!="login"){
    header("location:login.php?pesan=belum_login");
  }
  ?>

<?php

include_once("koneksi_db.php");

  if (isset($_POST['update'])){
  $id_karyawan = $_POST['id_karyawan'];
  $nama_karyawan = $_POST['nama_karyawan'];
  $no_telp = $_POST['no_telp'];
  $divisi = $_POST['divisi'];

  //insert user into table
  $result = mysqli_query($connection, "UPDATE karyawan SET  id_karyawan='$id_karyawan', nama_karyawan='$nama_karyawan', no_telp='$no_telp', divisi='$divisi' WHERE id_karyawan='$id_karyawan'");

  echo '<div class="alert alert-primary" role="alert">Data user berhasil diperbaharui !
  </div>';

  header("Location: index.php");
  }
  ?>

  <?php
  //Display selected dosen based on nip
  $id_karyawan = $_GET['id_karyawan'];

  //fatch data user based on id
  $result = mysqli_query($connection, "SELECT * FROM karyawan WHERE id_karyawan='$id_karyawan'");

  while ($data_karyawan = mysqli_fetch_array($result)) {
    $id_karyawan = $data_karyawan['id_karyawan'];
    $nama_karyawan = $data_karyawan['nama_karyawan'];
    $no_telp = $data_karyawan['no_telp'];
    $divisi = $data_karyawan['divisi'];
  }
  ?>
  <!-- Contact Section Form -->
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
          <form action="edit_karyawan.php" method="post">
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>ID Karyawan</label>
                <input class="form-control" id="id_karyawan" name="id_karyawan" type="text" value='<?php echo $id_karyawan; ?>' required="required" >
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Nama</label>
                <input class="form-control" id="nama_karyawan" name="nama_karyawan" type="text" value='<?php echo $nama_karyawan; ?>' required="required"> 
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>No Telp</label>
                <input class="form-control" id="no_telp" name="no_telp" type="text" value='<?php echo $no_telp; ?>' required="required"> 
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Divisi</label>
                <input class="form-control" id="divisi" name="divisi" type="text" value='<?php echo $divisi; ?>' required="required">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <br>
            <div class="form-group">
              <input type="hidden" name="id_karyawan" value='<?php echo $_GET['id_karyawan']; ?>'>
              <input type="submit" name="update" value="update" class="btn btn-primary btn-xl">
              </input>
              <a href="index.php" class="btn btn-secondary btn-xl">Back</a>
            </div>
          </form>