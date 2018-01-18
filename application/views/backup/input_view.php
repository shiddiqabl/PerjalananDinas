<!DOCTYPE html>
<html>
<head>
	<title>Tambah Data</title>
</head>
<body>
	<h3>Menambah Data Pegawai</h3>
	<form action="<?php echo base_url().'data_pegawai_controller/tambah_action'; ?>" method="post">
		<table>
			<tr>
				<td>NIP</td>
				<td><input type="text" name="NIP" /></td>
			</tr>
			<tr>
				<td>Nama</td>
				<td><input type="text" name="nama" /></td>
			</tr>
			<tr>
				<td>Jabatan</td>
				<td><input type="text" name="jabatan"></td>
			</tr>
			<tr>
				<td>Golongan</td>
				<td><input type="text" name="golongan"></td>
			</tr>
			<tr>
				<td>Eselon</td>
				<td><input type="text" name="eselon"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="Tambah"></td>
			</tr>
		</table>
	</form>
	<?php echo anchor('data_pegawai_controller/index', 'Kembali')?>
</body>
</html>