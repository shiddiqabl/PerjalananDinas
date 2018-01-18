<!DOCTYPE html>
<html>
	<head>
		<title>Daftar Perjalanan Dinas</title>
	</head>
	<body>
		<h1>Daftar Perjalanan Dinas</h1>
		<h2>Kantor Pengelola Data Elektronik</h2>
		<h2>Pemerintah Daerah Kabupaten Sragen</h2>
		<?php echo anchor('perjalanan_dinas_controller/tambah_perjalanan', 'Tambah')?>
		<table>
			<tr>
				<th>NO</th>
				<th>ID Perjalanan</th>
				<th>NIP</th>
				<th>Nama</th>
				<th>ID Provinsi</th>
				<th>Nama Provinsi</th>
				<th>Tanggal Berangkat</th>
				<th>Tanggal Kembali</th>
				<th>Lama Perjalanan</th>
				<th>Aksi</th>
			</tr>
			<?php 
				$no = 1;
				foreach($perjalanan_dinas as $d){
			?>
			<tr>
				<td><?php $no++?></td>
				<td><?php echo $d->id_perjalanan; ?></td>
				<td><?php echo $d->NIP; ?></td>
				<td><?php echo $d->NAMA; ?></td>
				<td><?php echo $d->id_prov; ?></td>
				<td><?php echo $d->nama_prov; ?></td>
				<td><?php echo $d->tgl_berangkat; ?></td>
				<td><?php echo $d->tgl_kembali; ?></td>
				<td><?php echo $d->lama_perjalanan; ?></td>
				<td><?php echo anchor('perjalanan_dinas_controller/edit/'.$d->id_perjalanan, 'Edit')?>
					<?php echo anchor('perjalanan_dinas_controller/hapus/'.$d->id_perjalanan, 'Hapus')?>
				</td>
			</tr>
			<?php }?>
		</table>
		<?php echo anchor('home', 'Home')?>
	</body>
</html>