<?php

  

if (isset($_POST['submit'])) {
	
	include_once 'dbh.inc.php';

	$nama = mysqli_real_escape_string($conn, $_POST['nama']);
	$username = mysqli_real_escape_string($conn, $_POST['username']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);
	//kl dak biso hapus bawah ini
	$confirmpwd = mysqli_real_escape_string($conn, $_POST['confirmpwd']);

	//Error Handlers
	//Check for empty cubrid_field_seek(result)
	//copy ke notepad di folder kp
	if (empty($nama) ||empty($username) || empty($password)|| empty($confirmpwd)) {
		header("Location: signup.php?=empty");
		exit();
	
		}else{
			$sql = "SELECT * FROM admin_honor WHERE username='$username' ";
			$result = mysqli_query($conn, $sql);
			$resulCheck = mysqli_num_rows($result);
			if ($resulCheck > 0) {
				header("Location: ../signup_honor.php?signup=usertaken");
				exit();
			}else{
				if ($password != $confirmpwd) {
					header("Location: ../signup_honor.php?signup=password_doesnt_match");
					exit();
				}else{
					$hashedPwd = password_hash($password, PASSWORD_DEFAULT);
					$sql = "INSERT INTO admin_honor (nama, username, password) VALUES ('$nama', '$username', '$hashedPwd');";
					mysqli_query($conn, $sql);
					header("Location:../index.php?=success") ;
					exit();
				}
			}
		}
	
	//sampe sini

} else {
	header("Location: ../index.php?=gagal");
	exit();
}