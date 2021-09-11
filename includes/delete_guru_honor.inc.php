<?php
include('dbh.inc.php');
$id_guru = $_GET['id_guru'];
$sql = "DELETE FROM `guru_honor` WHERE id_guru = '$id_guru'";

if (mysqli_query($conn, $sql)) {
	echo "<h1 align='center'>Data Telah Dihapus</h1>";
	header("Location: ../data_guru_honor.php");
}else{
	echo "$sql";
	//echo "Error Deleting Record :";
	//mysqli_error($conn);
}
mysqli_close($conn);
?>