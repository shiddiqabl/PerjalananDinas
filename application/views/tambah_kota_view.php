		<div id="page-wrapper">
			<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Tambah Data Kota Baru</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
            	<div class="col-lg-12">
                    <div class="panel panel-default">
                    	<div class="panel-heading">
                           Form Kota Baru
                       	</div>
                       	<div class="panel-body">
                       		<div class="row">
                       		<div class="col-lg-6">							
								<form  action="<?php echo base_url().'daftar_kota_controller/tambah_action'; ?>" method="post" role="form">									
									<div class="form-group">
										<label  for="ID_Kota">ID Kota</label>
										<input class="form-control" name="id_kota"  maxlength="5" placeholder="Contoh = K0003" autofocus>																											
									</div>										
									<div class="form-group">
										<label for="Provinsi">Provinsi</label>								
										<select class="form-control selectpicker" data-live-search="true" name="ID_Prov">
                                        	<?php 
                                            $no = 1;
                                            foreach ($daftar_provinsi as $pg){
                                            $no++;                                                                                              
                                            ?>
                                            <option value = <?php echo $pg->ID_PROV;?>>
                                            	<?php echo $pg->ID_PROV;?> - <?php echo $pg->NAMA_PROV;?>
                                            </option>
                                            <?php }?>                                             
                                        </select>	
									</div>									
									<div class="form-group">
										<label for="Nama_Kota">Kota/Kabupaten</label>								
										<input class="form-control" name="nama_kota" maxlength="40" placeholder="Contoh = Semarang" pattern="[A-Za-z\s]{3,}">	
									</div>																
									<input class="btn btn-primary" type="submit" value="Simpan">
									<a href="<?php echo base_url();?>daftar_kota_controller/index" class="btn btn-danger" role="button">Batal</a>
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
