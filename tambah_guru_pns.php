<?php 
  session_start();
  if($_SESSION['status']!="login"){
    header("Location: login_pns.php?=anda-belum-login");
  }
  ?>
<?php
include('includes/dbh.inc.php');
$sqlgolongan = "SELECT * FROM golongan_pns ORDER BY kode_golongan ASC";
$resultGolongan = mysqli_query($conn, $sqlgolongan);
$sqljabatan = "SELECT * FROM jabatan_pns ORDER BY kode_jabatan DESC";
$resultJabatan = mysqli_query($conn, $sqljabatan);

//$sqlgolongan = "SELECT * FROM golongan_pns ORDER BY kode_golongan ASC ";
//$resultGolongan = mysqli_real_escape_string($conn, $_POST[$sqlgolongan]);?>

<!DOCTYPE html>
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
  <style type="text/css">
      body{
         
          background: url(img/SD-85-1.jpg);
          background-size:     cover;                      
    background-repeat:   no-repeat;
    background-position: all; 
          
        }
    </style>
  <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
  <div id="login-page">
    <div class="container">
      <form class="form-login" action="includes/tambah_guru_pns.inc.php" method="POST">
        <h2 class="form-login-heading">Tambahkan Data Guru</h2>
        <div class="login-wrap">
                <input type="text" name="nip" class="form-control" placeholder="NIP" autofocus>
                <br>
                 <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" autofocus>
                <br>
                <select name="kode_golongan" class="form-control">
                	<option value="">-Golongan/MKG-</option>
                	<?php while ($rowGolongan = mysqli_fetch_assoc($resultGolongan)) {?>
                	<option value="<?php echo $rowGolongan['kode_golongan']; ?>"><?php echo $rowGolongan['kode_golongan'];?></option>
                	<?php } ?>       
                </select>
                <br>
                <select name="kode_jabatan" class="form-control">
                	<option value="">-Kode Jabatan-</option>
                	<?php while ($rowJabatan = mysqli_fetch_assoc($resultJabatan)) {?>
                	<option value="<?php echo $rowJabatan['kode_jabatan']; ?>"><?php echo $rowJabatan['kode_jabatan'];?></option>
                	<?php } ?>       
                </select>
                <br>
                <select name="status_kawin" class="form-control">
                	<option value="">-Status Pernikahan-</option>
                	<option value="Menikah">MENIKAH</option>
                	<option value="Belum Menikah">Belum Menikah</option>
                </select>
                <br>
                <input type="number" name="jumlah_anak" class="form-control" placeholder="Jumlah Anak" autofocus>
                <br>
                 <input type="number" name="jumlah_anggota_keluarga" class="form-control" placeholder="Jumlah Anggota Keluarga" autofocus>
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
 
</body>

</html>
<!--<?php //while ($row = mysql_fetch_array($result)){
				?>
				   <option value="">
				     <?php //echo $row['kode_golongan']; ?>
