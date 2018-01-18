<!DOCTYPE HTML>
<html>
	<head>
		<title>Daftar Tujuan Perjalanan Dinas</title>
	</head>
	<body>
		<h1>Daftar ID dan Nama Provinsi Tujuan Perjalanan Dinas</h1>
		<?php echo anchor('tujuan_dinas_controller/tambah', 'Tambah Provinsi')?>
		<table>
			<tr>
				<th>ID Provinsi</th>
				<th>Nama Provinsi</th>
				<th>Aksi</th>
			</tr>
			<?php 
				$no = 1;
				foreach ($daftar_tujuan as $d){
			?>
			<tr>
				<?php $no++; ?>
				<td><?php echo $d->id_prov; ?></td>
				<td><?php echo $d->nama_prov; ?></td>
				<td><?php echo anchor('tujuan_dinas_controller/edit/'.$d->id_prov, 'Edit')?>
				<?php echo anchor('tujuan_dinas_controller/hapus/'.$d->id_prov, 'Hapus')?>
				</td>
			</tr>
			<?php }?>
		</table>
		<?php echo anchor('home', 'Home')?>
	</body>
</html>