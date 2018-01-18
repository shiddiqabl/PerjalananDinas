		<div id="page-wrapper">
			<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Tambah Pangkat Pegawai</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
            	<div class="col-lg-12">
                    <div class="panel panel-default">
                    	<div class="panel-heading">
                           Form Pangkat Pegawai Baru
                       	</div>
                       	<div class="panel-body">
                       		<div class="row">
                       		<div class="col-lg-6">							
								<form  action="<?php echo base_url().'pangkat_controller/tambah_action'; ?>" method="post" role="form">									
									<div class="form-group">
										<label  for="ID_Provinsi">Kode Pangkat</label>
										<input class="form-control" name="ID_PANGKAT"  maxlength="2" placeholder="Contoh = J2" autofocus>																											
									</div>										
									<div class="form-group">
										<label for="Nama_Provinsi">Pangkat</label>								
										<input class="form-control" name="PANGKAT" maxlength="40" placeholder="PANGKAT tidak melebihi 40 karakter">	
									</div>																
									<input class="btn btn-primary" type="submit" value="Simpan">
									<a href="<?php echo base_url();?>pangkat_controller/index" class="btn btn-danger" role="button">Batal</a>
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
