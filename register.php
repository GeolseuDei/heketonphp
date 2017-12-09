<?php
if(isset($_POST['email'])){
	$email = $_POST['email'];
	$pw = $_POST['pw'];
	$pwmd5 = md5($pw);
	$nohp = $_POST['nohp'];

	$kode_verif_nohp = rand(100000,999999);

	function generateRandomString($length = 10) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}

	include_once('connection.php');
	$sql = "select * from user where email='".$email."'";
	$result = mysqli_query($conn,$sql);
	if(mysqli_num_rows($result) > 0){
		echo json_encode(array('responses' => 'exist'));
	} else {
		$sql = "insert into user (email,password,nohp,status_verif_nohp,status_verif_email,kode_verif_email) values ('".$email."','".$pwmd5."','".$nohp."','0','0','".generateRandomString(255)."')";
		if(mysqli_query($conn,$sql)){
			$sql = "select * from user where email='".$email."'";
			$result = mysqli_query($conn,$sql);
			$id;
			if(mysqli_num_rows($result) > 0){
				while($row = mysqli_fetch_assoc($result)) {
					$id = $row['id'];
				}
			}
			echo json_encode(array('responses' => $kode_verif_nohp, 'id' => $id));
		} else {
			echo json_encode(array('responses' => '400'));
		}
	}
	
} else {
	echo 'You cannot access this method.';
}
?>