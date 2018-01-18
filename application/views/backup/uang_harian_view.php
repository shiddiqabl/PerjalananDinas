<!DOCTYPE HTML>
<html>
	<head>
		<title>Daftar Uang Harian</title>
	</head>
	<body>
		<h1>Daftar Uang Harian Perjalanan Dinas</h1>
		<h2>Kantor Pengelola Data Elektronik</h2><br />
		<h2>Pemerintah Daerah Kabupaten Sragen</h2>
		<br />
		<?php echo anchor('uang_harian_controller/tambah', 'Tambah Uang Harian'); ?><br />
		<table>
			<tr>
				<th>ID</th>
				<th>Nama Provinsi</th>
				<th>Satuan</th>
				<th>Luar Kota</th>
				<th>Dalam Kota</th>
				<th>Diklat</th>
				<th>Aksi</th>
			</tr>
			<?php 
				$no = 1 ;
				foreach ($daftar_uang_harian as $d){
			?>
			<tr>
				<?php $no++; ?>
				<td><?php echo $d->ID_UH; ?></td>
				<td><?php echo $d->nama_prov; ?></td>
				<td>OH</td>
				<td><?php echo $d->LUAR_KOTA; ?></td>
				<td><?php echo $d->DALAM_KOTA; ?></td>
				<td><?php echo $d->DIKLAT; ?></td>
				<td><?php echo anchor('uang_harian_controller/edit/'.$d->ID_UH, 'Edit')?>
				<?php echo anchor('uang_harian_controller/hapus/'.$d->ID_UH, 'Hapus')?>
				</td>
			</tr>
			<?php }?>
		</table>
		<?php echo anchor('home', 'Home')?>
	</body>
</html>