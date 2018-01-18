		<div id="page-wrapper">
			<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit Status Lokasi Tujuan Perjalanan Dinas</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
            	<div class="col-lg-12">
                    <div class="panel panel-default">
                    	<div class="panel-heading">
                           Edit Status Lokasi Tujuan Perjalanan Dinas 
                       	</div>
                       	<div class="panel-body">
                       		<div class="row">
                       		<div class="col-lg-6">	
							<?php foreach ($status_lokasi as $sl){?>
								<form  action="<?php echo base_url().'status_lokasi_controller/update'; ?>" method="post" role="form">									
									<div class="form-group">
										<label  for="Kode_Status">Kode Status</label>
										<input type="hidden" name="ID_STATUS" value="<?php echo $sl->ID_STATUS?>"> 
										<p class="form-control-static"><?php echo $sl->ID_STATUS?></p>																		
									</div>
									<div class="form-group">
										<label for="Nama_Provinsi">Status</label>
										<input class="form-control" type="text" name="STATUS_EDIT" value="<?php echo $sl->STATUS?>" maxlength="40">
									</div>
									<input class="btn btn-primary" type="submit" value="Simpan">
									<a href="<?php echo base_url();?>status_lokasi_controller/index" class="btn btn-danger" role="button">Batal</a>
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
