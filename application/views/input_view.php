		<div id="page-wrapper">
			<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Tambah Data Pegawai Baru</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
            	<div class="col-lg-12">
                    <div class="panel panel-default">
                    	<div class="panel-heading">
                           Form Tambah Data Baru
                       	</div>
                       	<div class="panel-body">
                       		<div class="row">
                       		<div class="col-lg-6">							
								<form  action="<?php echo base_url().'data_pegawai_controller/tambah_action'; ?>" method="post" role="form">									
									<div class="form-group">
										<label  for="NIP">NIP</label>
										<input class="form-control" name="NIP" placeholder="NIP tidak melebihi 18 karakter" maxlength="18" autofocus required>																											
									</div>										
									<div class="form-group">
										<label for="Nama">Nama</label>								
										<input class="form-control" name="NAMA" placeholder="NAMA tidak melebihi 30 karakter" maxlength="30" pattern="[A-Za-z\s]{3,}" required>	
									</div>
									<div class="form-group">
										<label for="Jabatan">Jabatan</label>								
										<input class="form-control" name="JABATAN" placeholder="JABATAN tidak melebihi 30 karakter" maxlength="30">	
									</div>
									<div class="form-group">
                                       	<label>Pangkat</label>
                                        <select class="form-control selectpicker" data-live-search="true" name="ID_PANGKAT">
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
