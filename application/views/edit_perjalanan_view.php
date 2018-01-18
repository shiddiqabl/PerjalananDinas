		<div id="page-wrapper">
			<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit Perjalanan Dinas</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
            	<div class="col-lg-12">
                    <div class="panel panel-default">
                    	<div class="panel-heading">
                           Edit Perjalanan Dinas
                       	</div>
                       	<div class="panel-body">
                       		<div class="row">
                       		<div class="col-lg-6">	
							<?php foreach ($dinas_edit as $pd){?>
								<form  action="<?php echo base_url().'home/cek_edit_perjalanan'; ?>" method="post" role="form">									
									<div class="form-group">
										<label  for="ID">ID</label>
										<input type="hidden" name="id_perjalanan" value="<?php echo $pd->id_perjalanan;?>"> 
										<p class="form-control-static"><?php echo $pd->id_perjalanan;?></p>																		
									</div>										
									<div class="form-group">
										<label for="Pegawai">Pegawai</label>	
										<select class="form-control selectpicker" data-live-search="true" name="nip_perjalanan_edit">
											<option value = "<?php echo $pd->NIP;?>" selected><?php echo $pd->NIP?> - <?php echo $pd->NAMA;?></option>
											<?php
											$no = 1;
											foreach ($daftar_pegawai as $pg){
												$no++;
											?>
											<option value = "<?php echo $pg->NIP;?>">
	                                          	<?php echo $pg->NIP;?> - <?php echo $pg->NAMA;?>
											</option>
                                            <?php }?> 
										</select>										
									</div>
									<div class="form-group">
										<label for="Provinsi">Status Lokasi</label>
										<select class="form-control selectpicker" data-live-search="true" name="id_status_edit" id="form_status_edit">
											<option value = "<?php echo $pd->ID_STATUS;?>" selected><?php echo $pd->ID_STATUS?> - <?php echo $pd->STATUS;?></option>
											<?php
											$no = 1;
											foreach ($daftar_lokasi as $lk){
												$no++;
											?>
											<option value = "<?php echo $lk->ID_STATUS;?>">
	                                          	<?php echo $lk->ID_STATUS;?> - <?php echo $lk->STATUS;?>
											</option>
                                            <?php }?> 
										</select>											
									</div>																			
									<div class="form-group">
										<label for="Provinsi">Provinsi</label>
										<select class="form-control selectpicker" data-live-search="true" name="id_prov_perjalanan_edit" id="form_prov_edit">
											<option value = "<?php echo substr($pd->ID_TUJUAN, 0, 5);?>" selected>
												<?php echo substr($pd->ID_TUJUAN, 0, 5)?> - <?php echo 'Provinsi '.$daftar_prov[substr($pd->ID_TUJUAN, 0,5)];?>
											</option>
											<?php
											$no = 1;
											foreach ($daftar_provinsi as $pr){
												$no++;
											?>
											<option value = "<?php echo $pr->ID_PROV;?>">
	                                          	<?php echo $pr->ID_PROV;?> - <?php echo $pr->NAMA_PROV;?>
											</option>
                                            <?php }?> 
										</select>											
									</div>
									<div class="form-group">
										<label for="Kota">Kota</label>
										<select class="form-control " data-live-search="true" name="id_kota_perjalanan_edit" id="form_kota_edit">
											<option value = "<?php echo substr($pd->ID_TUJUAN, 5, 5);?>" selected>
												<?php echo substr($pd->ID_TUJUAN, 5, 5)?> - <?php echo 'Kota '.$daftar_kota[substr($pd->ID_TUJUAN, 5,5)];?>
											</option>											
										</select>											
									</div>
									<div class="form-group" id="form_kec_edit">
										<label for="Kota">Kecamatan</label>
										<select class="form-control" data-live-search="true" name="id_kec_perjalanan_edit" id="form_input_kec_edit">
											<option value = "<?php echo substr($pd->ID_TUJUAN, 10, 5);?>" selected>
												<?php echo substr($pd->ID_TUJUAN, 10, 5)?> - <?php echo 'Kecamatan '.$daftar_kec[substr($pd->ID_TUJUAN, 10,5)];?>
											</option>											
										</select>											
									</div>																													
									<div class="form-group">
										<label for="Tanggal_Berangkat">Tanggal Berangkat</label>
										<input class="form-control" type="hidden" name="tgl_berangkat_lama" value="<?php echo $pd->tgl_berangkat?>">
										<div class='input-group date' id='datetimepicker6'>
                							<input type='text' class="form-control" name="tgl_berangkat_edit" />
           										<span class="input-group-addon">
                    								<span class="glyphicon glyphicon-calendar"></span>
                								</span>
            							</div>
									</div>
									<div class="form-group">
										<label for="Tanggal_kembali">Tanggal Kembali</label>
										<input class="form-control" type="hidden" name="tgl_kembali_lama" value="<?php echo $pd->tgl_kembali?>">
										<div class='input-group date' id='datetimepicker7'>
                							<input type='text' class="form-control" name="tgl_kembali_edit" />
                								<span class="input-group-addon">
                    								<span class="glyphicon glyphicon-calendar"></span>
                								</span>
            							</div>
									</div>
									<div class="form-group">
										<label for="alat_angkut">Alat Angkut</label>	
										<select class="form-control selectpicker" data-live-search="true" name="alat_angkut_edit">
											<option value = "<?php echo $pd->ID_ANGKUT;?>" selected><?php echo $pd->ID_ANGKUT?> - <?php echo $pd->TIPE_ANGKUT_PD;?></option>
											<?php
											$no = 1;
											foreach ($daftar_angkut as $dt){
												$no++;
											?>
											<option value = "<?php echo $dt->ID_ANGKUT;?>">
	                                          	<?php echo $pg->ID_ANGKUT;?> - <?php echo $pg->TIPE_ANGKUT_PD;?>
											</option>
                                            <?php }?> 
										</select>										
									</div>
									<div class="form-group">
                                            <label>Maksud Perjalanan</label>
                                            <textarea class="form-control" rows="3" name="maksud_pd_edit"><?php echo $pd->MAKSUD_PD;?></textarea>
                                    </div>	
									<div class="form-group">
										<label for="Status">Status</label>
										<select class="form-control selectpicker" data-live-search="true" name="status_pd_edit">
											<option value="<?php echo $pd->status_pd;?>"><?php echo $pd->status_pd;?></option>
											<option value="TERENCANA">TERENCANA</option>
											<option value="DIBATALKAN">DIBATALKAN</option>
											<option value="SELESAI">SELESAI</option>
										</select>
									</div>									
									<input class="btn btn-primary" type="submit" value="Simpan">
									<a href="<?php echo base_url();?>/home/index" class="btn btn-danger" role="button">Batal</a>
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
		
		<script type="text/javascript">
    		$(function () {
        		$('#datetimepicker6').datetimepicker({
            		defaultDate :"<?php echo date('r',strtotime($dinas_satu_edit->tgl_berangkat))?>",
            		format:'DD/MM/YYYY'});
        		$('#datetimepicker7').datetimepicker({
            	useCurrent: false, //Important! See issue #1075
				defaultDate : "<?php echo date('r',strtotime($dinas_satu_edit->tgl_kembali))?>",
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
             	$('#form_prov_edit').change(function(){ //any select change on the dropdown with id country trigger this code            	 
             	$("#form_kota_edit > option").remove(); //first of all clear select items
                	var provinsi_id = $('#form_prov_edit').val(); // here we are taking country id of the selected one.
             	console.log(provinsi_id);
             	$.ajax({
             		type: "POST",
             	 	url: "<?= base_url()?>daftar_kota_controller/ambil_kota/"+provinsi_id, //here we are calling our user controller and get_cities method with the country_id
             	 
             	 	success: function(cities) //we're calling the response json array 'cities'
             		 {
 						
             	 		$.each(cities,function(ID_KOTA, NAMA_KOTA) //here we're doing a foeach loop round each city with id as the key and city as the value
             			{
             	 			$('#form_kota_edit').append("<option value='" + ID_KOTA + "'>" + ID_KOTA + " - " + NAMA_KOTA + "</option>");
             	 			console.log(ID_KOTA);
             	 			console.log(NAMA_KOTA);
             	 		});
             	 	}            	 
             	 	});            	 
             	 });
 			});
    		
    		$(document).ready(function(){
             	$('#form_kota_edit').change(function(){ //any select change on the dropdown with id country trigger this code            	 
             	$("#form_input_kec_edit > option").remove(); //first of all clear select items
                	var kota_id = $('#form_kota_edit').val(); // here we are taking country id of the selected one.
             	console.log(kota_id);
             	$.ajax({
             		type: "POST",
             	 	url: "<?= base_url()?>daftar_kec_controller/ambil_kec/"+kota_id, //here we are calling our user controller and get_cities method with the country_id
             	 
             	 	success: function(cities) //we're calling the response json array 'cities'
             		 {
 						
             	 		$.each(cities,function(ID_KEC, NAMA_KEC) //here we're doing a foeach loop round each city with id as the key and city as the value
             			{
             	 			$('#form_input_kec_edit').append("<option value='" + ID_KEC + "'>" + ID_KEC + " - " + NAMA_KEC + "</option>");
             	 			console.log(ID_KEC);
             	 			console.log(NAMA_KEC);
             	 		});
             	 	}            	 
             	 	});            	 
             	 });
 			});

    		$(document).ready(function(){        		        			        		
				if($("#form_status_edit").val() == "S2"){
					$("#form_kec_edit").hide();
				}
            	$("#form_status_edit").change(function(){
        			if($(this).val() == "S1"){
        				$("#form_kec_edit").show();
        				console.log($(this).val);
        			}
        			else{
        				$("#form_kec_edit").hide();
        				console.log($(this).val);
        			}
        		});           		       			               	
        	});
		</script> 
		</div>
        <!-- /#page-wrapper -->
