		<div id="page-wrapper">
			<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Tambah Perjalanan Dinas</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
            	<div class="col-lg-12">
                    <div class="panel panel-default">
                    	<div class="panel-heading">
                           Form Tambah Perjalanan Dinas
                       	</div>
                       	<div class="panel-body">
                       		<div class="row">                       		
                       		<div class="col-lg-6">							
								<form  action="<?php echo base_url().'home/tambah_cek'; ?>" method="post" role="form">									
									<div class="form-group">
										<label  for="ID">ID</label>
										<input class="form-control" name="id_perjalanan" maxlength="5" required>																											
									</div>
									<div class="form-group">
                                        <label>Pegawai</label>
                                        <select class="form-control selectpicker" data-live-search="true" name="NIP_perjalanan" required>
                                        	<option value="">--Pilih Pegawai--</option>
                                        	<?php 
                                            $no = 1;
                                            foreach ($daftar_pegawai as $pg){
                                            $no++;                                                                                              
                                            ?>
                                            <option value = <?php echo $pg->NIP;?>>
                                            	<?php echo $pg->NIP;?> - <?php echo $pg->NAMA;?>
                                            </option>
                                            <?php }?>                                             
                                        </select>
                                    </div>
									
									<!-- 
									<div class="form-group">
										<label for="NIP">NIP</label>								
										<input class="form-control" list="NIP_perjalanan" name="NIP_perjalanan"/>
										<datalist id="NIP_perjalanan">
										<?php 
											$no = 1;
											foreach ($daftar_pegawai as $pg){
											$no++;	
										?>
										<option value="<?php echo $pg->NIP;?>" />
										<?php }?>
										</datalist>
									</div>
									<div class="form-group">	
										<label for="Nama_Pegawai">Nama Pegawai</label>
										<input class="form-control" list="NAMA_perjalanan" name="NAMA_perjalanan">
											<datalist id="NAMA_perjalanan">
												<?php 
												$no = 1;
												foreach ($daftar_pegawai as $pg2){
												$no++;	
												?>
												<option value="<?php echo $pg2->NAMA;?>" />
												<?php }?>
											</datalist>
									</div>										
									 -->
									
									<div class="form-group">
                                            <label>Lokasi</label>
                                            <select class="form-control selectpicker" data-live-search="true" name="id_status_perjalanan" id="id_status_pd" required>
                                                <option value="">--Pilih Status Lokasi--</option>
                                                <?php 
                                                $no = 1;
                                                foreach ($daftar_lokasi as $lk){
                                                	$no++;                                                                                              
                                                ?>
                                                <option value = <?php echo $lk->ID_STATUS;?>>
                                                	<?php echo $lk->STATUS;?>
                                                </option>
                                                <?php }?>                                             
                                            </select>
                                    </div>
									<div class="form-group">
                                            <label>Provinsi</label>
                                            <select class="form-control selectpicker" data-live-search="true" name="id_prov_perjalanan" id="id_prov_pd">
                                                <option value="">--Pilih Provinsi--</option>
                                                <?php 
                                                $no = 1;
                                                foreach ($daftar_provinsi as $pr){
                                                	$no++;                                                                                              
                                                ?>
                                                <option value = <?php echo $pr->ID_PROV;?>>
                                                	<?php echo $pr->ID_PROV;?> - <?php echo $pr->NAMA_PROV;?>
                                                </option>
                                                <?php }?>                                             
                                            </select>
                                    </div>  
                                    <div class="form-group">
										<label for="Kota">Kota</label>								
										<select class="form-control " data-live-search="true" name="id_kota_pd" id="id_kota_pd">
                                        	<option value="">--Pilih Kota--</option>                                         
                                        </select>	
									</div>
									<div class="form-group" id="id_kec_pd">
										<label for="Kota">Kecamatan</label>								
										<select class="form-control " data-live-search="true" name="id_kec_pd" id="id_kecamatan" >
                                        	<option value="">--Pilih Kecamatan--</option>                                         
                                        </select>	
									</div>	                                                                     
									
									<!-- <div class="form-group">
										<label for="ID_Provinsi">Provinsi</label>
										<input class="form-control" list="id_prov_perjalanan" name="id_prov_perjalanan">
											<datalist id="id_prov_perjalanan">
											<?php 
											$no = 1;
											foreach ($daftar_provinsi as $pr){
												$no++;
											?>
											<option value="<?php echo $pr->ID_PROV;?> - <?php echo $pr->NAMA_PROV;?>" />
											<?php }?>
											</datalist>
									</div> -->								
									
									<div class="form-group">
										<label for="Tanggal_Berangkat">Tanggal Berangkat</label>
										<!--  <input class="form-control" type="date" name="tgl_berangkat">-->
										<div class='input-group date' id='datetimepicker6'>
                							<input type='text' class="form-control" name="tgl_berangkat" required/>
           										<span class="input-group-addon">
                    								<span class="glyphicon glyphicon-calendar"></span>
                								</span>
            							</div>
									</div>
									<div class="form-group">
										<label for="Tanggal_kembali">Tanggal Kembali</label>
										<!-- <input class="form-control" type="date" name="tgl_kembali">  -->
										<div class='input-group date' id='datetimepicker7'>
                							<input type='text' class="form-control" name="tgl_kembali"/ required>
                								<span class="input-group-addon">
                    								<span class="glyphicon glyphicon-calendar"></span>
                								</span>
            							</div>
									</div>
									<div class="form-group">
                                        <label>Pilihan Angkutan</label>
                                        <select class="form-control selectpicker" data-live-search="true" name="ID_Angkut_PD" required>
                                        	<option value="">--Pilih Angkutan Perjalanan--</option>
                                        	<?php 
                                            $no = 1;
                                            foreach ($daftar_angkutan as $dg){
                                            $no++;                                                                                              
                                            ?>
                                            <option value = <?php echo $dg->ID_ANGKUT;?>>
                                            	<?php echo $dg->ID_ANGKUT;?> - <?php echo $dg->TIPE_ANGKUT_PD;?>
                                            </option>
                                            <?php }?>                                             
                                        </select>
                                    </div>
                                    <div class="form-group">
                                            <label>Maksud Perjalanan</label>
                                            <textarea class="form-control" rows="3" name="maksud_pd"></textarea>
                                    </div>									
									<input class="btn btn-primary" type="submit" value="Simpan">
									<a href="<?php echo base_url();?>/home/index" class="btn btn-danger" role="button">Batal</a>
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
        
        <script type="text/javascript">
    		$(function () {
        		$('#datetimepicker6').datetimepicker({
            		format:'DD/MM/YYYY'});
        		$('#datetimepicker7').datetimepicker({
            	useCurrent: false, //Important! See issue #1075
            	format:'DD/MM/YYYY'
        		});
        		$("#datetimepicker6").on("dp.change", function (e) {
            		$('#datetimepicker7').data("DateTimePicker").minDate(e.date);
        		});
        		$("#datetimepicker7").on("dp.change", function (e) {
            		$('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
        		});
    		});
    		
    		$(document).ready(function(){
             	$('#id_prov_pd').change(function(){ //any select change on the dropdown with id country trigger this code            	 
             	$("#id_kota_pd > option").remove(); //first of all clear select items
                	var provinsi_id = $('#id_prov_pd').val(); // here we are taking country id of the selected one.
             	console.log(provinsi_id);
             	$.ajax({
             		type: "POST",
             	 	url: "<?= base_url()?>daftar_kota_controller/ambil_kota/"+provinsi_id, //here we are calling our user controller and get_cities method with the country_id
             	 
             	 	success: function(cities) //we're calling the response json array 'cities'
             		 {
 						
             	 		$.each(cities,function(ID_KOTA, NAMA_KOTA) //here we're doing a foeach loop round each city with id as the key and city as the value
             			{
             	 			$('#id_kota_pd').append("<option value='" + ID_KOTA + "'>" + ID_KOTA + " - " + NAMA_KOTA + "</option>");
             	 			console.log(ID_KOTA);
             	 			console.log(NAMA_KOTA);
             	 		});
             	 	}            	 
             	 	});            	 
             	 });
 			});

    		$(document).ready(function(){
             	$('#id_kota_pd').change(function(){ //any select change on the dropdown with id country trigger this code            	 
             	$("#id_kecamatan > option").remove(); //first of all clear select items
                	var kota_id = $('#id_kota_pd').val(); // here we are taking country id of the selected one.
             	console.log(kota_id);
             	$.ajax({
             		type: "POST",
             	 	url: "<?= base_url()?>daftar_kec_controller/ambil_kec/"+kota_id, //here we are calling our user controller and get_cities method with the country_id
             	 
             	 	success: function(cities) //we're calling the response json array 'cities'
             		 {
 						
             	 		$.each(cities,function(ID_KEC, NAMA_KEC) //here we're doing a foeach loop round each city with id as the key and city as the value
             			{
             	 			$('#id_kecamatan').append("<option value='" + ID_KEC + "'>" + ID_KEC + " - " + NAMA_KEC + "</option>");
             	 			console.log(ID_KEC);
             	 			console.log(NAMA_KEC);
             	 		});
             	 	}            	 
             	 	});            	 
             	 });
 			});
    		
    		$(document).ready(function(){
    			$("#id_status_pd").change(function(){
    				if($(this).val() == "S1"){
    					$("#id_kec_pd").show();
    				}
    				else{
    					$("#id_kec_pd").hide();
    				}
    			});
    			$("#id_kec_pd").hide();
    		});
		</script>    
		</div>
        <!-- /#page-wrapper -->
