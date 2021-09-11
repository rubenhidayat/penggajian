<?php
include('dbh.inc.php');


$kode_jabatan = $_POST['kode_jabatan'];
$nama_jabatan = $_POST['nama_jabatan'];
$tj_jabatan = $_POST['tj_jabatan'];

$sql = "UPDATE jabatan_pns set nama_jabatan='$nama_jabatan', tj_jabatan='$tj_jabatan' where kode_jabatan='$kode_jabatan' ";



if (mysqli_query($conn, $sql)) {
	header("Location: ../data_jabatan_pns.php?success");
}else{
	echo "ERROR: ".$sql."<br>". mysqli_error($conn);
}
mysqli_close($conn);

?>