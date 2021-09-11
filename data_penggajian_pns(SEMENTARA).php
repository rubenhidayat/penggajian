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
  <link href="img/favicon.png" rel="icon">
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
           
           <form action="" method="get">
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
                    for ($i=2019; $i <=$y+2 ; $i++) { 
                      echo "<option value='$i'>$i</option>";
                    }
                  ?>
             </select>
               <button type="submit">Cari</button>
               <button type="submit"><a href="tambah_bulan_pns.php">Input</a></button>
           </form>
           <br>
           <?php
            if ((isset($_GET['bulan']) && $_GET['bulan']!='') && (isset($_GET['tahun']) && $_GET['tahun']!='')) {
              $bulan = $_GET['bulan'];
              $tahun = $_GET['tahun'];
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
 // $sql = "SELECT * FROM gaji_pns, guru_pns, jabatan_pns, golongan_pns WHERE golongan_pns.kode_golongan=guru_pns.kode_golongan and guru_pns.kode_jabatan=jabatan_pns.kode_jabatan ORDER BY guru_pns.kode_golongan DESC";
 $sql = "SELECT * FROM gaji_pns";

  $result = mysqli_query($conn, $sql);

  echo '<div class="row mb">';
  echo "<div class='content-panel'>";
  echo '<div class="adv-table">';
  echo '<a href="includes/cetak_laporan_pns.inc.php" class="btn btn-theme" >Cetak Laporan Bulan Ini</a>';
  echo '<br>';
  
  echo '<h4><i class="fa fa-angle-right"></i> Data Penggajian</h4>'; 
  echo '<hr>';
  echo '<table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">';
  echo ' <thead>
          <tr>
          <th>#</th>
          <th>
            <ul>
              <li>NIP</li>
              <li>Nama</li>
              <li>Kode Golongan</li>
              <li>Kode Jabatan</li>
            </ul>
          </th>
          <th>
            <ul>
              <li>Status Kawin</li>
              <li>Jumlah Anak</li>
              <li>Jumlah Jiwa</li>
            </ul>
          </th>

          <th>
           <ul>
              <li>Gaji Pokok</li>
              <li>Tunj. Istri/Suami</li>
              <li>Tunj. Anak</li>
              <li>Jumlah</li>
           </ul>              
          </th>

          <th>
            <ul>
              <li>Tunjangan Fungsional</li>
              <li>Tunjangan Beras</li>
              <li>Jumlah Kotor</li>
            </ul>
          </th>

          <th>
            <ul>
              <li>Potongan IWP 2%</li>
              <li>Potongan IWP 8%</li>
              <li>Potongan TP</li>
              <li>Total Potongan</li>
            </ul>
          </th>

          <th>
            <ul>
             <li>Total Gaji</li>
            </ul> 
          </th>

          
          </tr>
          </thead>';

    
      while ($row = mysqli_fetch_assoc($result)) {
        //rumus 
        //tunjangan pernikahan 

        
        
        
        
        echo '<tr>';

        echo '<td>'.$no++.'</td>';
        echo '<td>
                <ul>
                <li>'.$row["nip"].'</li>
                <li>'.$row["nama"].'</li>
                <li>'.$row["kode_golongan"].'</li>
                <li>'.$row["kode_jabatan"].'</li>
                </ul>
              </td>';

         echo '<td>
                <ul>
                <li>'.$row["status_kawin"].'</li>
                <li>'.$row["jumlah_anak"].'</li>
                <li>'.$row["jumlah_anggota_keluarga"].'</li>
                </ul>
              </td>';

        echo '<td>
                <ul>
                <li>'.buatRp($row["gapok"]).'</li>
                <li>'.buatRp($row["total_tj_suami_istri"]).'</li>
                <li>'.buatRp($row["total_tj_anak"]).'</li>
                <li>'.buatRp($row["gaji_bersih"]).'</li>
                </ul>
              </td>';

        echo '<td>
                <ul>
                <li>'.buatRp($row["total_tj_fungsional"]).'</li>
                <li>'.buatRp($row["total_tj_beras"]).'</li>
                <li>'.buatRp($row["gaji_kotor"]).'</li>
                </ul>
        </td>' ;

        echo '<td>
                <ul>
                <li>'.buatRp($row["iwp2"]).'</li>
                <li>'.buatRp($row["iwp8"]).'</li>
                <li>'.buatRp($row['pot_tp']).'</li>
                <li>'.buatRp($row["total_potongan"]).'</li>
                </ul>
        </td>' ;
        
        echo '<td>
                <ul>
                <li>'.buatRp($row["total_gaji"]).'</li>
                
                </ul>
        </td>' ;
        

        echo '</tr>';

      }

    if (mysqli_num_rows($result) > 0) {  
     echo "<tr>
            <td colspan='7' text-align='center'><a href='data_penggajian_pns?bulan=$bulan&tahun=$tahun'></a></td></tr> ";
    }else {
      echo "<tr><td>0 result </td></tr>";
    }
    echo "</table>";
    mysqli_close($conn);
?>
<footer class="site-footer">
      <div class="text-center">
        <p>
          SD NEGERI 85 PALEMBANG
        </p>
        <div class="credits">
          <!--
            You are NOT allowed to delete the credit link to TemplateMag with free version.
            You can delete the credit link only if you bought the pro version.
            Buy the pro version with working PHP/AJAX contact form: https://templatemag.com/dashio-bootstrap-admin-template/
            Licensing information: https://templatemag.com/license/
          -->
           <a href="https://templatemag.com/">TemplateMag</a>
        </div>
        <a href="index.html#" class="go-top">
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
  <script src="lib/jquery.sparkline.js"></script>
  <!--common script for all pages-->
  <script src="lib/common-scripts.js"></script>
  <script type="text/javascript" src="lib/gritter/js/jquery.gritter.js"></script>
  <script type="text/javascript" src="lib/gritter-conf.js"></script>
  <!--script for this page-->
  <script src="lib/sparkline-chart.js"></script>
  <script src="lib/zabuto_calendar.js"></script>
  

      
    });
  </script>
  <script type="application/javascript">
    $(document).ready(function() {
      $("#date-popover").popover({
        html: true,
        trigger: "manual"
      });
      $("#date-popover").hide();
      $("#date-popover").click(function(e) {
        $(this).hide();
      });

      $("#my-calendar").zabuto_calendar({
        action: function() {
          return myDateFunction(this.id, false);
        },
        action_nav: function() {
          return myNavFunction(this.id);
        },
        ajax: {
          url: "show_data.php?action=1",
          modal: true
        },
        legend: [{
            type: "text",
            label: "Special event",
            badge: "00"
          },
          {
            type: "block",
            label: "Regular event",
          }
        ]
      });
    });

    
</body>

</html>




//BATAS

