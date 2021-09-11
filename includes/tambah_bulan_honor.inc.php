<?php 
  session_start(); 
if (isset($_POST['submit'])) {
  include_once 'dbh.inc.php';

  $bulan = mysqli_real_escape_string($conn, $_POST['bulan']);
  $tahun = mysqli_real_escape_string($conn, $_POST['tahun']);
  
  //
  if (empty($bulan)) {
    header("Location: ../tambah_bulan_honor.php?bulan=empty");
    exit();
  }else{
    
  $no = 1;
  include("includes/dbh.inc.php");
  include("includes/fungsi_rupiah.inc.php");
  $sql="INSERT INTO periode_gaji_honor (bulan, tahun) values ('$bulan', '$tahun')";
     
  mysqli_query($conn, $sql);

  $sql = "SELECT * FROM guru_honor, jabatan_honor WHERE guru_honor.kode_jabatan=jabatan_honor.kode_jabatan ORDER BY guru_honor.kode_jabatan DESC";
  $result = mysqli_query($conn, $sql);

      if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
        //rumus 
        //tunjangan pernikahan 
        $gapok = $row['gapok'];
        $tunjangan = $row['tunjangan'];
        $potongan = $row['potongan'];
        $gaji = ((int)$gapok+(int)$tunjangan)-(int)$potongan;

        $querybulan = "SELECT * FROM periode_gaji_honor WHERE bulan='$bulan' AND tahun=$tahun";
        $resultbulan = mysqli_query($conn, $querybulan);
        $periode= mysqli_fetch_assoc($resultbulan);


        $sqlinput= "INSERT INTO `gaji_honor`(`id_guru`,`gaji`,`id_bulan`,`nuptik`,`nama`,`nama_jabatan`) VALUES ('$row[id_guru]','$gaji','$periode[id]','$row[nuptik]','$row[nama]','$row[nama_jabatan]')";

    
    mysqli_query($conn, $sqlinput);  
    }
  }

    header("Location: ../data_penggajian_honor.php?berhasil");
    exit();
    
    
    


  }
}else{
  header("Location: ../tambah_golongan.honor");
}
 ?>





