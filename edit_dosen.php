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
  $nip = $_POST['nip'];
  $nama = $_POST['nama'];
  $alamat = $_POST['alamat'];
  $jabatan_akademik = $_POST['jabatan_akademik'];
  $prodi = $_POST['prodi'];

  //insert user into table
  $result = mysqli_query($connection, "UPDATE dosen SET  nip='$nip', nama='$nama', alamat='$alamat', jabatan_akademik='$jabatan_akademik', prodi='$prodi' WHERE nip='$nip'");

  echo '<div class="alert alert-primary" role="alert">Data user berhasil diperbaharui !
  </div>';

  header("Location: index.php");
  }
  ?>

  <?php
  //Display selected dosen based on nip
  $nip = $_GET['nip'];

  //fatch data user based on id
  $result = mysqli_query($connection, "SELECT * FROM dosen WHERE nip='$nip'");

  while ($data_dosen = mysqli_fetch_array($result)) {
    $nip = $data_dosen['nip'];
    $nama = $data_dosen['nama'];
    $alamat = $data_dosen['alamat'];
    $jabatan_akademik = $data_dosen['jabatan_akademik'];
    $prodi = $data_dosen['prodi'];
  }
  ?>
  <!-- Contact Section Form -->
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
          <form action="edit_dosen.php" method="post">
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>NIP</label>
                <input class="form-control" id="nip" name="nip" type="text" value='<?php echo $nip; ?>' required="required" >
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Nama</label>
                <input class="form-control" id="nama" name="nama" type="text" value='<?php echo $nama; ?>' required="required"> 
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Alamat</label>
                <input class="form-control" id="alamat" name="alamat" type="text" value='<?php echo $alamat; ?>' required="required"> 
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Jabatan Akademik</label>
                <input class="form-control" id="jabatan_akademik" name="jabatan_akademik" type="text" value='<?php echo $jabatan_akademik; ?>' required="required">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Program Studi</label>
                <input class="form-control" id="prodi" name="prodi" type="text" value='<?php echo $prodi; ?>' required="required" >
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <br>
            <div class="form-group">
              <input type="hidden" name="nip" value='<?php echo $_GET['nip']; ?>'>
              <input type="submit" name="update" value="update" class="btn btn-primary btn-xl">
              </input>
              <a href="index.php" class="btn btn-secondary btn-xl">Back</a>
            </div>
          </form>