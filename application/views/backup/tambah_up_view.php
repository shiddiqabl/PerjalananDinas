<!DOCTYPE HTML>
<html>
<head>
	<title>Tambah Tarif Penginapan</title>
</head>
<body>
	<h2>Tambah Tarif Penginapan</h2>
	<h3>Sistem Perjalanan Dinas</h3>
	Kantor Pengelola Data Elektronik <br />
	Pemerintah Daerah Kabupaten Sragen<br />
	<br />
	<form action="<?php echo base_url().'uang_penginapan_controller/tambah_action' ;?>" method="post">
		<table>
			<tr>
				<td>ID</td>
				<td><input type="text" name="ID_UP"></td>
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
				<td>Pejabat Negara</td>
				<td><input type="text" name="PEJABAT_NEGARA" /></td>
			</tr>
			<tr>
				<td>Pejabat Eselon II</td>
				<td><input type="text" name="ESELON_II" /></td>
			</tr>
			<tr>
				<td>Pejabat Eselon III / Golongan IV</td>
				<td><input type="text" name="ESELON_III" /></td>
			</tr>
			<tr>
				<td>Pejabat Eselon IV / Golongan III</td>
				<td><input type="text" name="ESELON_IV" /></td>
			</tr>
			<tr>
				<td>Golongan II / I</td>
				<td><input type="text" name="GOL_I" /></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="Tambah"></td>
			</tr>
		</table>
	</form>
	<?php echo anchor('uang_penginapan_controller/index', 'Kembali')?>
</body>
</html>