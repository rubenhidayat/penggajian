<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../vendors/bootstrap/dist/css/bootstrap.min.css">
	<title>Cetak Laporan Data Penggajian Guru Honor SD Negeri 85 Palembang</title>
	<meta http-equiv="Content-Type" content="text/html charset=iso-8859-1">
	<style type="text/css">
		.style1 {color: #FFFFFF}

	</style>
	<script>
		window.print();
	</script>
</head>
<body>
<table border="1">
<?php
  $no = 1;
  include("dbh.inc.php");
  include("fungsi_rupiah.inc.php");
if ((isset($_GET['bulan']))&&(isset($_GET['tahun']))) {
  $bulan=$_GET['bulan'];
  $tahun=$_GET['tahun'];
  $sql = "SELECT * FROM gaji_honor, periode_gaji_honor where gaji_honor.id_bulan=periode_gaji_honor.id AND periode_gaji_honor.bulan=$bulan AND periode_gaji_honor.tahun=$tahun ORDER BY gaji_honor.nama_jabatan DESC";
}else{
  $bulan = date('m');
  $tahun = date('Y');
  $sql = "SELECT * FROM gaji_honor, periode_gaji_honor where gaji_honor.id_bulan=periode_gaji_honor.id AND periode_gaji_honor.bulan=$bulan AND periode_gaji_honor.tahun=$tahun ORDER BY gaji_honor.id_guru ASC";
}
  $result = mysqli_query($conn, $sql);
  
  if ($bulan==1) {
   $bln='Januari'; 
  }else if($bulan==2){
    $bln='Februari';
   }else if ($bulan==3) {
     $bln='Maret';
   }else if ($bulan==4) {
     $bln='April';
   }else if ($bulan==5) {
     $bln='Mei';
   }else if ($bulan==6) {
     $bln='Juni';
   }else if ($bulan==7) {
     $bln='Juli';
   }else if ($bulan==8) {
     $bln='Agustus';
   }else if ($bulan==9) {
     $bln='September';
   }else if ($bulan==10) {
     $bln='Oktober';
   }else if ($bulan==11) {
     $bln='November';
   }else if ($bulan==12) {
     $bln='Desember';
   }else{
    echo "Bulan tidak dimasukkan";
   }
  
echo '<div class="row mb">';
  echo "<div class='content-panel'>";
  echo '<div class="adv-table">';
  echo '<h4><i class="fa fa-angle-right"></i> Data Penggajian Guru Honor Bulan '.$bln. ' Tahun '.$tahun.'</h4>';
   
  echo '<hr>';
  echo '<table cellpadding="0" cellspacing="0" border="1" class="display table table-bordered" id="hidden-table-info">';
  echo ' <thead>
          <tr>
          <th>#</th>
          <th>ID Guru</th>
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
</table>


</body>
</html>	