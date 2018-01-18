<!DOCTYPE html>
<html>
	<head>
		<title>Edit Uang Harian</title>
	</head>
	<body>
		<?php foreach ($uang_harian as $h){?>
			<form action="<?php echo base_url().'uang_harian_controller/update'; ?>" method="post">
				<table>
					<tr>
						<td>ID UH</td>
						<td><input type="hidden" name="id_uh" value="<?php echo $h->ID_UH?>"> 
						<?php echo $h->ID_UH?></td>
					</tr>
					<tr>
						<td>Nama Provinsi</td>
						<td><input list="nama_prov_edit" name="nama_prov_edit" value="<?php echo $h->nama_prov?>">
							<datalist id="nama_prov_edit">
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
						<td><input name="luar_kota_edit" value="<?php echo $h->LUAR_KOTA; ?>"></td>
					</tr>
					<tr>
						<td>Dalam Kota</td>
						<td><input name="dalam_kota_edit" value="<?php echo $h->DALAM_KOTA; ?>"></td>
					</tr>
					<tr>
						<td>Diklat</td>
						<td><input name="diklat_edit" value="<?php echo $h->DIKLAT; ?>"></td>
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