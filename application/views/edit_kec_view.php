		<div id="page-wrapper">
			<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit Data Kecamatan</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
            	<div class="col-lg-12">
                    <div class="panel panel-default">
                    	<div class="panel-heading">
                           Edit Data Kecamatan
                       	</div>
                       	<div class="panel-body">
                       		<div class="row">
                       		<div class="col-lg-6">	
							<?php foreach ($daftar_kec as $p){?>
								<form  action="<?php echo base_url().'daftar_kec_controller/update'; ?>" method="post" role="form">									
									<div class="form-group">
										<label  for="ID_Kota">ID Kec</label>
										<input type="hidden" name="ID_KEC_EDIT" value="<?php echo $p->ID_KEC?>"> 
										<p class="form-control-static"><?php echo $p->ID_KEC?></p>																		
									</div>
									<div class="form-group">
										<label for="Provinsi">Provinsi</label>	
										<select class="form-control " data-live-search="true" name="ID_PROV_EDIT" id="id_prov_edit">
											<option value = "<?php echo $p->ID_PROV;?>" selected><?php echo $p->ID_PROV;?> - <?php echo $p->NAMA_PROV;?></option>
											<?php
											$no = 1;
											foreach ($daftar_provinsi as $pg){
												$no++;
											?>
											<option value = "<?php echo $pg->ID_PROV;?>">
	                                          	<?php echo $pg->ID_PROV;?> - <?php echo $pg->NAMA_PROV;?>
											</option>
                                            <?php }?> 
										</select>										
									</div>	
									<div class="form-group">
										<label for="Kota">Kota</label>
										<select class="form-control " data-live-search="true" name="ID_KOTA_EDIT" id="id_kota_edit">
											<option value = "<?php echo $p->ID_KOTA;?>" selected><?php echo $p->ID_KOTA;?> - <?php echo $p->NAMA_KOTA;?></option>
											
										</select>	
									</div>
									<div class="form-group">
										<label for="Nama_Kec">Nama Kecamatan</label>
										<input class="form-control" type="text" name="NAMA_KEC_EDIT" value="<?php echo $p->NAMA_KEC?>" maxlength="40" pattern="[A-Za-z\s]{3,}">
									</div>
									<input class="btn btn-primary" type="submit" value="Simpan">
									<a href="<?php echo base_url();?>daftar_kec_controller/index" class="btn btn-danger" role="button">Batal</a>
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
             <script>
           	 $(document).ready(function(){
            	$('#id_prov_edit').change(function(){ //any select change on the dropdown with id country trigger this code            	 
            	$("#id_kota_edit > option").remove(); //first of all clear select items
               	var provinsi_id = $('#id_prov_edit').val(); // here we are taking country id of the selected one.
            	console.log(provinsi_id);
            	$.ajax({
            		type: "POST",
            	 	url: "<?= base_url()?>daftar_kota_controller/ambil_kota/"+provinsi_id, //here we are calling our user controller and get_cities method with the country_id
            	 
            	 	success: function(cities) //we're calling the response json array 'cities'
            		 {
						
            	 		$.each(cities,function(ID_KOTA, NAMA_KOTA) //here we're doing a foeach loop round each city with id as the key and city as the value
            			{
            	 			$('#id_kota_edit').append("<option value='" + ID_KOTA + "'>" + ID_KOTA+ " - " + NAMA_KOTA + "</option>");
            	 			console.log(ID_KOTA);
            	 			console.log(NAMA_KOTA);
            	 		});
            	 	}            	 
            	 	});            	 
            	 });
			});
            </script>
		</div>
        <!-- /#page-wrapper -->
