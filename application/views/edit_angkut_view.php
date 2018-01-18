		<div id="page-wrapper">
			<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit Data Alat Angkut</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
            	<div class="col-lg-12">
                    <div class="panel panel-default">
                    	<div class="panel-heading">
                           Edit Data Alat Angkut
                       	</div>
                       	<div class="panel-body">
                       		<div class="row">
                       		<div class="col-lg-6">	
							<?php foreach ($daftar_alat as $p){?>
								<form  action="<?php echo base_url().'alat_angkut_controller/update'; ?>" method="post" role="form">									
									<div class="form-group">
										<label  for="ID_Provinsi">ID Alat Angkut</label>
										<input type="hidden" name="ID_ANGKUT" value="<?php echo $p->ID_ANGKUT?>"> 
										<p class="form-control-static"><?php echo $p->ID_ANGKUT?></p>																		
									</div>
									<div class="form-group">
										<label for="Nama_Angkut">Nama Alat Angkut</label>
										<input class="form-control" type="text" name="NAMA_ANGKUT_EDIT" value="<?php echo $p->TIPE_ANGKUT_PD?>" maxlength="30">
									</div>
									<input class="btn btn-primary" type="submit" value="Simpan">
									<a href="<?php echo base_url();?>alat_angkut_controller/index" class="btn btn-danger" role="button">Batal</a>
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
