<?php
if(isset($_POST['namaapi'])){
	$namaapi = $_POST['namaapi'];

	include_once('connection.php');
	$sql = "select * from apikey where nama='".$namaapi."'";
	$result = mysqli_query($conn,$sql);

	$key;
	if(mysqli_num_rows($result) > 0){
		while($row = mysqli_fetch_assoc($result)) {
			$key = $row['apikey'];
		}
		echo json_encode(array('responses' => $key));
	} else {

	}
	
} else {
	echo 'You cannot access this method.';
}
?>