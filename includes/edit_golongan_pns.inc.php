<?php
include('dbh.inc.php');


$kode_golongan = $_POST['kode_golongan'];
$nama_golongan = $_POST['nama_golongan'];
$mkg = $_POST['mkg'];
$gapok = $_POST['gapok'];
$tj_suami_istri = $_POST['tj_suami_istri'];
$tj_anak = $_POST['tj_anak'];
$tj_fungsional = $_POST['tj_fungsional'];
$pot_tp = $_POST['pot_tp'];

$sql = "UPDATE golongan_pns set nama_golongan='$nama_golongan', mkg='$mkg', gapok='$gapok', tj_suami_istri='$tj_suami_istri', tj_anak='$tj_anak', tj_fungsional='$tj_fungsional', pot_tp='$pot_tp' where kode_golongan='$kode_golongan' ";



if (mysqli_query($conn, $sql)) {
	header("Location: ../data_golongan_pns.php?success");
}else{
	echo "ERROR: ".$sql."<br>". mysqli_error($conn);
}
mysqli_close($conn);

?>