<?php
include('dbh.inc.php');
$kode_golongan = $_GET['kode_golongan'];
$sql = "DELETE FROM `golongan_pns` WHERE `golongan_pns`.`kode_golongan` = '$kode_golongan'";
$sqlUpdate ="UPDATE guru_pns SET guru_pns.kode_golongan='' WHERE guru_pns.kode_golongan='$kode_golongan'";
$execute = mysqli_query($conn, $sqlUpdate);
//$sqlUpdate = "UPDATE guru_pns SET guru_pns."
if (mysqli_query($conn, $sql)) {
	echo "<h1 align='center'>Data Telah Dihapus</h1>";
	header("Location: ../data_golongan_pns.php");
}else{
	echo "$sql";
	//echo "Error Deleting Record :";
	//mysqli_error($conn);
}
mysqli_close($conn);
?>