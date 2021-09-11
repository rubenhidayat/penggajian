<?php 
  session_start();
  if($_SESSION['status']!="login"){
    header("Location: login_pns.php?=anda-belum-login");
  }
  ?>
<?php  
include('includes/dbh.inc.php');

$kode_golongan = $_GET['kode_golongan'];

$sql = "SELECT * FROM golongan_pns WHERE kode_golongan='$kode_golongan'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
	while ($row = mysqli_fetch_assoc($result)) {
?> 

<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>Dashio - Bootstrap Admin Template</title>

  <!-- Favicons -->
  <link href="img/logo.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">
  
  <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
</head>

<body>
  <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
  <div id="login-page">
    <div class="container">
      <form class="form-login" action="includes/edit_golongan_pns.inc.php?kode_golongan=<?php echo"".$kode_golongan?>" method="POST">
        <h2 class="form-login-heading">Edit Data Golongan</h2>
        <div class="login-wrap">
                <input type="text" readonly name="kode_golongan" class="form-control" value="<?php echo"".$row['kode_golongan']?>" placeholder="Kode Golongan/MKG" autofocus>
                <br>
                <input type="text" name="nama_golongan" class="form-control" value="<?php echo"".$row['nama_golongan']?>" placeholder="Golongan" autofocus>
                <br>
                <input type="number" name="mkg" class="form-control" value="<?php echo"".$row['mkg']?>"placeholder="MKG" autofocus>
                <br>
                 <input type="number" name="gapok" class="form-control" value="<?php echo"".$row['gapok']?>"placeholder="Gaji Pokok" autofocus>
                <br>
                <input type="number" name="tj_suami_istri" class="form-control" value="<?php echo"".$row['tj_suami_istri']?>" placeholder="Gaji Suami/Istri" autofocus>
                <br>
                <input type="number" name="tj_anak" class="form-control" value="<?php echo"".$row['tj_anak']?>" placeholder="Tunjangan Anak" autofocus>
                <br>
                <input type="number" name="tj_fungsional" class="form-control" value="<?php echo"".$row['tj_fungsional']?>" placeholder="Tunjangan Fungsional" autofocus>
                <br>
                <input type="number" name="pot_tp" class="form-control" value="<?php echo"".$row['pot_tp']?>" placeholder="Potongan" autofocus>
                <br>
                
                <!--<input type="password" name="pwd2" class="form-control" placeholder="Password">-->
                <button class="btn btn-theme btn-block" type="submit" name="submit">Tambah</button>
                </form>
                <a href="admin_pns.php">home</a><br>
                                <hr>  
         
          </div>
        </div>
        <!-- Modal -->
       
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <!--BACKSTRETCH-->
  <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
  <script type="text/javascript" src="lib/jquery.backstretch.min.js"></script>
  <script>
    $.backstretch("img/login-bg.jpg", {
      speed: 500
    });
  </script>
</body>

<?php
	}
}
  ?>