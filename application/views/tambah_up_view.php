		<div id="page-wrapper">
			<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Tambah Data Uang Penginapan</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
            	<div class="col-lg-12">
                    <div class="panel panel-default">
                    	<div class="panel-heading">
                           Form Tambah Data Uang Penginapan Perjalanan Dinas
                       	</div>
                       	<div class="panel-body">
                       		<div class="row">
                       		<div class="col-lg-6">							
								<form  action="<?php echo base_url().'uang_penginapan_controller/tambah_action'; ?>" method="post" role="form">									
									<div class="form-group">
										<label  for="ID">ID</label>
										<input class="form-control" name="ID_UP" maxlength="5" placeholder="Contoh = UP003" autofocus>																											
									</div>
									<div class="form-group">
										<label for="Nama_Provinsi">Nama Provinsi</label>
										<select class="form-control selectpicker" data-live-search="true" name="ID_PROV">
                                        	<?php 
                                            	$no = 1;
                                                foreach ($daftar_provinsi as $pr){
                                                	$no++;                                                                                              
                                        	?>
                                            <option value = "<?php echo $pr->ID_PROV;?>">
                                            <?php echo $pr->ID_PROV;?> - <?php echo $pr->NAMA_PROV;?>
                                            </option>
                                            <?php }?>                                             
                                       	</select>
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
									<div class="form-group">
										<label for="Nominal">Nominal</label>
										<input class="form-control" type="text" name="NOMINAL" placeholder="Contoh = 850000 (tanpa titik)">
									</div>											
									<input class="btn btn-primary" type="submit" value="Simpan">
									<a href="<?php echo base_url();?>uang_harian_controller/index" class="btn btn-danger" role="button">Batal</a>
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
