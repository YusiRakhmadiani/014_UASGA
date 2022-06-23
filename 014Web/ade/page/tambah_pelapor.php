<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-0">
				<div class="col-sm-12">
				<h1 align="center">Form Tambah Pelapor Baru</h1>
				</div>
			</div>
		</div>
	</section>
<!--Skrip Simpan Data Baru-->
<?php
if(isset($_POST['tambah_pelapor'])) {
	$id=$_POST['id'];
	$nama=$_POST['nama'];
	$latitude=$_POST['latitude'];
	$longitude=$_POST['longitude'];

	if(empty($id)){
	echo '<div class="warning">Data pelapor Tidak Boleh Kosong</div>';
	}else{
	 $insert=mysqli_query($koneksi, "insert into studio (id,nama,latitude,longitude)
	 values ('$id','$nama','$latitude','$longitude')");

		if($insert){
		 echo '<div class="alert alert-succes alert-dismissible">Berhasil Disimpan</div>';
		 echo "<meta http-equiv='refresh' content='0 url=index.php?page=pelapor'>";
		}else{
		 echo '<div class="error">pelapor Gagal Disimpan</div>';
		} 	
	}
}
?>
<!--Batas Simpan data-->
<!--Main Content-->
<section class="content">
<div class="container-fluid">
<div class="card">
<div class="card-body p-2">
<form method="post" action="">
<br>ID Pelapor
<input type="text" name="id" placeholder="id" class="form-control">
<br>Nama pelapor
<input type="text" name="nama" placeholder="Nama Pelapor" class="form-control">
<br>latitude
<input type="text" name="latitude" placeholder="latitude" class="form-control">
<br>longitude
<input type="text" name="longitude" placeholder="longitude" class="form-control">
<br>
<input type="submit" name="tambah_pelapor" value="SIMPAN" class="submit btn btn-md btn-success">
</form>
</div>
</div>
</div>
</section>