<!DOCTYPE html>
<html>
	<head>
		<title>Edit Tarif Penginapan</title>
	</head>
	<body>
		<?php foreach ($uang_penginapan as $p){?>
			<form action="<?php echo base_url().'uang_penginapan_controller/update'; ?>" method="post">
				<table>
					<tr>
						<td>ID UP</td>
						<td><input type="hidden" name="id_up" value="<?php echo $p->ID_UP?>"> 
						<?php echo $p->ID_UP?></td>
					</tr>
					<tr>
						<td>Nama Provinsi</td>
						<td><input list="nama_provinsi_edit" name="nama_provinsi_edit" value="<?php echo $p->nama_prov?>">
							<datalist id="nama_provinsi_edit">
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
						<td>Pejabat Negara</td>
						<td><input name="pejabat_negara_edit" value="<?php echo $p->PEJABAT_NEGARA; ?>"></td>
					</tr>
					<tr>
						<td>Eselon II</td>
						<td><input name="eselon_II_edit" value="<?php echo $p->ESELON_II; ?>"></td>
					</tr>
					<tr>
						<td>Eselon III / Golongan IV</td>
						<td><input name="eselon_III_edit" value="<?php echo $p->ESELON_III; ?>"></td>
					</tr>
					<tr>
						<td>Eselon IV / Golongan III</td>
						<td><input name="eselon_IV_edit" value="<?php echo $p->ESELON_IV; ?>"></td>
					</tr>
					<tr>
						<td>Golongan II / I</td>
						<td><input name="golongan_I_edit" value="<?php echo $p->GOL_I; ?>"></td>
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