<?php 
  session_start();
  if($_SESSION['status']!="login"){
    header("Location: login_honor.php?=anda-belum-login");
  }
  ?>
<?php
include('includes/dbh.inc.php');
$id_guru = $_GET['id_guru'];

$sqljabatan = "SELECT * FROM jabatan_honor ";
$resultJabatan = mysqli_query($conn, $sqljabatan);


$sql = "SELECT * FROM guru_honor WHERE id_guru='$id_guru'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  while($row = mysqli_fetch_assoc($result)){
?>
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
  <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
  <div id="login-page">
    <div class="container">
      <form class="form-login" action="includes/edit_guru_honor.inc.php" method="POST">
        <h2 class="form-login-heading">Tambahkan Data Guru</h2>
        <div class="login-wrap">
                <input type="text" name="nuptik" class="form-control" value="<?php echo"".$row['nuptik']?>" placeholder="NUPTIK" autofocus>
                <br>
                 <input type="text" name="nama" class="form-control" value="<?php echo"".$row['nama']?>" placeholder="Nama Lengkap" autofocus>
                <br>
                <select name="kode_jabatan" class="form-control">
                  <option value="">-Kode Jabatan-</option>
                  <?php while ($rowJabatan = mysqli_fetch_assoc($resultJabatan)) {?>
                  <option value="<?php echo $rowJabatan['kode_jabatan']; ?>"><?php echo $rowJabatan['kode_jabatan'];?></option>
                  <?php } ?>       
                </select>
               
                <br>
                <input type="number" name="tunjangan" class="form-control" value="<?php echo"".$row['tunjangan']?>" placeholder="Tunjangan" autofocus>
                <br>
                 <input type="number" name="potongan" class="form-control" value="<?php echo"".$row['potongan']?>" placeholder="Potongan" autofocus>
                <br>
                <!--<input type="password" name="pwd2" class="form-control" placeholder="Password">-->
                <button class="btn btn-theme btn-block" type="submit" name="submit">Tambah</button>
                </form>
                <a href="admin_honor.php">home</a><br>
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

</html>
<?php
}
}
?>
<!--<?php //while ($row = mysql_fetch_array($result)){
        ?>
           <option value="">
             <?php //echo $row['kode_golongan']; ?>
