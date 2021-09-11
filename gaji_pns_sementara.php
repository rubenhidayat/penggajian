 <section id="main-content">
      <section class="wrapper">
        <!-- mulai coding tahun bulan-->
        
         <div class="alert alert-info">
           <strong>Bulan :<?php echo date('M');?>, Tahun: <?php echo date('Y');?></strong>
         </div>
    <?php
  $no = 1;
  include("includes/dbh.inc.php");
  include("includes/fungsi_rupiah.inc.php");
  $sql = "SELECT * FROM guru_pns, jabatan_pns, golongan_pns WHERE golongan_pns.kode_golongan=guru_pns.kode_golongan and guru_pns.kode_jabatan=jabatan_pns.kode_jabatan ORDER BY guru_pns.kode_golongan DESC";
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
                <li>'.$row["status"].'</li>
                <li>'.$row["jumlah_anak"].'</li>
                <li>'.$row["jumlah_anggota_keluarga"].'</li>
                </ul>
              </td>';

        echo '<td>
                <ul>
                <li>'.buatRp($row["gapok"]).'</li>
                <li>'.buatRp($row["tj_suami_istri"]).'</li>
                <li>'.buatRp($tj_total_anak).'</li>
                <li>'.buatRp($gaji1).'</li>
                </ul>
              </td>';

        echo '<td>
                <ul>
                <li>'.buatRp($tj_total_fungsional).'</li>
                <li>'.buatRp($tj_beras).'</li>
                <li>'.buatRp($gajiKotor).'</li>
                </ul>
        </td>' ;

        echo '<td>
                <ul>
                <li>'.buatRp($iwp2).'</li>
                <li>'.buatRp($iwp8).'</li>
                <li>'.buatRp($row['pot_tp']).'</li>
                <li>'.buatRp($total_potongan).'</li>
                </ul>
        </td>' ;
        
        echo '<td>
                <ul>
                <li>'.buatRp($total_gaji).'</li>
                
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