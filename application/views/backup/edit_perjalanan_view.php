<!DOCTYPE html>
<html>
	<head>
		<title>Edit Perjalanan Dinas</title>
	</head>
	<body>
		<?php foreach ($dinas_edit as $pd){?>
			<form action="<?php echo base_url().'home/update'; ?>" method="post">
				<table>
					<tr>
						<td>ID</td>
						<td><input type="hidden" name="id_perjalanan" value="<?php echo $pd->id_perjalanan?>"> 
						<?php echo $pd->id_perjalanan?></td>
					</tr>
					<tr>
						<td>NIP</td>
						<td><input list="NIP_perjalanan_edit" name="NIP_perjalanan_edit" value="<?php echo $pd->NIP?>"/>
							<datalist id="NIP_perjalanan_edit">
								<?php 
								$no = 1;
								foreach ($daftar_pegawai as $pg){
								$no++;	
								?>
							<option value="<?php echo $pg->NIP;?>" />
							<?php }?>
						</datalist>
						</td>
					</tr>
					<tr>
						<td>Nama Pegawai</td>
						<td><input list="NAMA_perjalanan_edit" name="NAMA_perjalanan_edit" value="<?php echo $pd->NAMA?>">
							<datalist id="NAMA_perjalanan_edit">
								<?php 
								$no = 1;
								foreach ($daftar_pegawai as $pg2){
								$no++;	
								?>
							<option value="<?php echo $pg2->NAMA;?>" />
							<?php }?>
							</datalist>
						</td>
					</tr>
					<tr>
						<td>ID Provinsi</td>
						<td><input list="id_prov_perjalanan_edit" name="id_prov_perjalanan_edit" value="<?php echo $pd->id_prov?>">
							<datalist id="id_prov_perjalanan_edit">
							<?php 
							$no = 1;
							foreach ($daftar_provinsi as $pr){
								$no++;
							?>
							<option value="<?php echo $pr->id_prov;?>" />
							<?php }?>
							</datalist>
						</td>
					</tr>
					<tr>
						<td>Nama Provinsi</td>
						<td><input list="nama_prov_perjalanan_edit" name="nama_prov_perjalanan_edit" value="<?php echo $pd->nama_prov?>">
							<datalist id="nama_prov_perjalanan_edit">
							<?php 
								$no = 1 ;
								foreach ($daftar_provinsi as $pr){
									$no++;
							?>
							<option value="<?php echo $pr->nama_prov; ?>" />
							<?php }?>
							</datalist>
						</td>
					</tr>
					<tr>
						<td>Tanggal Berangkat</td>
						<td><input type="date" name="tgl_berangkat_edit" value="<?php echo $pd->tgl_berangkat?>"></td>
					</tr>
					<tr>
						<td>Tanggal Kembali</td>
						<td><input type="date" name="tgl_kembali_edit" value="<?php echo $pd->tgl_kembali?>"></td>
					</tr>
					<tr>
						<td>Lama Perjalanan (hari)</td>
						<td><input type="text" name="lama_perjalanan_edit" value="<?php echo $pd->lama_perjalanan?>"></td>
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