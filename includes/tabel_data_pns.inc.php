<h2>LAPORAN DATA BULANAN PENGGAJIAN GURU SD NEGERI 85 PALEMBANG <?php
 $tgl=date('M-Y');
 echo $tgl;
 ?> </h2>

<table border="1">
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
          <th>
            <ul>
             <li>Tanda Tangan</li>
            </ul> 
          </th>
          
          </tr>
          <?php
	include 'dbh.inc.php';
	$no = 1;
  include("dbh.inc.php");
  $sql = "SELECT * FROM guru_pns, jabatan_pns, golongan_pns WHERE golongan_pns.kode_golongan=guru_pns.kode_golongan and guru_pns.kode_jabatan=jabatan_pns.kode_jabatan ORDER BY guru_pns.kode_golongan DESC";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
        //rumus 
        //total tunjangan anak
        $jumlah_anak=$row["jumlah_anak"];
        $tj_anak=$row["tj_anak"];
        $tj_total_anak=(int)$tj_anak*(int)$jumlah_anak;
        //gaji1
        $gapok=$row["gapok"];
        $tj_suami_istri=$row["tj_suami_istri"];
        $gaji1 = (int)$tj_suami_istri+(int)$tj_total_anak+(int)$gapok;
        //Tunjangan Fungsional
        $tj_fungsional=$row['tj_fungsional'];
        $tj_jabatan=$row['tj_jabatan'];
        $tj_total_fungsional = (int)$tj_jabatan+(int)$tj_fungsional;
        //Tunjangan Beras
        $jumlah_anggota_keluarga=$row['jumlah_anggota_keluarga'];
        $tj_beras = (int)$jumlah_anggota_keluarga*72420;
        //jumlah kotor
        $gajiKotor = (int)$gaji1+(int)$tj_beras+(int)$tj_total_fungsional;
        //potongan iwp
        $iwp2=(float)$gaji1*0.02;
        $iwp8=(float)$gaji1*0.08;
        //total potongan
        $pot_tp=$row['pot_tp'];
        $total_potongan = (float)$pot_tp+(float)$iwp2+(float)$iwp8;
        //total gaji
        $total_gaji = (int)$gajiKotor-(float)$total_potongan;
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
                <li>'.$row["gapok"].'</li>
                <li>'.$row["tj_suami_istri"].'</li>
                <li>'.$tj_total_anak.'</li>
                <li>'.$gaji1.'</li>
                </ul>
              </td>';

        echo '<td>
                <ul>
                <li>'.$tj_total_fungsional.'</li>
                <li>'.$tj_beras.'</li>
                <li>'.$gajiKotor.'</li>
                </ul>
        </td>' ;

        echo '<td>
                <ul>
                <li>'.$iwp2.'</li>
                <li>'.$iwp8.'</li>
                <li>'.$row['pot_tp'].'</li>
                <li>'.$total_potongan.'</li>
                </ul>
        </td>' ;
        
        echo '<td>
                <ul>
                <li>'.$total_gaji.'</li>
                
                </ul>
        </td>' ;
        echo '<td>
                <ul>
                <li></li>
                
                </ul>
        </td>' ;
        

        echo '</tr>';

      }
    } else {
      echo "<tr><td>0 result </td></tr>";
    }
    echo "</table>";
    mysqli_close($conn);
?>
</table>
