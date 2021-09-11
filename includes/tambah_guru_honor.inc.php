<<?php 
	session_start();
 
if (isset($_POST['submit'])) {
	include_once 'dbh.inc.php';

	$nuptik = mysqli_real_escape_string($conn, $_POST['nuptik']);
	$nama = mysqli_real_escape_string($conn, $_POST['nama']);
	$kode_jabatan = mysqli_real_escape_string($conn, $_POST['kode_jabatan']);
	$tunjangan = mysqli_real_escape_string($conn, $_POST['tunjangan']);
	$potongan = mysqli_real_escape_string($conn, $_POST['potongan']);
	
	
	//
	if (empty($nama)) {
		header("Location: ../tambah_guru_honor.php?nuptik=empty");
		exit();
	}else{
		$sql = "INSERT INTO guru_honor (nuptik, nama, kode_jabatan, tunjangan, potongan) VALUES ( '$nuptik', '$nama', '$kode_jabatan', '$tunjangan', '$potongan');";
		mysqli_query($conn, $sql);
		header("Location: ../data_guru_honor.php?penambahan=success");
		exit();
	}
}else{
	header("Location: ../tambah_guru_honor.php?gagal");
}
 ?>


