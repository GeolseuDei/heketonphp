<?php
if(isset($_POST['id'])){
	$id = $_POST['id'];

	include_once('connection.php');
	$sql = "update user set status_verif_nohp=1 where id='".$id."'";
	if(mysqli_query($conn,$sql)){
		echo json_encode(array('responses' => '200'));
	} else {
		echo mysqli_error($conn);
	}

} else {
	echo 'You cannot access this method.';
}
?>