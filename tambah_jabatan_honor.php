<?php 
  session_start();
  if($_SESSION['status']!="login"){
    header("Location: login_honor.php?=anda-belum-login");
  }
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
      <form class="form-login" action="includes/tambah_jabatan_honor.inc.php" method="POST">
        <h2 class="form-login-heading">Tambahkan Jabatan</h2>
            <div class="login-wrap">
                <input type="text" name="kode_jabatan" class="form-control" placeholder="kode_jabatan" autofocus>
                <br>
                <input type="text" name="nama_jabatan" class="form-control" placeholder="Nama Jabatan" autofocus>
                <br>
                <input type="number" name="gapok" class="form-control" placeholder="gapok" autofocus>
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
  
</body>

</html>
