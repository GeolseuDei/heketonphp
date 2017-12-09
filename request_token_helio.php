<?php
if(isset($_POST['nama'])){
	$nama = $_POST['nama'];

	include_once('connection.php');
	$sql = "select * from token_helio where nama='".$nama."'";
	$result = mysqli_query($conn,$sql);

	$token;
	if(mysqli_num_rows($result) > 0){
		while($row = mysqli_fetch_assoc($result)) {
			$token = $row['token'];
		}
		echo json_encode(array('token' => $token));
	} else {

	}
	
} else {
	echo 'You cannot access this method.';
}
?>