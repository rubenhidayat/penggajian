<?php
include('dbh.inc.php');


$nip = $_POST['nip'];
$nama = $_POST['nama'];
$kode_golongan = $_POST['kode_golongan'];
$kode_jabatan = $_POST['kode_jabatan'];
$status_kawin = $_POST['status_kawin'];
$jumlah_anak = $_POST['jumlah_anak'];
$jumlah_anggota_keluarga = $_POST['jumlah_anggota_keluarga'];



$sql = "UPDATE guru_pns set nama='$nama', kode_golongan='$kode_golongan', kode_jabatan='$kode_jabatan', status_kawin='$status_kawin', jumlah_anak='$jumlah_anak', jumlah_anggota_keluarga='$jumlah_anggota_keluarga' where nip='$nip' ";



if (mysqli_query($conn, $sql)) {
	header("Location: ../data_guru_pns.php?success");
}else{
	echo "ERROR: ".$sql."<br>". mysqli_error($conn);
}
mysqli_close($conn);

?>