		<div id="page-wrapper">
			<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit Data Provinsi</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
            	<div class="col-lg-12">
                    <div class="panel panel-default">
                    	<div class="panel-heading">
                           Edit Data Provinsi
                       	</div>
                       	<div class="panel-body">
                       		<div class="row">
                       		<div class="col-lg-6">	
							<?php foreach ($daftar_provinsi as $p){?>
								<form  action="<?php echo base_url().'daftar_prov_controller/update'; ?>" method="post" role="form">									
									<div class="form-group">
										<label  for="ID_Provinsi">ID Provinsi</label>
										<input type="hidden" name="ID_PROV" value="<?php echo $p->ID_PROV?>"> 
										<p class="form-control-static"><?php echo $p->ID_PROV?></p>																		
									</div>
									<div class="form-group">
										<label for="Nama_Provinsi">Nama Provinsi</label>
										<input class="form-control" type="text" name="NAMA_PROV_EDIT" value="<?php echo $p->NAMA_PROV?>" maxlength="40" pattern="[A-Za-z\s]{3,}">
									</div>
									<input class="btn btn-primary" type="submit" value="Simpan">
									<a href="<?php echo base_url();?>daftar_prov_controller/index" class="btn btn-danger" role="button">Batal</a>
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
