<h2>LAPORAN DATA BULANAN PENGGAJIAN GURU SD NEGERI 85 PALEMBANG <?phpi
 $tgl=date('M-Y');
 echo $tgl;
 ?> </h2>

<table border="1">
  <tr>
          <th>#</th>
          <th>NUPTK</th>
          <th>Nama</th>
          <th>Jabatan</th>
          <th>Gaji</th>
          
          </tr>
          <?php
  $no = 1;
  include("dbh.inc.php");
  include("fungsi_rupiah.inc.php");
  $sql = "SELECT * FROM guru_honor, jabatan_honor WHERE guru_honor.kode_jabatan=jabatan_honor.kode_jabatan ORDER BY jabatan_honor.kode_jabatan DESC";
  $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
    	while ($row = mysqli_fetch_assoc($result)) {
    		//rumus
    		$gapok = $row['gapok'];
    		$tunjangan = $row['tunjangan'];
    		$potongan = $row['potongan'];
    		$gaji = ((int)$gapok+(int)$tunjangan)-(int)$potongan;
    		//tabel
    	echo '<tr>';
        echo '<td>'.$no++.'</td>';
        echo '<td>'.$row["nuptik"].'</td>';
        echo '<td>'.$row["nama"].'</td>';
        echo '<td>'.$row["nama_jabatan"].'</td>';
        echo '<td>'.buatRp($gaji).'</td>';
        echo '</tr>';

    		# code...
    	}
    }else {
      echo "<tr><td>0 result </td></tr>";
    }
    echo "</table>";
    mysqli_close($conn);
    ?>

</table>