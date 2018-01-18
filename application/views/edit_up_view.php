		<div id="page-wrapper">
			<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit Tarif Penginapan Perjalanan Dinas</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
            	<div class="col-lg-12">
                    <div class="panel panel-default">
                    	<div class="panel-heading">
                           Edit Tarif Penginapan Perjalanan Dinas
                       	</div>
                       	<div class="panel-body">
                       		<div class="row">
                       		<div class="col-lg-6">	
							<?php foreach ($uang_penginapan as $p){?>
								<form  action="<?php echo base_url().'uang_penginapan_controller/update'; ?>" method="post" role="form">									
									<div class="form-group">
										<label  for="ID_UP">ID UP</label>
										<input type="hidden" name="ID_UP" value="<?php echo $p->ID_UP?>"> 
										<p class="form-control-static"><?php echo $p->ID_UP?></p>																		
									</div>
									<div class="form-group">
										<label for="Nama_Provinsi">Nama Provinsi</label>
                                        <select class="form-control selectpicker" data-live-search="true" name="ID_PROV_EDIT">
                                        	<option value = "<?php echo $p->ID_PROV;?>" selected>
                                        		<?php echo $p->ID_PROV?> - <?php echo $p->NAMA_PROV;?>
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
                                    	<label>Pangkat</label>
                                      	<select class="form-control selectpicker" data-live-search="true" name="ID_PANGKAT_EDIT">
                                        	<option value = "<?php echo $p->ID_PANGKAT;?>" selected>
                                        		<?php echo $p->ID_PANGKAT?> - <?php echo $p->PANGKAT;?>
                                        	</option>
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
										<input class="form-control" type="text" name="NOMINAL_EDIT" value="<?php echo $p->NOMINAL?>">
									</div>									
									<input class="btn btn-primary" type="submit" value="Simpan">
									<a href="<?php echo base_url();?>uang_penginapan_controller/index" class="btn btn-danger" role="button">Batal</a>
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