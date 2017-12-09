<?php
if(isset($_POST['id'])){
	$id = $_POST['id'];

	include_once('connection.php');
	$sql = "select kode_verif_email from user where id='".$id."'";
	$result = mysqli_query($conn,$sql);

	if(mysqli_num_rows($result) > 0){
		while($row = mysqli_fetch_assoc($result)) {
			echo json_encode(array(
				'responses' => '200', 
				'kode' => $row['kode_verif_email']
			));
		}
	} else {
		echo json_encode(array('responses' => '400'));
	}
	
} else {
	echo 'You cannot access this method.';
}
?>