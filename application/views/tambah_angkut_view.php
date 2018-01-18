		<div id="page-wrapper">
			<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Tambah Data Alat Angkut Baru</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
            	<div class="col-lg-12">
                    <div class="panel panel-default">
                    	<div class="panel-heading">
                           Form Alat Angkut Baru
                       	</div>
                       	<div class="panel-body">
                       		<div class="row">
                       		<div class="col-lg-6">							
								<form  action="<?php echo base_url().'alat_angkut_controller/tambah_action'; ?>" method="post" role="form">									
									<div class="form-group">
										<label  for="ID_Provinsi">ID Alat Angkut</label>
										<input class="form-control" name="id_angkut"  maxlength="2" placeholder="Contoh = A2" autofocus required>																											
									</div>										
									<div class="form-group">
										<label for="Nama_Provinsi">Nama Alat Angkut</label>								
										<input class="form-control" name="nama_angkut" maxlength="30" placeholder="Contoh = Pesawat Terbang">	
									</div>																
									<input class="btn btn-primary" type="submit" value="Simpan">
									<a href="<?php echo base_url();?>alat_angkut_controller/index" class="btn btn-danger" role="button">Batal</a>
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
