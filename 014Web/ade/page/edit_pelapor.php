<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-0">
			<div class="col-sm-12">
			<h1 align="center">Form Edit Pelapor</h1>
			</div>
		</div>
	</div>
</section>
<?php
if(isset($_POST['edit_pelapor'])){
	$id=$_POST['id'];
	$nama=$_POST['nama'];
	$latitude=$_POST['latitude'];
	$longitude=$_POST['longitude'];

	if(empty($id) || empty($nama)){
	echo '<div class="warning">Data Tidak Boleh Kosong</div>';
	}else{
	 $edit=mysqli_query($koneksi, "update studio SET nama='$nama',latitude='$latitude',
	 longitude='$longitude' where id='$id'");

		if($edit){
		 echo '<div class="Success")pelapor Berhasil Diedit</div>';
		 echo "<meta http-equiv='refresh' content='0 url=index.php?page=pelapor'>";
		}else{
		 echo '<div class="error")pelapor Gagal Diedit</div>';
		} 	
	}
}
$id=$_GET['id'];
$sql =mysqli_query($koneksi,"select * from studio where id='$id'");
$result = mysqli_fetch_array($sql);
?>
<section class="content">
<div class="container-fluid">
<div class="card">
<div class="card-body p-2">
<form method="post" action="">
<fieldset style="border:1px solid orange;">
<legend>Edit pelapor</legend>
<input type="hidden" name="id" placeholder="ID Pelapor" class="form-control" value="<?php echo $id;?>">
<br>
<label>Nama pelapor</label>
<input type="text" name="nama" placeholder="Nama pelapor" class="form-control" value="<?php echo $result['nama'];?>">
<br>
<label>latitude</label>
<input type="text" name="latitude" placeholder="latitude" class="form-control" value="<?php echo $result['latitude'];?>">
<br>
<label>longitude</label>
<input type="text" name="longitude" placeholder="longitude" class="form-control" value="<?php echo $result['longitude'];?>">
<br>
<input type="submit" name="edit_pelapor" value="EDIT" class="submit btn btn-md btn-success">
</fieldset></form>
</div>
</div>
</div>
</section>