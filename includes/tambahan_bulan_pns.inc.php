<?php 
	session_start();


include_once 'dbh.inc.php';
$sqlgajibulan = "SELECT gaji_pns.bulan FROM gaji_pns";
  $resultgajibulan = mysqli_query($conn, $sqlgajibulan);
$sqlbulan_bulan = "SELECT bulan_pns.bulan FROM bulan_pns";
  $resultbulan = mysqli_query($conn, $sqlbulan_bulan);
if ($resultgajibulans!=$resultbulan) {
	$sql="INSERT INTO gaji_pns(bulan, nip, nama, kode_golongan, kode_jabatan, status_kawin, jumlah_anak, jumlah_anggota_keluarga, gapok, tj_suami_istri, pot_tp, tj_anak, tj_fungsional, tj_jabatan)  SELECT bulan_pns.bulan, guru_pns.nip, guru_pns.nama, golongan_pns.kode_golongan, jabatan_pns.kode_jabatan, guru_pns.status_kawin,  guru_pns.jumlah_anak, guru_pns.jumlah_anggota_keluarga, golongan_pns.gapok, golongan_pns.tj_suami_istri, golongan_pns.pot_tp, golongan_pns.tj_anak, golongan_pns.tj_fungsional, jabatan_pns.tj_jabatan FROM guru_pns, jabatan_pns, golongan_pns,bulan_pns WHERE golongan_pns.kode_golongan=guru_pns.kode_golongan AND jabatan_pns.kode_jabatan=guru_pns.kode_jabatan";
		mysqli_query($conn, $sql);
		header("Location: ../data_penggajian_pns.php?penambahan=success");
		exit();
}else{
	echo "DATA TIDAK BISA DIISI";
}

		


 ?>
