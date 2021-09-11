<<?php 
	session_start();
 
if (isset($_POST['submit'])) {
	include_once 'dbh.inc.php';

	$kode_jabatan = mysqli_real_escape_string($conn, $_POST['kode_jabatan']);
	$nama_jabatan = mysqli_real_escape_string($conn, $_POST['nama_jabatan']);
	$gapok = mysqli_real_escape_string($conn, $_POST['gapok']);
	
	//
	if (empty($kode_jabatan)) {
		header("Location: ../tambah_jabatan_honor.php?jabatan=empty");
		exit();
	}else{
		$sql = "INSERT INTO jabatan_honor (kode_jabatan,nama_jabatan, gapok) VALUES ('$kode_jabatan','$nama_jabatan', '$gapok');";
		mysqli_query($conn, $sql);
		header("Location: ../data_jabatan_honor.php?penambahan=success");
		exit();
	}
}else{
	header("Location: ../tambah_jabatan_honor.php");
}
 ?>


