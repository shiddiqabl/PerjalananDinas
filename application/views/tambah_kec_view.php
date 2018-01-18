		<div id="page-wrapper">
			<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Tambah Data Kecamatan Baru</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
            	<div class="col-lg-12">
                    <div class="panel panel-default">
                    	<div class="panel-heading">
                           Form Kecamatan Baru
                       	</div>
                       	<div class="panel-body">
                       		<div class="row">
                       		<div class="col-lg-6">							
								<form  action="<?php echo base_url().'daftar_kec_controller/tambah_action'; ?>" method="post" role="form">									
									<div class="form-group">
										<label  for="ID_Kecamatan">ID Kecamatan</label>
										<input class="form-control" name="id_kecamatan"  maxlength="5" placeholder="Contoh = C0004" autofocus required>																											
									</div>										
									<div class="form-group">
										<label for="Provinsi">Provinsi</label>								
										<select class="form-control" data-live-search="true" name="ID_Prov" id="id_provinsi">
                                        	<option>--Pilih Provinsi--</option>
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
										<label for="Kota">Kota</label>								
										<select class="form-control " data-live-search="true" name="id_kota" id="id_kota">
                                        	<option value="">--Pilih Kota--</option>                                         
                                        </select>	
									</div>										
									<div class="form-group">
										<label for="Nama_Kecamatan">Kecamatan</label>								
										<input class="form-control" name="nama_kecamatan" maxlength="50" placeholder="Contoh = Tembalang">	
									</div>																
									<input class="btn btn-primary" type="submit" value="Simpan">
									<a href="<?php echo base_url();?>daftar_kec_controller/index" class="btn btn-danger" role="button">Batal</a>
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
           <script>
            $(document).ready(function(){
            	$('#id_provinsi').change(function(){ //any select change on the dropdown with id country trigger this code            	 
            	$("#id_kota > option").remove(); //first of all clear select items
               	var provinsi_id = $('#id_provinsi').val(); // here we are taking country id of the selected one.
            	console.log(provinsi_id);
            	$.ajax({
            		type: "POST",
            	 	url: "<?= base_url()?>daftar_kota_controller/ambil_kota/"+provinsi_id, //here we are calling our user controller and get_cities method with the country_id
            	 
            	 	success: function(cities) //we're calling the response json array 'cities'
            		 {
						
            	 		$.each(cities,function(ID_KOTA, NAMA_KOTA) //here we're doing a foeach loop round each city with id as the key and city as the value
            			{
            	 			$('#id_kota').append("<option value='" + ID_KOTA + "'>" + ID_KOTA + " - " + NAMA_KOTA + "</option>");
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