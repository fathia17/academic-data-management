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
 
  <!-- Date Picker -->
  <link type="text/css" href="css/datepicker.css" rel="stylesheet">
 
</head>
 
<body id="page-top">
  <?php
  session_start();
  if($_SESSION['status']!="login"){
    header("location:login.php?pesan=belum_login");
  }
  ?>
 
 
<?php
 
include 'koneksi_db.php';
 
//fatch all users data from database
$result_karyawan = mysqli_query($connection, "SELECT * FROM karyawan ORDER BY id_karyawan");
?>
 
<?php
include_once'koneksi_db.php';
 
  if (isset($_POST['Submit'])){
  $id_karyawan = $_POST['id_karyawan'];
  $nama_karyawan = $_POST['nama_karyawan'];
  $no_telp = $_POST['no_telp'];
  $divisi = $_POST['divisi'];
 
  //insert user into table
  $karyawan = mysqli_query($connection, "INSERT INTO karyawan VALUES ('$id_karyawan','$nama_karyawan','$no_telp','$divisi')");
 
  echo '<div class="alert alert-primary" role="alert">Data Mahasiwa berhasil ditambahkan !</div>';
 
  header("Location:index.php");
  }
  ?>
   <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">ACDM</a>
      <button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#add-user">
            Add Karyawan</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <br>
  <br>
  <!-- Contact Section -->
  <section class="page-section" id="add-mahasiswa">
    <div class="container">
 
      <!-- Contact Section Heading -->
      <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Add Karyawan</h2>
 
      <!-- Icon Divider -->
      <div class="divider-custom">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon">
          <i class="fas fa-star"></i>
        </div>
        <div class="divider-custom-line"></div>
      </div>
 
      <!-- Contact Section Form -->
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
          <form action="add_karyawan.php" method="post" ">
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>ID Karyawan</label>
                <input class="form-control" id="id_karyawan" name="id_karyawan" type="text" placeholder="Masukan ID Karyawan" required="required" >
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Nama Karyawan</label>
                <input class="form-control" id="nama_karyawan" name="nama_karyawan" type="text" placeholder="Masukan Nama" required="required"> 
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>No Telp</label>
                <input class="form-control" id="no_telp" name="no_telp" type="text" placeholder="Masukan No Telp" required="required"> 
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Divisi</label>
                <input class="form-control" id="divisi" name="divisi" type="text" placeholder="Masukan Divisi" required="required"> 
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <br>
            <div class="form-group">
              <input type="submit" name="Submit" value="Simpan" class="btn btn-primary btn-xl">                
              </input>
              <a href="index.php" class="btn btn-secondary btn-xl">Back</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
 
  <!-- Footer -->
  <footer class="footer text-center">
    <div class="container">
      <div class="row">
 
        <!-- Footer Location -->
        <div class="col-lg-4 mb-5 mb-lg-0">
          <h4 class="text-uppercase mb-4">Location</h4>
          <p class="lead mb-0">2215 John Daniel Drive
            <br>Clark, MO 65243</p>
        </div>
 
        <!-- Footer Social Icons -->
        <div class="col-lg-4 mb-5 mb-lg-0">
          <h4 class="text-uppercase mb-4">Around the Web</h4>
          <a class="btn btn-outline-light btn-social mx-1" href="#">
            <i class="fab fa-fw fa-facebook-f"></i>
          </a>
          <a class="btn btn-outline-light btn-social mx-1" href="#">
            <i class="fab fa-fw fa-twitter"></i>
          </a>
          <a class="btn btn-outline-light btn-social mx-1" href="#">
            <i class="fab fa-fw fa-linkedin-in"></i>
          </a>
          <a class="btn btn-outline-light btn-social mx-1" href="#">
            <i class="fab fa-fw fa-dribbble"></i>
          </a>
        </div>
 
        <!-- Footer About Text -->
        <div class="col-lg-4">
          <h4 class="text-uppercase mb-4">About Freelancer</h4>
          <p class="lead mb-0">Freelance is a free to use, MIT licensed Bootstrap theme created by
            <a href="http://startbootstrap.com">Start Bootstrap</a>.</p>
        </div>
 
      </div>
    </div>
  </footer>
  <!-- Copyright Section -->
  <section class="copyright py-4 text-center text-white">
    <div class="container">
      <small>Copyright &copy; Your Website 2019</small>
    </div>
  </section>
 
  <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
  <div class="scroll-to-top d-lg-none position-fixed ">
    <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top">
      <i class="fa fa-chevron-up"></i>
    </a>
  </div>
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
 
  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
 
  <!-- Contact Form JavaScript -->
  <script src="js/jqBootstrapValidation.js"></script>
  <script src="js/contact_me.js"></script>
 
  <!-- Custom scripts for this template -->
  <script src="js/freelancer.min.js"></script>
 
  <!-- Date Picker js -->
  <script src="js/bootstrap-datepicker.js"></script>
 
  <script>
    $(function(){
      $('.datepicker').datepicker({
        format:'yyyy-mm-dd'
      });
    });
  </script>
</body>
 
</html>