<!DOCTYPE html>
<html>
	<head>
		<title>Edit Tujuan Dinas</title>
	</head>
	<body>
		<?php foreach ($provinsi as $p){?>
			<form action="<?php echo base_url().'tujuan_dinas_controller/update'; ?>" method="post">
				<table>
					<tr>
						<td>ID Provinsi</td>
						<td><input type="hidden" name="id_prov" value="<?php echo $p->id_prov?>"> 
						<?php echo $p->id_prov?></td>
					</tr>
					<tr>
						<td>Nama Provinsi</td>
						<td><input type="text" name="nama_prov" value="<?php echo $p->nama_prov?>"></td>
					</tr>
					<tr>
						<td></td>
						<td><input type="submit" value="Submit"></td>
					</tr>
				</table>
			</form>
		<?php }?>
	</body>
</html>