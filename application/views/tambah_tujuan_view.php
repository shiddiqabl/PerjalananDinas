		<div id="page-wrapper">
			<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Tambah Data Tujuan Dinas Baru</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
            	<div class="col-lg-12">
                    <div class="panel panel-default">
                    	<div class="panel-heading">
                           Form Tujuan Dinas Baru
                       	</div>
                       	<div class="panel-body">
                       		<div class="row">
                       		<div class="col-lg-6">							
								<form  action="<?php echo base_url().'tujuan_dinas_controller/tambah_action'; ?>" method="post" role="form">									
									<div class="form-group">
										<label  for="ID_Provinsi">ID Provinsi</label>
										<input class="form-control" name="id_prov"  maxlength="3" placeholder="Contoh = P02" autofocus>																											
									</div>										
									<div class="form-group">
										<label for="Nama_Provinsi">Nama Provinsi</label>								
										<input class="form-control" name="nama_prov" maxlength="30" placeholder="Contoh = Sumatera Utara">	
									</div>																
									<input class="btn btn-primary" type="submit" value="Simpan">
									<a href="<?php echo base_url();?>tujuan_dinas_controller/index" class="btn btn-danger" role="button">Batal</a>
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
