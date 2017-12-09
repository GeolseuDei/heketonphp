<?php
//if(isset($_GET['msg'])){
$msg = $_GET['msg'];
$id = $_GET['iden'];

$kode;
include_once('connection.php');
$sql = "select kode_verif_email from user where id='".$id."'";
$result = mysqli_query($conn,$sql);
if(mysqli_num_rows($result) > 0){
	while($row = mysqli_fetch_assoc($result)) {
		$kode = $row['kode_verif_email'];
	}
	if($msg==$kode){
		$sql = "update user set status_verif_email=1 where id='".$id."'";
		if(mysqli_query($conn,$sql)){
			echo 'Email anda sukses terverifikasi.';
		} else {
			echo 'Email anda gagal terverifikasi.';
		}
	} else {
		echo 'Email anda gagal terverifikasi.';
	}
} else {
	echo json_encode(array('responses' => '400'));
}


//} else {
	//echo 'You cannot access this method.';
//}
?>