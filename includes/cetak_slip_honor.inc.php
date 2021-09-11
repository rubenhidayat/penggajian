<!DOCTYPE html>
<html>
<head>
  <?php $bulan=$_POST['bulan'];
   $tahun=$_POST['tahun'];
   ?>
<link rel="stylesheet" type="text/css" href="../vendors/bootstrap/dist/css/bootstrap.min.css">
	<title>Cetak Laporan Data Penggajian Guru SD Negeri 85 Palembang Bulan ?></title>
	<meta http-equiv="Content-Type" content="text/html charset=iso-8859-1">
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
if ((isset($_POST['bulan']))&&(isset($_POST['tahun']))&&(isset($_POST['id_guru']))) {
  $id_guru=$_POST['id_guru'];
  $bulan=$_POST['bulan'];
  $tahun=$_POST['tahun'];
  $sql = "SELECT * FROM gaji_honor, periode_gaji_honor where gaji_honor.id_bulan=periode_gaji_honor.id AND periode_gaji_honor.bulan=$bulan AND periode_gaji_honor.tahun=$tahun AND gaji_honor.id_guru=$id_guru";
}else{
  
  $sql = "SELECT * FROM gaji_honor, periode_gaji_honor where gaji_honor.id_bulan=periode_gaji_honor.id AND periode_gaji_honor.bulan=$bulan AND periode_gaji_honor.tahun=$tahun AND gaji_honor.id_guru=$id_guru";
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
                <!--<abbr title="Phone">P:</abbr> (123) 456-7890-->
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
                  <div class="col-md-9">
                    <h4><?php echo$row['nama'];?></h4>
                    <address>
                  <strong><?php echo$row['nama_jabatan'];?></strong><br>
                  <?php echo$row['nuptik'];?><br>
                 
                </address>
                  </div>
                  <!-- /col-md-9 -->
                  <div class="col-md-3">
                    <br>
                    
                    <div>
                      <!-- /col-md-3 -->
                      <div class="pull-left"> INVOICE DATE : </div>
                      <div class="pull-right"> <?php echo$bulan;?>/<?php echo$tahun;?> </div>
                      <div class="clearfix"></div>
                    </div>
                    <!-- /row -->
                    <br>
                    
                  </div>
                  <!-- /invoice-body -->
                </div>
                <!-- /col-lg-10 -->
                <table class="table">
                  <thead>
                    <tr>
                      
                      <th class="text-left"></th>
                      
                      <th style="width:90px" class="text-right">TOTAL</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      
                      <td><?php echo$row['nama_jabatan'];?></td>
                      <td class="text-right"><?php echo" ".buatRp($row['gaji'])."";?></td>
                      
                    </tr>
                    
                    <tr>
                      <td colspan="2" rowspan="4">
                        
                    </tr>
                    <tr>
                      
                    </tr>
                    <tr>
                      
                    </tr>
                    <tr>
                      <td class="text-right no-border">
                        <div class="well well-small green"><strong>Total</strong></div>
                      </td>
                      <td class="text-right"><strong><?php echo" ".buatRp($row['gaji'])."";?></strong></td>
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
            <td colspan='7' text-align='center'><a href='data_penggajian_pns.php'></a></td></tr> ";
    }else {
      echo "<tr><td>0 result </td></tr>";
    }
    echo "</table>";
    mysqli_close($conn);
?>

</body>
</html>