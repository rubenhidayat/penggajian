<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
 
  <!-- Favicons -->
  <link href="../img/logo.png" rel="icon">
  <link href="../img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="../lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="../css/style.css" rel="stylesheet">
  <link href="../css/style-responsive.css" rel="stylesheet">


  


<link rel="stylesheet" type="text/css" href="../vendors/bootstrap/dist/css/bootstrap.min.css">

	<meta http-equiv="Content-Type" content="../text/html charset=iso-8859-1">
	<style type="text/css">
		.style1 {color: #FFFFFF}

	</style>
	<script>
		window.print();
	</script>
</head>
<body>
<?php
$no = 1;
  include("dbh.inc.php");
  include("fungsi_rupiah.inc.php");
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
    
      <section class="wrapper">
        <div class="col-lg-12 mt">
          <div class="row content-panel">
            <div class="col-lg-10 col-lg-offset-1">
              <div class="invoice-body">
                
                <!-- /pull-left -->

                
                <!-- /pull-right -->

                
                
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
                    
                    
                    <div>
                      <!-- /col-md-3 -->
                      <div   > Slip gaji bulan
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
               

  
<script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="lib/jquery.scrollTo.min.js"></script>
  <script src="lib/jquery.nicescroll.js" type="text/javascript"></script>
  <!--common script for all pages-->
  <script src="lib/common-scripts.js"></script>
</body>
</html>	