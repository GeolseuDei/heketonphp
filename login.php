<?php
if(isset($_POST['email'])){
	$email = $_POST['email'];
	$pw = $_POST['password'];
	$pwmd5 = md5($pw);

	include_once('connection.php');
	$sql = "select * from user where email='".$email."' and password='".$pwmd5."'";
	$result = mysqli_query($conn,$sql);

	if(mysqli_num_rows($result) > 0){
		while($row = mysqli_fetch_assoc($result)) {
			echo json_encode(array(
				'responses' => '200', 
				'id' => $row['id'],
				'email' => $row['email'],
				'nohp' => $row['nohp'],
				'status_verif_nohp' => $row['status_verif_nohp'],
				'status_verif_email' => $row['status_verif_email']
			));
		}
	} else {
		echo json_encode(array('responses' => '400'));
	}
	
} else {
	echo 'You cannot access this method.';
}
?>