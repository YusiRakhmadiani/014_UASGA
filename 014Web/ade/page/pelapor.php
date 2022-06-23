<section class="content-header">
	<div clss="container-fluid">
		<div class="row mb-0">
			<div class="col-sm-12">
<h2 align="center"> Data Pelaporan Kebakaran</h2>
<a href="index.php?page=tambah_pelapor" class="btn btn-success">TAMBAH PELAPOR BARU</a>
</div>
</div>
</div>
</section>
<?php
include "config/koneksi.php";
if(isset($_GET['action'])) {
	if($_GET['action']=='hapus') {
	$id = $_GET['id'];
	$sql =mysqli_query($koneksi ,"delete from studio where id='$id'");
	   if($sql){
		 echo '<div class="alert alert-warning alert-dismissible">Pelapor Berhasil Dihapus</div>';
	   }else{
		 echo '<div class="eror">Pelapor Gagal Dihapus</div>';
		}
	}
}
?>
<section class="content">
	<div class="container-fluid">
	<div class="card">
	<div class="card-body p-2">
	<table id="tabel-pelapor" class="table table-striped">
		<tbody>
		  <tr>
		  <th><i class=""></i>NO</th>
		  <th align="center"><i class="icon_profile"></i>ID Pelapor</th>
		  <th align="center"><i class="icon_profile"></i>Nama pelapor</th>
		  <th align="center"><i class="icon_profile"></i>latitude</th>
		  <th align="center"><i class="icon_profile"></i>longitude</th>
		  <th align="center"><i class="icon_cogs"></i>Action<th>
		  </tr>
<?php
 $sql =mysqli_query($koneksi ,"select * from studio order by id");
 $no=1;
 ?>

 <?php
   while($result=mysqli_fetch_array($sql)){
   echo '<tr><td>'.$no.'</td>
 		<td>'.$result['id'].'</td>
 		<td>'.$result['nama'].'</td>
 		<td>'.$result['latitude'].'</td>
 		<td>'.$result['longitude'].'</td>
 		<td align="left">
<a href="index.php?page=edit_pelapor&id='.$result['id'].'"class="btn btn-warning">EDIT</a>
<a href="index.php?page=pelapor&action=hapus&id='.$result['id'].'" class="btn btn-danger">HAPUS</a>
		</td></tr>';
		$no++;
	}
 ?>
 </tbody></table>
 </div>
 </div>
 </div>
 </section>