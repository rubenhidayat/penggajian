<<?php 
	session_start();
 
if (isset($_POST['submit'])) {
	include_once 'dbh.inc.php';

	$kode_golongan = mysqli_real_escape_string($conn, $_POST['kode_golongan']);
	$nama_golongan = mysqli_real_escape_string($conn, $_POST['nama_golongan']);
	$mkg = mysqli_real_escape_string($conn, $_POST['mkg']);
	$gapok = mysqli_real_escape_string($conn, $_POST['gapok']);
	$tj_suami_istri = mysqli_real_escape_string($conn, $_POST['tj_suami_istri']);
	$tj_anak = mysqli_real_escape_string($conn, $_POST['tj_anak']);
	$tj_fungsional = mysqli_real_escape_string($conn, $_POST['tj_fungsional']);
	$pot_tp = mysqli_real_escape_string($conn, $_POST['pot_tp']);
	//
	if (empty($kode_golongan)) {
		header("Location: ../tambah_golongan_pns.php?golongan=empty");
		exit();
	}else{
		$sql = "INSERT INTO golongan_pns (kode_golongan,nama_golongan, mkg, gapok, tj_suami_istri, tj_anak, tj_fungsional, pot_tp) VALUES ('$kode_golongan','$nama_golongan', '$mkg', '$gapok', '$tj_suami_istri', '$tj_anak', '$tj_fungsional', '$pot_tp');";
		mysqli_query($conn, $sql);
		header("Location: ../data_golongan_pns.php?penambahan=success");
		exit();
	}
}else{
	header("Location: ../tambah_golongan.php");
}
 ?>


