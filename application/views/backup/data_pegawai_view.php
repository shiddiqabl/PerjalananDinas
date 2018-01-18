<!DOCTYPE html>
<html>
<head>
	<title>Daftar Pegawai</title>
</head>
<body>
	<h1>Daftar Pegawai Kantor Pengelola Data Elektronik</h1>
	<h2>Pemerintah Daerah Kabupaten Sragen</h2>
	<?php echo anchor('data_pegawai_controller/tambah', 'Tambah')?>
	<table>
		<tr>
			<th>No</th>
			<th>NIP</th>
			<th>Nama</th>
			<th>Jabatan</th>
			<th>Golongan</th>
			<th>Eselon</th>
			<th>Action</th>
		</tr>
		<?php 
			$no=1;
			foreach($daftar_pegawai as $d){
		?>
		<tr>
			<td><?php $no++?></td>
			<td><?php echo $d->NIP; ?></td>
			<td><?php echo $d->NAMA; ?></td>
			<td><?php echo $d->JABATAN; ?></td>
			<td><?php echo $d->GOLONGAN; ?></td>
			<td><?php echo $d->ESELON; ?></td>
			<td><?php echo anchor('data_pegawai_controller/edit/'.$d->NIP, 'Edit')?>
				<?php echo anchor('data_pegawai_controller/hapus/'.$d->NIP, 'Hapus')?>
			</td>
		</tr>
		<?php }?>
	</table>
	<?php echo anchor('home', 'Home')?>
</body>
</html>