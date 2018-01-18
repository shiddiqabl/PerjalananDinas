<!DOCTYPE html>
<html>
<head>
	<title>Tambah Data</title>
</head>
<body>
	<h3>Menambah Perjalanan Dinas</h3>
	<form action="<?php echo base_url().'perjalanan_dinas_controller/tambah_action'; ?>" method="post">
		<table>
			<tr>
				<td>ID Perjalanan</td>
				<td><input type="text" name="id_perjalanan" /></td>
			</tr>
			<tr>
				<td>NIP</td>
				<td><input list="NIP_perjalanan" name="NIP_perjalanan" />
					<datalist id="NIP_perjalanan">
						<?php 
							$no = 1;
							foreach ($daftar_pegawai as $p){
							$no++;	
						?>
						<option value="<?php echo $p->NIP;?>" />
						<?php }?>
					</datalist>
				</td>
			</tr>
			<tr>
				<td>Nama</td>
				<td><input list="NAMA_perjalanan" name="NAMA_perjalanan">
					<datalist id="NAMA_perjalanan">
						<?php 
							$no = 1;
							foreach ($daftar_pegawai as $p2){
							$no++;	
						?>
						<option value="<?php echo $p2->NAMA;?>" />
						<?php }?>
					</datalist>
				</td>
			</tr>
			<tr>
				<td>ID Provinsi</td>
				<td><input list="id_prov_perjalanan" name="id_prov_perjalanan">
					<datalist id="id_prov_perjalanan">
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
				<td><input list="nama_provinsi" name="nama_provinsi">
					<datalist id="nama_provinsi">
						<?php 
							$no = 1;
							foreach ($daftar_provinsi as $pr2){
								$no++;
						?>
						<option value="<?php echo $pr2->nama_prov;?>" />
						<?php }?>
					</datalist>
				</td>
			</tr>
			<tr>
				<td>Tanggal Berangkat</td>
				<td><input type="date" name="tgl_berangkat"></td>
			</tr>
			<tr>
				<td>Tanggal Kembali</td>
				<td><input type="date" name="tgl_kembali"></td>
			</tr>
			<tr>
				<td>Lama Perjalanan (hari)</td>
				<td><input type="text" name="lama_perjalanan"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="Tambah"></td>
			</tr>
		</table>
		<?php echo anchor('perjalanan_dinas_controller/index', 'Kembali')?>
	</form>
</body>
</html>