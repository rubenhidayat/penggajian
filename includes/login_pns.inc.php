<?php  

session_start();

if (isset($_POST['submit'])) {
	
	include 'dbh.inc.php';

	$username = mysqli_real_escape_string($conn, $_POST['username']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);

	//error handlers
	//check if inputs are empty
	if (empty($username) || empty($password)) {
		header("Location: ../login_pns.php?login=empty");
		exit();
	} else {
		$sql = "SELECT * FROM admin_pns WHERE username='$username'";
		$result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);
		if ($resultCheck < 1) {
			header("Location: ../login_pns.php?login=error1");
				exit();
		} else {
			if ($row = mysqli_fetch_assoc($result)) {
				//De-hashing the password
				$hasedPwdCheck = password_verify($password, $row['password']);
				if ($hasedPwdCheck == false) {
					header("Location: ../login_pns.php?login=error2");
					exit();
				} elseif ($hasedPwdCheck == true) {
					//login the user here
					$_SESSION['u_id_admin']=$row['id_admin'];
					$_SESSION['u_nama']=$row['nama'];
					$_SESSION['u_username']=$row['username'];
					$_SESSION['status'] = "login";
					header("Location: ../admin_pns.php");
					exit();
				}
			}
		}
	}
} else {
	header("Location: ../login.php?login=error");
	exit();
}

?>