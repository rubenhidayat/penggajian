<?php
include('dbh.inc.php');
$nip = $_GET['nip'];
$sql = "DELETE FROM `guru_pns` WHERE nip = '$nip'";

if (mysqli_query($conn, $sql)) {
	echo "<h1 align='center'>Data Telah Dihapus</h1>";
	header("Location: ../data_guru_pns.php");
}else{
	echo "$sql";
	//echo "Error Deleting Record :";
	//mysqli_error($conn);
}
mysqli_close($conn);
?>