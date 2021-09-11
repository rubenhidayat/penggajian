<<?php 
	session_start();
 
if (isset($_POST['submit'])) {
	include_once 'dbh.inc.php';

	$kode_jabatan = mysqli_real_escape_string($conn, $_POST['kode_jabatan']);
	$nama_jabatan = mysqli_real_escape_string($conn, $_POST['nama_jabatan']);
	$tj_jabatan = mysqli_real_escape_string($conn, $_POST['tj_jabatan']);
	
	//
	if (empty($kode_jabatan)) {
		header("Location: ../tambah_jabatan_pns.php?jabatan=empty");
		exit();
	}else{
		$sql = "INSERT INTO jabatan_pns (kode_jabatan,nama_jabatan, tj_jabatan) VALUES ('$kode_jabatan','$nama_jabatan', '$tj_jabatan');";
		mysqli_query($conn, $sql);
		header("Location: ../data_jabatan_pns.php?penambahan=success");
		exit();
	}
}else{
	header("Location: ../tambah_jabatan_pns.php");
}
 ?>


