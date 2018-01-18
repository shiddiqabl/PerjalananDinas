<!DOCTYPE HTML>
<html>
<head>
	<title>Tambah Uang Harian</title>
</head>
<body>
	<h2>Tambah Uang Harian</h2>
	<h3>Sistem Perjalanan Dinas</h3>
	Kantor Pengelola Data Elektronik <br />
	Pemerintah Daerah Kabupaten Sragen<br />
	<br />
	<form action="<?php echo base_url().'uang_harian_controller/tambah_action' ;?>" method="post">
		<table>
			<tr>
				<td>ID</td>
				<td><input type="text" name="ID_UH"></td>
			</tr>
			<tr>
				<td>Nama Provinsi</td>
				<td><input list="nama_provinsi" name="nama_provinsi">
					<datalist id="nama_provinsi">
						<?php 
							$no = 1 ;
							foreach ($daftar_provinsi as $d){
								$no++;
						?>
						<option value="<?php echo $d->nama_prov; ?>" />
						<?php }?>
					</datalist>
				</td>
			</tr>
			<tr>
				<td>Luar Kota</td>
				<td><input type="text" name="LUAR_KOTA" /></td>
			</tr>
			<tr>
				<td>Dalam Kota</td>
				<td><input type="text" name="DALAM_KOTA" /></td>
			</tr>
			<tr>
				<td>Diklat</td>
				<td><input type="text" name="DIKLAT" /></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="Tambah"></td>
			</tr>
		</table>
	</form>
	<?php echo anchor('uang_harian_controller/index', 'Kembali')?>
</body>
</html>