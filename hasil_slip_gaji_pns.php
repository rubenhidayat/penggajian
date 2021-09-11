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
            <a href="javascript:;">
              <i class="fa fa-th"></i>
              <span>Data Jabatan</span>
              </a>
            <ul class="sub">
              <li><a href="data_jabatan_pns.php">Data/Edit Jabatan</a></li>
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
            <a class="active" href="data_penggajian_pns.php">
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
    <?php 

$no = 1;
  include("includes/dbh.inc.php");
  include("includes/fungsi_rupiah.inc.php");
  //$sql = "SELECT * FROM gaji_pns, guru_pns, jabatan_pns, golongan_pns WHERE golongan_pns.kode_golongan=guru_pns.kode_golongan and guru_pns.kode_jabatan=jabatan_pns.kode_jabatan ORDER BY guru_pns.kode_golongan DESC";
  if ((isset($_POST['bulan']))&&(isset($_POST['tahun']))&&(isset($_POST['nip']))) {
   $bulan=$_POST['bulan'];
   $tahun=$_POST['tahun'];
   $nip=$_POST['nip'];
  $sql = "select * from gaji_pns, periode_gaji where periode_gaji.id=gaji_pns.id_bulan and periode_gaji.bulan=$bulan AND periode_gaji.tahun=$tahun and gaji_pns.nip=$nip";
   
  }else{
    
    $sql = "select * from gaji_pns, periode_gaji where periode_gaji.id=gaji_pns.id_bulan and periode_gaji.bulan=$bulan AND periode_gaji.tahun=$tahun and gaji_pns.nip=$nip";
  }
  $result = mysqli_query($conn, $sql);

  while ($row = mysqli_fetch_assoc($result)) {
     ?>
    <section id="main-content">
      <section class="wrapper">
        <div class="col-lg-12 mt">
          <div class="row content-panel">
            <div class="col-lg-10 col-lg-offset-1">
              <div class="invoice-body">
                <div class="pull-left">
                  <h1>SD NEGERI 85 PALEMBANG</h1>
                  <address>
                Jl. Mojopahit, Tuan Kentang, Seberang Ulu I, Kota Palembang, Sumatera Selatan 30255
                <br>
                Sumatera Selatan 30255<br>
              </address>
                </div>
                <!-- /pull-left -->

                <div class="pull-right">
                  
                </div>
                <!-- /pull-right -->

                <div class="clearfix"></div>
                <br>
                <br>
                <br>
                <div class="row">
                   <hr>
                  <div class="col-md-9">

                    <h4><?php echo$row['nama'];?></h4>
                    <address>
                  <strong><?php echo$nip;?></strong><br>
                          Golongan  : <?php echo$row['kode_golongan'];?> <br>
                          jabatan  : <?php echo$row['kode_jabatan'];?> <br>

                  
                </address>

                  </div>
                  <!-- /col-md-9 -->
                  <div class="col-md-3">
                    <br>
                    
                    <div>
                      <!-- /col-md-3 -->
                      <div class="pull-left"> Slip gaji bulan
                       <?php echo $bulan;?> Tahun <?php echo$tahun;?> 
                      <br>
                 SD Negeri 85 Palembang
                    </div>
                      <div class="clearfix"></div>
                    </div>
                    <!-- /row -->
                    <br>
                    
                  </div>
                  <!-- /invoice-body -->
                </div>
                <hr>
                <!-- /col-lg-10 -->
                <table class="table">
                  <thead>
                    <tr>
                      
                      <th class="text-left">Rincian</th>
                      <th style="width:1200px" class="text-right">Jumlah</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Gaji Pokok</td>
                      <td class="text-right"><?php echo" ".buatRp($row['gapok'])."";?></td>
                    </tr>
                    <tr>
                      <td>Tunjangan Suami/Istri</td>
                      <td class="text-right"><?php echo" ".buatRp($row['total_tj_suami_istri'])."";?></td>
                    </tr>
                    <tr>
                      <td>Tunjangan Anak</td>
                      <td class="text-right"><?php echo" ".buatRp($row['total_tj_anak'])."";?></td>
                    </tr>
                    <tr>
                      <td class="text-right"><strong>Gaji Bersih</strong></td>
                        <td class="text-right"><strong><?php echo" ".buatRp($row['gaji_bersih'])."";?></strong></td>
                    </tr>
                    <br>
                    <tr>
                      <td>Tunjangan Fungsional</td>
                      <td class="text-right"><?php echo" ".buatRp($row['total_tj_fungsional'])."";?></td>
                    </tr>
                    <tr>
                      <td>Tunjangan Beras</td>
                      <td class="text-right"><?php echo" ".buatRp($row['total_tj_beras'])."";?></td>
                    </tr>
                    <tr>
                      <td class="text-right"><strong>Gaji Kotor</strong></td>
                        <td class="text-right"><strong><?php echo" ".buatRp($row['gaji_kotor'])."";?></strong></td>
                    </tr>
                    <br>
                    <tr>
                      <td>Potongan IWP 2%</td>
                      <td class="text-right"><?php echo" ".buatRp($row['iwp2'])."";?></td>
                    </tr>
                    <tr>
                      <td>Potongan IWP 8%</td>
                      <td class="text-right"><?php echo" ".buatRp($row['iwp8'])."";?></td>
                    </tr>
                    <tr>
                      <td>Potongan Taperum</td>
                      <td class="text-right"><?php echo" ".buatRp($row['pot_tp'])."";?></td>
                    </tr>
                    <tr>
                      <td class="text-right"><strong>Total Potongan</strong></td>
                        <td class="text-right"><strong><?php echo" ".buatRp($row['total_potongan'])."";?></strong></td>
                    </tr>










                   
                    <tr>
                      <td colspan="2" rowspan="4">
                        <h4></h4>
                        <p></p>



                      <td class="text-right no-border">
                        <div class="well well-small green"><strong>Total</strong></div>
                      </td>
                      <td class="text-right"><strong><?php echo" ".buatRp($row['total_gaji'])."";?></strong></td>
                    </tr>


                        
                    
                  </tbody>
                </table>
                <br>
                <br>
              </div>
              <!--/col-lg-12 mt -->
      </section>
      <!-- /wrapper -->
    </section>
    <?php
  }
  if (mysqli_num_rows($result) > 0) {  
     echo "<tr>
            <td colspan='7' text-align='center'><a href='hasil_slip_gaji_pns.php'></a></td></tr> ";
    }else {
      echo "<tr><td>0 result </td></tr>";
    }
    echo "</table>";
    mysqli_close($conn);
?>
    <!-- /MAIN CONTENT -->
    <!--main content end-->
    <!--footer start-->
    <footer class="site-footer">
      <div class="text-center">
        <p>
          &copy; Copyrights <strong>Dashio</strong>. All Rights Reserved
        </p>
        <div class="credits">
          <!--
            You are NOT allowed to delete the credit link to TemplateMag with free version.
            You can delete the credit link only if you bought the pro version.
            Buy the pro version with working PHP/AJAX contact form: https://templatemag.com/dashio-bootstrap-admin-template/
            Licensing information: https://templatemag.com/license/
          -->
          Created with Dashio template by <a href="https://templatemag.com/">TemplateMag</a>
        </div>
        <a href="invoice.html#" class="go-top">
          <i class="fa fa-angle-up"></i>
          </a>
      </div>
    </footer>
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

</body>

</html>
