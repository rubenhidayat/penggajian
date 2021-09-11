<?php



	include 'dbh.inc.php';
	

$id_guru = $_GET['id_guru'];
$nuptik =$_POST['nuptik'];
$nama = $_POST['nama'];
$kode_jabatan = $_POST['kode_jabatan'];
$tunjangan = $_POST['tunjangan'];
$potongan = $_POST['potongan'];

$sql = "UPDATE guru_honor set nuptik='$nuptik', nama='$nama', kode_jabatan='$kode_jabatan',  tunjangan='$tunjangan', potongan='$potongan' where id_guru='$id_guru' ";


if (mysqli_query($conn, $sql)) {
	header("Location: ../data_guru_honor.php");
} else {
	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);






?>