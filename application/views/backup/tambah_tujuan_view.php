<!DOCTYPE HTML>
<html>
	<head>
		<title>Tambah Tujuan Dinas</title>
	</head>
	<body>
		<h2>Tambah Tujuan Dinas </h2>
		<form action="<?php echo base_url().'tujuan_dinas_controller/tambah_action'; ?>" method="post">
			<table>
				<tr>
					<td>ID Provinsi</td>
					<td><input type="text" name="id_prov"></td>
				</tr>
				<tr>
					<td>Nama Provinsi</td>
					<td><input type="text" name="nama_prov"></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" value="Tambah"></td>
				</tr>
			</table>
		</form>
		<?php echo anchor('tujuan_dinas_controller/index', 'Kembali')?>
	</body>
</html>