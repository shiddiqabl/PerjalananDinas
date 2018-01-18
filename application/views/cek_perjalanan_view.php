		<div id="page-wrapper">
			<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Periksa Perjalanan Dinas Baru</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
            	<div class="col-lg-12">
                    <div class="panel panel-default">
                    	<div class="panel-heading">
                           Form Periksa Perjalanan Dinas Baru
                       	</div>
                       	<div class="panel-body">
                       		<div class="row">
                       		<div class="col-lg-6">							
								<form  action="<?php echo base_url().'home/tambah_action'; ?>" method="post" role="form">																
									<div class="form-group">
										<label  for="ID">ID</label>
										<input class="form-control" type="hidden" name="id_perjalanan" value="<?php echo $id_perjalanan;?>">	
										<p class="form-control-static"><?php echo $id_perjalanan?></p>																										
									</div>									
									<div class="form-group">
                                        <label>Pegawai</label>
                                        <input class="form-control" type="hidden" name="NIP_perjalanan" value="<?php echo $nip->NIP;?>">
                                        <p class="form-control-static"><?php echo $nip->NIP?> - <?php echo $nip->NAMA;?></p>                                        
                                    </div>									
									 <div class="form-group">
										<label>Lokasi</label>
										<input class="form-control" type="hidden" name="id_status_perjalanan" value="<?php echo $id_status->ID_STATUS;?>">
										<p class="form-control-static"><?php echo $id_status->STATUS;?></p>                                        
                                    </div>	
									<div class="form-group">
                                    	<label>Tujuan Dinas</label>
	                                   	<input class="form-control" type="hidden" name="id_tujuan_perjalanan" value="<?php echo $id_tujuan;?>">
	                                   	<p class="form-control-static">	<?php if($id_status->ID_STATUS == "S2"){
												  		echo 'Kota '.$daftar_kota[substr($id_tujuan, 5,5)];
													}else 
												  	{
												  		echo 'Kecamatan '.$daftar_kec[substr($id_tujuan, 10,5)];	
												  	}?></p>	                                                                        
                                    </div>                                                                       								
									<div class="form-group">
										<label for="Tanggal_Berangkat">Tanggal Berangkat (tahun/bulan/hari)</label>
										<input class="form-control" type="hidden" name="tgl_berangkat" value="<?php echo $tgl_berangkat;?>">
										<p class="form-control-static"><?php echo $tgl_berangkat;?></p>
									</div>
									<div class="form-group">
										<label for="Tanggal_kembali">Tanggal Kembali (tahun/bulan/hari)</label>
										<input class="form-control" type="hidden" name="tgl_kembali" value="<?php echo $tgl_kembali;?>">
										<p class="form-control-static"><?php echo $tgl_kembali;?></p>
									</div>
									<div class="form-group">
										<label for="Lama_Perjalanan">Lama Perjalanan (hari)</label>
										<input class="form-control" type="hidden" name="lama_perjalanan" value="<?php echo $lama_perjalanan;?>">
										<p class="form-control-static"><?php echo $lama_perjalanan;?></p>
									</div>
									<div class="form-group">
                                        <label>Alat Angkut</label>
                                        <input class="form-control" type="hidden" name="alat_angkut_pd" value="<?php echo $alat_angkut->ID_ANGKUT;?>">
                                        <p class="form-control-static"><?php echo $alat_angkut->ID_ANGKUT?> - <?php echo $alat_angkut->TIPE_ANGKUT_PD;?></p>                                        
                                    </div>
                                    <div class="form-group">
                                        <label>Maksud Perjalanan</label>
                                        <input class="form-control" type="hidden" name="maksud_pd" value="<?php echo $maksud_pd;?>">                                        
                                        <p class="form-control-static"><?php echo $maksud_pd;?></p>
                                    </div>										
									<div class="form-group">
										<label for="Lama_Perjalanan">Status</label>
										<p class="form-control-static">TERENCANA</p>
									</div>								
									<input class="btn btn-primary" type="submit" value="Konfirmasi">
									<a href="<?php echo base_url();?>/home/tambah_perjalanan" class="btn btn-danger" role="button">Batal</a>
								</form>				
							</div>
							</div>
                            <!-- /.row (nested) -->
						</div>
                        <!-- /.panel-body -->
					</div>
                    <!-- /.panel -->
                </div>
			</div>    
            <!-- /.row -->
		</div>
        <!-- /#page-wrapper -->
