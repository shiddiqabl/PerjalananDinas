		<div id="page-wrapper">
			<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Tambah Status Lokasi Tujuan Dinas Baru</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
            	<div class="col-lg-12">
                    <div class="panel panel-default">
                    	<div class="panel-heading">
                           Form Status Lokasi Tujuan Dinas Baru
                       	</div>
                       	<div class="panel-body">
                       		<div class="row">
                       		<div class="col-lg-6">							
								<form  action="<?php echo base_url().'status_lokasi_controller/tambah_action'; ?>" method="post" role="form">									
									<div class="form-group">
										<label  for="Kode_Status">Kode Status</label>
										<input class="form-control" name="ID_STATUS"  maxlength="2" placeholder="Contoh = S1" autofocus required>																											
									</div>										
									<div class="form-group">
										<label for="Status">Status</label>								
										<input class="form-control" name="STATUS" maxlength="40" placeholder="Contoh = Luar Kota">	
									</div>																
									<input class="btn btn-primary" type="submit" value="Simpan">
									<a href="<?php echo base_url();?>status_lokasi_controller/index" class="btn btn-danger" role="button">Batal</a>
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
