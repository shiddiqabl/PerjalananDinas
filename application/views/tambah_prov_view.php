		<div id="page-wrapper">
			<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Tambah Data Provinsi Baru</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
            	<div class="col-lg-12">
                    <div class="panel panel-default">
                    	<div class="panel-heading">
                           Form Provinsi Baru
                       	</div>
                       	<div class="panel-body">
                       		<div class="row">
                       		<div class="col-lg-6">							
								<form  action="<?php echo base_url().'daftar_prov_controller/tambah_action'; ?>" method="post" role="form">									
									<div class="form-group">
										<label  for="ID_Provinsi">ID Provinsi</label>
										<input class="form-control" name="id_prov"  maxlength="5" placeholder="Contoh = P0002" autofocus required>																											
									</div>										
									<div class="form-group">
										<label for="Nama_Provinsi">Nama Provinsi</label>								
										<input class="form-control" name="nama_prov" maxlength="40" placeholder="Contoh = Sumatera Utara" pattern="[A-Za-z\s]{3,}">	
									</div>																
									<input class="btn btn-primary" type="submit" value="Simpan">
									<a href="<?php echo base_url();?>daftar_prov_controller/index" class="btn btn-danger" role="button">Batal</a>
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
