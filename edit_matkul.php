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
 $kode = $_POST['kode'];
  $matakuliah = $_POST['matakuliah'];
  $sks = $_POST['sks'];
 
  //insert user into table
  $result = mysqli_query($connection, "UPDATE matakuliah SET  kode='$kode', nama_matkul='$matakuliah', sks='$sks' WHERE kode='$kode'");
 
  echo '<div class="alert alert-primary" role="alert">Data MAta Kuliah berhasil diperbaharui !
  </div>';
 
  header("Location: index.php");
  }
  ?>
 
  <?php
  //Display selected dosen based on nip
  $kode = $_GET['kode'];
 
  //fatch data user based on id
  $matkul = mysqli_query($connection, "SELECT * FROM matakuliah WHERE kode='$kode'");
 
  while ($data_matkul = mysqli_fetch_array($matkul)) {
    $kode = $data_matkul['kode'];
    $matakuliah = $data_matkul['nama_matkul'];
    $sks = $data_matkul['sks'];
  }
  ?>
  <!-- Contact Section Form -->
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
          <form action="edit_matkul.php" method="post">
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Kode</label>
                <input class="form-control" id="kode" name="matakuliah" type="text" value='<?php echo $kode; ?>' required="required" >
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Nama Mata Kuliah</label>
                <input class="form-control" id="nama" name="matakuliah" type="text" value='<?php echo $matakuliah; ?>' required="required"> 
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>SKS</label>
                <input class="form-control" id="alamat" name="sks" type="text" value='<?php echo $sks; ?>' required="required"> 
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <br>
            <div class="form-group">
              <input type="hidden" name="kode" value='<?php echo $_GET['kode']; ?>'>
              <input type="submit" name="update" value="update" class="btn btn-primary btn-xl">
              </input>
              <a href="index.php" class="btn btn-secondary btn-xl">Back</a>
            </div>
          </form>