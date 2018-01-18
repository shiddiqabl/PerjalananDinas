<!DOCTYPE HTML>
<html>
	<head>
		<title>Daftar Uang Penginapan</title>
	</head>
	<body>
		<h1>Daftar Uang Penginapan Perjalanan Dinas</h1>
		<h2>Kantor Pengelola Data Elektronik</h2><br />
		<h2>Pemerintah Daerah Kabupaten Sragen</h2>
		<br />
		<?php echo anchor('uang_penginapan_controller/tambah', 'Tambah Uang Harian'); ?><br />
		<table>
			<tr>
				<th>ID</th>
				<th>Nama Provinsi</th>
				<th>Satuan</th>
				<th>Pejabat Negara</th>
				<th>Pejabat Eselon II</th>
				<th>Pejabat Eselon III / Golongan IV</th>
				<th>Pejabat Eselon IV / Golongan III</th>
				<th>Golongan II / I</th>
				<th>Aksi</th>
			</tr>
			<?php 
				$no = 1 ;
				foreach ($daftar_uang_penginapan as $d){
			?>
			<tr>
				<?php $no++; ?>
				<td><?php echo $d->ID_UP; ?></td>
				<td><?php echo $d->nama_prov; ?></td>
				<td>OH</td>
				<td><?php echo $d->PEJABAT_NEGARA; ?></td>
				<td><?php echo $d->ESELON_II; ?></td>
				<td><?php echo $d->ESELON_III; ?></td>
				<td><?php echo $d->ESELON_IV; ?></td>
				<td><?php echo $d->GOL_I; ?></td>
				<td><?php echo anchor('uang_penginapan_controller/edit/'.$d->ID_UP, 'Edit')?>
				<?php echo anchor('uang_penginapan_controller/hapus/'.$d->ID_UP, 'Hapus')?>
				</td>
			</tr>
			<?php }?>
		</table>
		<?php echo anchor('home', 'Home')?>
	</body>
</html>