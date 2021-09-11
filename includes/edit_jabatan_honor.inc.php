<?php
include('dbh.inc.php');


$kode_jabatan = $_POST['kode_jabatan'];
$nama_jabatan = $_POST['nama_jabatan'];
$gapok = $_POST['gapok'];

$sql = "UPDATE jabatan_honor set nama_jabatan='$nama_jabatan', gapok='$gapok' where kode_jabatan='$kode_jabatan' ";



if (mysqli_query($conn, $sql)) {
	header("Location: ../data_jabatan_honor.php?success");
}else{
	echo "ERROR: ".$sql."<br>". mysqli_error($conn);
}
mysqli_close($conn);

?>