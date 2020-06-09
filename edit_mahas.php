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

  if (isset($_POST['Submit'])){
  $nrp = $_POST['nrp'];
  $nama = $_POST['nama'];
  $tanggal_lahir = $_POST['tanggal_lahir'];
  $jenis_kelamin = $_POST['jenis_kelamin'];
  $id_prodi = $_POST['id_prodi'];
  //insert user into table
  $result = mysqli_query($connection, "UPDATE mahasiswa SET  nrp='$nrp', nama='$nama', tanggal_lahir='$tanggal_lahir', jenis_kelamin='$jenis_kelamin', id_prodi='$id_prodi' WHERE nrp='$nrp'");

  echo '<div class="alert alert-primary" role="alert">Data Mahasiswa berhasil diperbaharui !
  </div>';

  header("Location: index.php");
  }
  ?>

  <?php
  //Display selected dosen based on nip
  $nrp = $_GET['nrp'];

  //fatch data user based on id
  $mahasiswa = mysqli_query($connection, "SELECT * FROM mahasiswa WHERE nrp='$nrp'");

  while ($data_mahas = mysqli_fetch_array($mahasiswa)) {
    $nrp = $data_mahas['nrp'];
    $nama = $data_mahas['nama'];
    $jenis_kelamin = $data_mahas['jenis_kelamin'];
    $alamat = $data_mahas['tanggal_lahir'];
    $id_prodi = $_POST['id_prodi'];
    
  }
  ?>
  <!-- Contact Section Form -->
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
          <form action="edit_mahas.php" method="post" ">
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>NRP</label>
                <input class="form-control" id="nrp" name="nrp" type="text" placeholder="Masukan NRP" required="required" >
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Nama</label>
                <input class="form-control" id="nama" name="nama" type="text" placeholder="Masukan Nama" required="required"> 
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Tanggal Lahir</label>
                <input class="form-control datepicker" name="tanggal_lahir" type="text" placeholder="Masukan Tanggal Lahir" required="required"> 
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <label>Jenis Kelamin</label>
              <div class="form-check">
              <input class="form-check-input" type="radio" name="jenis_kelamin" values="L" placeholder="Masukan Nama" checked> 
              <label class="form-check-label">
              <p class="help-block text-danger"></p>
              Laki - laki
            </label>
          </div>
          <div class="control-group">
              <label>Jenis Kelamin</label>
              <div class="form-check">
              <input class="form-check-input" type="radio" name="jenis_kelamin" values="P" placeholder="Masukan Nama" checked> 
              <label class="form-check-label">
              <p class="help-block text-danger"></p>
              Perempuan
            </label>
          </div>
          <div class="control-group">
            <div>
              <label>Progaram Studi</label>
              <select name="id_prodi" class="form-control">
                <option value="">--Pilih Program Studi--</option>--
                <?php
                while ($data_prodi = mysqli_fetch_array($result_program_studi)){
                  echo"<option value=".$data_prodi['id_prodi'].">".$data_prodi['nama_prodi']."</option>";
                }
                ?>
              </select>
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <br>
            <div class="form-group">
              <input type="hidden" name="nrp" value='<?php echo $_GET['nrp']; ?>'>
              <input type="submit" name="update" value="update" class="btn btn-primary btn-xl">
              </input>
              <a href="index.php" class="btn btn-secondary btn-xl">Back</a>
            </div>
          </form>