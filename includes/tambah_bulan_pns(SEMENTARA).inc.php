<?php 
  session_start(); 
if (isset($_POST['submit'])) {
  include_once 'dbh.inc.php';

  $bulan = mysqli_real_escape_string($conn, $_POST['bulan']);
  $tahun = mysqli_real_escape_string($conn, $_POST['tahun']);
  
  //
  if (empty($bulan)) {
    header("Location: ../tambah_golongan_pns.php?golongan=empty");
    exit();
  }else{
    
  $no = 1;
  include("includes/dbh.inc.php");
  include("includes/fungsi_rupiah.inc.php");
  $sql="INSERT INTO periode_gaji (bulan, tahun) values ('$bulan', '$tahun')";
     
  mysqli_query($conn, $sql);

  $sql = "SELECT * FROM guru_pns, jabatan_pns, golongan_pns WHERE golongan_pns.kode_golongan=guru_pns.kode_golongan and guru_pns.kode_jabatan=jabatan_pns.kode_jabatan ORDER BY guru_pns.kode_golongan DESC";
  $result = mysqli_query($conn, $sql);

      if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
        //rumus 
        //tunjangan pernikahan 
        $tj_suami_istri=$row["tj_suami_istri"];
        $status_kawin=$row['status_kawin'];
        if ($status_kawin==='Menikah') {
          $tj_si=(int)$tj_suami_istri*1;
        }else{
          $tj_si=(int)$tj_suami_istri*0;
        }
        //total tunjangan anak
        $jumlah_anak=$row["jumlah_anak"];
        $tj_anak=$row["tj_anak"];
        $tj_total_anak=(int)$tj_anak*(int)$jumlah_anak;
        //gaji1
        $gapok=$row["gapok"];
        
        $gaji1 = (int)$tj_si+(int)$tj_total_anak+(int)$gapok;
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
        
        
        $querybulan = "SELECT * FROM periode_gaji WHERE bulan='$bulan' AND tahun=$tahun";
        $resultbulan = mysqli_query($conn, $querybulan);
        $periode= mysqli_fetch_assoc($resultbulan);


        $sqlinput= "INSERT INTO `gaji_pns`(`nip`,`total_tj_beras`,`id_bulan`,`total_tj_fungsional`,`gaji_bersih`,`total_tj_anak`,`total_tj_suami_istri`,`iwp2`,`iwp8`,`gaji_kotor`,`total_potongan`,`total_gaji`,`nama`,`kode_golongan`,`kode_jabatan`,`status_kawin`,`jumlah_anak`,`jumlah_anggota_keluarga`,`gapok`,`pot_tp`) VALUES ('$row[nip]','$tj_beras','$periode[id]', '$tj_total_fungsional','$gaji1','$tj_total_anak','$tj_si','$iwp2','$iwp8','$gajiKotor','$total_potongan','$total_gaji','$row[nama]','$row[kode_golongan]','$row[kode_jabatan]','$row[status_kawin]','$row[jumlah_anak]','$row[jumlah_anggota_keluarga]','$row[gapok]','$row[pot_tp]')";

    
    mysqli_query($conn, $sqlinput);  
    }
  }

    header("Location: ../data_penggajian_pns.php?berhasil");
    exit();
    
    
    


  }
}else{
  header("Location: ../tambah_golongan.php");
}
 ?>


 //BATAS


 