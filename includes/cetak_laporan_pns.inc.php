<!DOCTYPE html>
<html>
<head>
  <?php $bulan=$_GET['bulan'];
   $tahun=$_GET['tahun'];
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
  //$sql = "SELECT * FROM gaji_pns, guru_pns, jabatan_pns, golongan_pns WHERE golongan_pns.kode_golongan=guru_pns.kode_golongan and guru_pns.kode_jabatan=jabatan_pns.kode_jabatan ORDER BY guru_pns.kode_golongan DESC";
  if ((isset($_GET['bulan']))&&(isset($_GET['tahun']))) {
   $bulan=$_GET['bulan'];
   $tahun=$_GET['tahun'];
  $sql = "select * from gaji_pns, periode_gaji where periode_gaji.id=gaji_pns.id_bulan and periode_gaji.bulan=$bulan AND periode_gaji.tahun=$tahun order by gaji_pns.kode_golongan desc";
   
  }else{
    $bulan = date('m');
    $tahun = date('Y');
    $sql = "select * from gaji_pns, periode_gaji where periode_gaji.id=gaji_pns.id_bulan and periode_gaji.bulan=$bulan AND periode_gaji.tahun=$tahun order by gaji_pns.kode_golongan desc";
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
 
  echo '<br>';
  
  echo '<h4 align="center"><i></i> Data Penggajian Guru PNS SD Negeri 85 Palembang </h4> <br> 
    <h4 align="center">Bulan '.$bln.'</h4>
    <br>
    <h4 align="center">Tahun '.$tahun.'</h4>

    '; 
  echo '<hr>';

  
  echo '<table  cellpadding="0" cellspacing="0" border="1" class="display table "  >';
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

     $totalpengeluaran=0;
      while ($row = mysqli_fetch_assoc($result)) {
        $gajii=settype($row['total_gaji'], "integer");
       
        $totalpengeluaran=$totalpengeluaran+$row['total_gaji'];
        
        
        
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
                <li>'.buatRp($row["pot_tp"]).'</li>
                <li>'.buatRp($row["total_potongan"]).'</li>
                </ul>
        </td>' ;
        
        echo '<td>
                <ul>
                <li>'.buatRp($row["total_gaji"]).'</li>
                
                </ul>
        </td>
        </tr>

        ' ;

      }


        echo '<td></td>';
        echo '<td>
                
              </td>';

         echo '<td>
                
              </td>';

        echo '<td>
                
              </td>';

        echo '<td>
                
        </td>' ;

        echo '<td>
               TOTAL PENGELUARAN 
        </td>' ;
        
        echo '<td>
                '.buatRp($totalpengeluaran).'
        </td>' ;
        

        echo '</tr>';

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