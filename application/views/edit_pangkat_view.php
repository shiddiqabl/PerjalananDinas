		<div id="page-wrapper">
			<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit Pangkat Pegawai</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
            	<div class="col-lg-12">
                    <div class="panel panel-default">
                    	<div class="panel-heading">
                           Edit Pangkat Pegawai 
                       	</div>
                       	<div class="panel-body">
                       		<div class="row">
                       		<div class="col-lg-6">	
							<?php foreach ($pangkat as $pk){?>
								<form  action="<?php echo base_url().'pangkat_controller/update'; ?>" method="post" role="form">									
									<div class="form-group">
										<label  for="Kode_Pangkat">Kode Pangkat</label>
										<input type="hidden" name="ID_PANGKAT" value="<?php echo $pk->ID_PANGKAT?>"> 
										<p class="form-control-static"><?php echo $pk->ID_PANGKAT?></p>																		
									</div>
									<div class="form-group">
										<label for="Pangkat">Pangkat</label>
										<input class="form-control" type="text" name="PANGKAT_EDIT" value="<?php echo $pk->PANGKAT?>" maxlength="40">
									</div>
									<input class="btn btn-primary" type="submit" value="Simpan">
									<a href="<?php echo base_url();?>pangkat_controller/index" class="btn btn-danger" role="button">Batal</a>
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
