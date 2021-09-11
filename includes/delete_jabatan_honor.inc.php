<?php
include('dbh.inc.php');
$kode_jabatan = $_GET['kode_jabatan'];
$sql = "DELETE FROM `jabatan_honor` WHERE `jabatan_honor`.`kode_jabatan` = '$kode_jabatan'";
$sqlUpdate ="UPDATE guru_honor SET guru_honor.kode_jabatan='' WHERE guru_honor.kode_jabatan='$kode_jabatan'";
$execute = mysqli_query($conn, $sqlUpdate);
//$sqlUpdate = "UPDATE guru_pns SET guru_pns."
if (mysqli_query($conn, $sql)) {
	echo "<h1 align='center'>Data Telah Dihapus</h1>";
	header("Location: ../data_jabatan_honor.php");
}else{
	echo "$sql";
	//echo "Error Deleting Record :";
	//mysqli_error($conn);
}
mysqli_close($conn);
?>