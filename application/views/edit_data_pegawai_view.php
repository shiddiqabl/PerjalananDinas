		<div id="page-wrapper">
			<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit Data Pegawai</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
            	<div class="col-lg-12">
                    <div class="panel panel-default">
                    	<div class="panel-heading">
                           Edit Data Pegawai Pemerintah Daerah Kabupaten Sragen
                       	</div>
                       	<div class="panel-body">
                       		<div class="row">
                       		<div class="col-lg-6">	
							<?php foreach ($pegawai as $p){?>
								<form  action="<?php echo base_url().'data_pegawai_controller/update'; ?>" method="post" role="form">									
									<div class="form-group">
										<label  for="NIP">NIP</label>
										<input type="hidden" name="NIP" value="<?php echo $p->NIP?>"> 
										<p class="form-control-static"><?php echo $p->NIP?></p>																		
									</div>
									<div class="form-group">
										<label for="Nama">Nama</label>
										<input class="form-control" type="text" name="NAMA_EDIT" value="<?php echo $p->NAMA?>" maxlength="30">
									</div>
									<div class="form-group">
										<label for="Jabatan">Jabatan</label>
										<input class="form-control" type="text" name="JABATAN_EDIT" value="<?php echo $p->JABATAN?>" maxlength="30">
									</div>									
									<div class="form-group">
                                            <label>Pangkat</label>
                                            <select class="form-control selectpicker" data-live-search="true" name="ID_PANGKAT_EDIT">
                                                <option value = "<?php echo $p->ID_PANGKAT;?>" selected><?php echo $p->ID_PANGKAT?> - <?php echo $p->PANGKAT;?></option>
                                                <?php 
                                                $no = 1;
                                                foreach ($daftar_pangkat as $pa){
                                                	$no++;                                                                                              
                                                ?>
                                                <option value = "<?php echo $pa->ID_PANGKAT;?>">
                                                	<?php echo $pa->ID_PANGKAT;?> - <?php echo $pa->PANGKAT;?>
                                                </option>
                                                <?php }?>                                             
                                            </select>
                                    </div>		
									<input class="btn btn-primary" type="submit" value="Simpan">
									<a href="<?php echo base_url();?>data_pegawai_controller/index" class="btn btn-danger" role="button">Batal</a>
								</form>
							<?php }?>
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
