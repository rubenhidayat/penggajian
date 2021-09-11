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
  <section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
    <!--header start-->
    <header class="header black-bg">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
      <!--logo start-->
      <a href="admin_honor.php" class="logo"><b>PENGGAJIAN GURU  <span>SD NEGERI 85 PALEMBANG</span></b></a>
      
      
      <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <li>
            <a class="logout" href="includes/logout_honor.inc.php">Logout</a>
          </li>
        </ul>
      </div>

    </header>
    <!--header end-->
    <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
   <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">

          <li class="mt">
            <a class="" href="admin_honor.php">
              <i class="fa fa-dashboard"></i>
              <span>Dashboard</span>
              </a>
          </li>
         

           <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-th"></i>
              <span>Data Jabatan</span>
              </a>
            <ul class="sub">
              <li><a href="data_jabatan_honor.php">Data/Edit Jabatan</a></li>
              <li><a href="tambah_jabatan_honor.php">Tambah Jabatan</a></li>         
            </ul>
          </li>

           <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-th"></i>
              <span>Data Guru Honor</span>
              </a>
            <ul class="sub">
              <li><a href="data_guru_honor.php">Data/Edit Guru</a></li>
              <li><a href="tambah_guru_honor.php">Tambah Guru</a></li>
              
              
            </ul>
          </li>

           <li class="mt">
            <a class="active" href="data_penggajian_honor.php">
              <i class="fa fa-book"></i>
              <span>Penggajian Guru</span>
              </a>
          </li>

          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-book"></i>
              <span>Cetak</span>
              </a>
            <ul class="sub">
              <li><a href="cetak_laporan_honor.php">Cetak Penggajian</a></li>
              <li><a href="cetak_slip_honor.php">Cetak Slip</a></li>
              
              
            </ul>
          </li>

           

          
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
   <section id="main-content">
      <section class="wrapper">
        <!-- mulai coding tahun bulan-->
        <div class="alert alert-info">
           
           <form action="data_penggajian_honor.php" method="POST">
             <select name="bulan">
                <option value="">-Pilih-</option>
                <option value="1">Januari</option>
                <option value="2">Februari</option>
                <option value="3">Maret</option>
                <option value="4">April</option>
                <option value="5">Mei</option>
                <option value="6">Juni</option>
                <option value="7">Juli</option>
                <option value="8">Agustus</option>
                <option value="9">September</option>
                <option value="10">Oktober</option>
                <option value="11">November</option>
                <option value="12">Desember</option>
             </select>
             <select name="tahun">
               <option value="">-Pilih-</option>
                  <?php 
                    $y = date('Y');
                    for ($i=2016; $i <=$y+5 ; $i++) { 
                      echo "<option value='$i'>$i</option>";
                    }
                  ?>
             </select>
               <button type="submit">Cari</button>
               <button type="submit"><a href="tambah_bulan_honor.php">Input</a></button>
               <button type="submit"><a href="slip_gaji_honor.php">Slip Gaji</a></button>
           </form>
           <br>
           <?php
            if ((isset($_POST['bulan']) && $_POST['bulan']!='') && (isset($_POST['tahun']) && $_POST['tahun']!='')) {
              $bulan = $_POST['bulan'];
              $tahun = $_POST['tahun'];
            }else{
              $bulan = date('m');
              $tahun = date('Y');
            }
           ?>

           <strong>Bulan :<?php echo$bulan;?>, Tahun: <?php echo $tahun;?></strong>
         </div>
        
         
    <?php
  $no = 1;
  include("includes/dbh.inc.php");
  include("includes/fungsi_rupiah.inc.php");
if ((isset($_POST['bulan']))&&(isset($_POST['tahun']))) {
  $bulan=$_POST['bulan'];
  $tahun=$_POST['tahun'];
  $sql = "SELECT * FROM gaji_honor, periode_gaji_honor where gaji_honor.id_bulan=periode_gaji_honor.id AND periode_gaji_honor.bulan=$bulan AND periode_gaji_honor.tahun=$tahun ORDER BY gaji_honor.nama_jabatan DESC";
}else{
  $bulan = date('m');
  $tahun = date('Y');
  $sql = "SELECT * FROM gaji_honor, periode_gaji_honor where gaji_honor.id_bulan=periode_gaji_honor.id AND periode_gaji_honor.bulan=$bulan AND periode_gaji_honor.tahun=$tahun ORDER BY gaji_honor.id_guru ASC";
}
  $result = mysqli_query($conn, $sql);
  
  
echo '<div class="row mb">';
  echo "<div class='content-panel'>";
  echo '<div class="adv-table">';
  echo '<h4><i class="fa fa-angle-right"></i> Data Penggajian Guru Honor Bulan '.$bulan. ' Tahun '.$tahun.'</h4>';
   echo '<a href="includes/cetak_laporan_honor.inc.php" class="btn btn-theme" >Cetak Laporan Bulan Ini</a>';
  echo '<hr>';
  echo '<table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">';
  echo ' <thead>
          <tr>
          <th>#</th>
          <th>IF Guru</th>
          <th>NUPTK</th>
          <th>Nama</th>
          <th>Jabatan</th>
          <th>Gaji</th>
          
          </tr>
          </thead>';
    
    	while ($row = mysqli_fetch_assoc($result)) {
    		//rumus
    		
    		//tabel
    	echo '<tr>';
        echo '<td>'.$no++.'</td>';
        echo '<td>'.$row['id_guru'].'</td>';
        echo '<td>'.$row["nuptik"].'</td>';
        echo '<td>'.$row["nama"].'</td>';
        echo '<td>'.$row["nama_jabatan"].'</td>';
        echo '<td>'.buatRp($row["gaji"]).'</td>';
        echo '</tr>';

    		
    	}

    if (mysqli_num_rows($result) > 0) {
       echo "<tr>
            <td colspan='7' text-align='center'><a href='data_penggajian_honor.php'></a></td></tr> ";
    }else {
      echo "<tr><td>0 result </td></tr>";
    }
    echo "</table>";
    mysqli_close($conn);
    ?>

    </section>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="lib/jquery.scrollTo.min.js"></script>
  <script src="lib/jquery.nicescroll.js" type="text/javascript"></script>
  <!--common script for all pages-->
  <script src="lib/common-scripts.js"></script>
  <!--script for this page-->
  
</body>

</html>
