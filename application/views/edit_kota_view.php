		<div id="page-wrapper">
			<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit Data Kota</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
            	<div class="col-lg-12">
                    <div class="panel panel-default">
                    	<div class="panel-heading">
                           Edit Data Kota
                       	</div>
                       	<div class="panel-body">
                       		<div class="row">
                       		<div class="col-lg-6">	
							<?php foreach ($daftar_kota as $p){?>
								<form  action="<?php echo base_url().'daftar_kota_controller/update'; ?>" method="post" role="form">									
									<div class="form-group">
										<label  for="ID_Kota">ID Kota</label>
										<input type="hidden" name="ID_KOTA_EDIT" value="<?php echo $p->ID_KOTA?>"> 
										<p class="form-control-static"><?php echo $p->ID_KOTA?></p>																		
									</div>
									<div class="form-group">
										<label for="Provinsi">Provinsi</label>	
										<select class="form-control selectpicker" data-live-search="true" name="ID_PROV_EDIT">
											<option value = "<?php echo $p->ID_PROV;?>" selected><?php echo $p->ID_PROV;?> - <?php echo $p->NAMA_PROV;?></option>
											<?php
											$no = 1;
											foreach ($daftar_provinsi as $pg){
												$no++;
											?>
											<option value = "<?php echo $pg->ID_PROV;?>">
	                                          	<?php echo $pg->ID_PROV;?> - <?php echo $pg->NAMA_PROV;?>
											</option>
                                            <?php }?> 
										</select>										
									</div>	
									<div class="form-group">
										<label for="Nama_Kota">Nama Kota</label>
										<input class="form-control" type="text" name="NAMA_KOTA_EDIT" value="<?php echo $p->NAMA_KOTA?>" maxlength="40" pattern="[A-Za-z\s]{3,}">
									</div>
									<input class="btn btn-primary" type="submit" value="Simpan">
									<a href="<?php echo base_url();?>daftar_kota_controller/index" class="btn btn-danger" role="button">Batal</a>
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
