<!DOCTYPE html>
<html>
<head>
	<title>Edit Data Pegawai</title>
</head>
<body>
	<?php foreach ($pegawai as $p) {?>
	<form action ="<?php echo base_url().'data_pegawai_controller/update'; ?>" method="post">
		<table>
			<tr>
				<td>NIP</td>
				<td><input type="hidden" name="nip" value="<?php echo $p->NIP?>">
				<?php echo $p->NIP?></td>
			</tr>
			<tr>
				<td>Nama</td>
				<td><input type="text" name="nama" value="<?php echo $p->NAMA?>" ></td>
			</tr>
			<tr>
				<td>Jabatan</td>
				<td><input type="text" name="jabatan" value="<?php echo $p->JABATAN?>"></td>
			</tr>
			<tr>
				<td>Golongan</td>
				<td><input type="text" name="golongan" value="<?php echo $p->GOLONGAN?>"></td>
			</tr>
			<tr>
				<td>Eselon</td>
				<td><input type="text" name="eselon" value="<?php echo $p->ESELON?>"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="Simpan"></td>
			</tr>
		</table>
	</form>
	<?php }?>
</body>
</html>