<?php 
  session_start();
  if($_SESSION['status']!="login"){
    header("Location: login_pns.php?=anda-belum-login");
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
      <a href="admin.php" class="logo"><b>PENGGAJIAN GURU  <span>SD NEGERI 85 PALEMBANG</span></b></a>
      
      
      <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <li>
            <a class="logout" href="includes/logout_pns.inc.php">Logout</a>
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
            <a class="" href="admin_pns.php">
              <i class="fa fa-dashboard"></i>
              <span>Dashboard</span>
              </a>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-th"></i>
              <span>Data Golongan</span>
              </a>
            <ul class="sub">
              <li><a href="data_golongan_pns.php">Data/Edit Golongan</a></li>
              <li><a href="tambah_golongan_pns.php">Tambah Golongan</a></li>
              
              
            </ul>
          </li>

           <li class="sub-menu">
            <a class="active "href="javascript:;">
              <i class="fa fa-th"></i>
              <span>Data Jabatan</span>
              </a>
            <ul class="sub">
              <li class="active"><a href="data_jabatan_pns.php">Data/Edit Jabatan</a></li>
              <li><a href="tambah_jabatan_pns.php">Tambah Jabatan</a></li>         
            </ul>
          </li>

           <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-th"></i>
              <span>Data Guru PNS</span>
              </a>
            <ul class="sub">
              <li><a href="data_guru_pns.php">Data/Edit Guru</a></li>
              <li><a href="tambah_guru_pns.php">Tambah Guru</a></li>
              
              
            </ul>
          </li>

           <li class="mt">
            <a class="" href="data_penggajian_pns.php">
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
              <li><a href="cetak_laporan_pns.php">Cetak Penggajian</a></li>
              <li><a href="cetak_slip_pns.php">Cetak slip</a></li>
              
              
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
    <?php
    echo '<input type="text" id="myInput" onkeyup="myFunction()" placeholder="cari berdasarkan nama jabatan" title="Type in a name">';
  $no = 1;
  include("includes/dbh.inc.php");
  $sql = "SELECT * FROM jabatan_pns";
  $result = mysqli_query($conn, $sql);
  echo '<div class="row mb">';
  echo "<div class='content-panel'>";
  echo '<div class="adv-table">';
  echo '<h4><i class="fa fa-angle-right"></i> Edit Data Jabatan</h4>';
  echo '<hr>';
  echo '<table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="myTable">';
  echo ' <thead>
          <tr>
          <th>#</th>
          <th>Kode Jabatan</th>
          <th>Nama Jabatan</th>
          <th>Tunjangan Jabatan</th>
          <th>Aksi</th>
          </tr>
          </thead>';

    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td>'.$no++.'</td>';
        echo '<td>'.$row["kode_jabatan"].'</td>';
        echo '<td>'.$row["nama_jabatan"].'</td>';
        echo '<td>'.$row["tj_jabatan"].'</td>';     
        echo "<td><a href='edit_jabatan_pns.php?kode_jabatan=".$row['kode_jabatan']."'  class='btn btn-info'>
      <span class='glyphicon glyphicon-pencil' aria-hidden='true'></span>Edit</a> 
      <a href='includes/delete_jabatan_pns.inc.php?kode_jabatan=".$row['kode_jabatan']."'class='btn btn-danger' onclick='return confirm(`Anda yakin mau menghapus data ?`);'>
      <span class='glyphicon glyphicon-remove' aria-hidden='true'></span>Delete</a></td>";

        echo '</tr>';

      }
    } else {
      echo "<tr><td>0 result </td></tr>";
    }
    echo "</table>";
    mysqli_close($conn);
?>
    <!-- /MAIN CONTENT -->
    <!--main content end-->
    <!--footer start-->
   
    <!--footer end-->
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
  <script>
function myFunction() {
  // Declare variables 
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 1; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    } 
  }
}
</script>

</body>

</html>
