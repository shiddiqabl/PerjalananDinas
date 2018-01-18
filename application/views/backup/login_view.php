<html>
	<head>
		<title>Home</title>
	</head>
	<body>
		<h1>Welcome</h1>
		<h2>Welcome <?php echo $username?> !</h2>
		<?php echo anchor('data_pegawai_controller/index', 'Lihat Daftar Pegawai') ?><br />
		<?php echo anchor('tujuan_dinas_controller/index', 'Lihat Daftar Tujuan Perjalanan Dinas') ?><br />
		<?php echo anchor('uang_harian_controller/index', 'Daftar Uang Harian Per Provinsi'); ?><br />
		<?php echo anchor('uang_penginapan_controller/index', 'Daftar Tarif Penginapan')?><br />
		<?php echo anchor('perjalanan_dinas_controller/index', 'Form Perjalanan Dinas')?><br />
		<a href="home/logout">Logout</a>
	</body>
</html>
