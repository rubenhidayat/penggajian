<<?php 
	session_start();
 
if (isset($_POST['submit'])) {
	include_once 'dbh.inc.php';

	$nip = mysqli_real_escape_string($conn, $_POST['nip']);
	$nama = mysqli_real_escape_string($conn, $_POST['nama']);
	$kode_golongan = mysqli_real_escape_string($conn, $_POST['kode_golongan']);
	$kode_jabatan = mysqli_real_escape_string($conn, $_POST['kode_jabatan']);
	$status_kawin = mysqli_real_escape_string($conn, $_POST['status_kawin']);
	$jumlah_anak = mysqli_real_escape_string($conn, $_POST['jumlah_anak']);
	$jumlah_anggota_keluarga = mysqli_real_escape_string($conn, $_POST['jumlah_anggota_keluarga']);
	
	//
	if (empty($nip)) {
		header("Location: ../tambah_guru_pns.php?nip=empty");
		exit();
	}else{
		$sql = "INSERT INTO guru_pns (nip,nama, kode_golongan, kode_jabatan, status_kawin, jumlah_anak, jumlah_anggota_keluarga) VALUES ('$nip','$nama', '$kode_golongan', '$kode_jabatan', '$status_kawin', '$jumlah_anak', '$jumlah_anggota_keluarga');";
		mysqli_query($conn, $sql);
		header("Location: ../data_guru_pns.php?penambahan=success");
		exit();
	}
}else{
	header("Location: ../tambah_guru_pns.php?gagal");
}
 ?>


