<?php
include'connectionn.php';
 $id 				= $_POST['id'];
 $nama 				= $_POST['nama'];
 $latitude 			= $_POST['latitude'];
 $longitude 		= $_POST['longitude'];
 
//pembuatan syntax SQL
if($id != '' && $nama != ''){
	$sql = mysqli_query($con,"INSERT INTO lokasi(id,nama,latitude,longitude)
	VALUES('$id','$nama','$latitude','$longitude')");
} 	
if ($sql){
	echo "berhasil";
}else{
	echo "gagal";
}
mysqli_close($con);
?>