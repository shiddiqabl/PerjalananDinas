		<div id="page-wrapper">
			<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit Uang Harian Perjalanan Dinas</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
            	<div class="col-lg-12">
                    <div class="panel panel-default">
                    	<div class="panel-heading">
                           Edit Uang Harian Perjalanan Dinas
                       	</div>
                       	<div class="panel-body">
                       		<div class="row">
                       		<div class="col-lg-6">	
							<?php foreach ($uang_harian as $h){?>
								<form  action="<?php echo base_url().'uang_harian_controller/update'; ?>" method="post" role="form">									
									<div class="form-group">
										<label  for="ID_UH">ID UH</label>
										<input type="hidden" name="ID_UH" value="<?php echo $h->ID_UH?>"> 
										<p class="form-control-static"><?php echo $h->ID_UH?></p>																		
									</div>
									<div class="form-group">
										<label for="Nama_Provinsi">Nama Provinsi</label>
                                        <select class="form-control selectpicker" data-live-search="true" name="ID_PROV_EDIT">
                                        	<option value = "<?php echo $h->ID_PROV;?>" selected>
                                        		<?php echo $h->ID_PROV?> - <?php echo $h->NAMA_PROV;?>
                                        	</option>
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
										<label for="Status_Lokasi">Status Lokasi</label>
                                        <select class="form-control selectpicker" data-live-search="true" name="ID_STATUS_EDIT">
                                        	<option value = "<?php echo $h->ID_STATUS;?>" selected>
                                        		<?php echo $h->ID_STATUS?> - <?php echo $h->STATUS;?>
                                        	</option>
                                            <?php 
                                            $no = 1;
                                            foreach ($daftar_status as $sl){
                                            	$no++;                                                                                              
                                            ?>
                                            <option value = "<?php echo $sl->ID_STATUS;?>">
                                            	<?php echo $sl->ID_STATUS;?> - <?php echo $sl->STATUS;?>
                                            </option>
                                            <?php }?>                                             
                                      	</select>
                                    </div>											
									<div class="form-group">
										<label for="Nominal">Nominal</label>
										<input class="form-control" type="text" name="NOMINAL_EDIT" value="<?php echo $h->NOMINAL?>">
									</div>									
									<input class="btn btn-primary" type="submit" value="Simpan">
									<a href="<?php echo base_url();?>uang_harian_controller/index" class="btn btn-danger" role="button">Batal</a>
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