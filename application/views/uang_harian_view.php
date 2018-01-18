        <div id="page-wrapper">
			<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Pengaturan Uang Harian Perjalanan Dinas</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
            	<div class="col-lg-12">
            		<a href="<?php echo base_url(); ?>uang_harian_controller/tambah" class="btn btn-outline btn-success btn-lg btn-block" role="button">
            			Tambah Data Uang Harian Perjalanan Dinas
            		</a>            		
            		<br>
            	</div>
            </div>     
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Daftar Uang Harian Perjalanan Dinas
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                    	<th>No</th>
                                    	<th>ID</th>
                                    	<th>Nama Provinsi</th>
                                    	<th>Satuan</th>
                                        <th>Status</th>
                                        <th>Nominal</th>                                        
                                        <th>Aksi</th>                                    
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
									$no=1;
									foreach($daftar_uang_harian as $d){
								?>
                                	<tr>
                                    	<td><?php echo $no++?></td>
										<td><?php echo $d->ID_UH; ?></td>										
										<td><?php echo $d->NAMA_PROV; ?></td>
										<td>OH</td>
										<td><?php echo $d->STATUS; ?></td>
										<td><?php echo $d->NOMINAL; ?></td>										
										<td><!-- <?php echo anchor('uang_harian_controller/edit/'.$d->ID_UH, 'Edit')?> -->
											<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#detail_modal" 
												data-id_uh="<?php echo $d->ID_UH;?>" data-id_prov="<?php echo $d->ID_PROV;?>"
												data-nama_prov="<?php echo $d->NAMA_PROV;?>" data-id_status="<?php echo $d->ID_STATUS;?>"
												data-status="<?php echo $d->STATUS;?>" data-nominal="<?php echo $d->NOMINAL;?>" 												 						 													
												data-url="<?php echo base_url();?>uang_harian_controller/edit/"> 
												Detail
											</button> |
											<!-- <<?php echo anchor('uang_harian_controller/hapus/'.$d->ID_UH, 'Hapus')?> -->
											<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#delete_modal" 
												data-id="<?php echo $d->ID_UH;?>" data-nama="<?php echo $d->NAMA_PROV;?>" 
												data-status="<?php echo $d->STATUS;?>" data-url="<?php echo base_url();?>uang_harian_controller/hapus/"> 
												Hapus
											</button> 
										</td>	
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
            <!-- /.row -->
        
         <!-- Modal -->
		<div class="modal fade" id="delete_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  			<div class="modal-dialog" role="document">
    			<div class="modal-content">
      				<div class="modal-header">
        				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        				<h4 class="modal-title" id="myModalLabel">Hapus Data Uang Harian</h4>
      				</div>
      				<div class="modal-body">
        				Apakah anda yakin menghapus data uang harian untuk Provinsi <b><span id="nama"></span></b> 
        				dengan status <b><span id="status"></span></b> (ID : <b><span id="id"></span></b>)  ? 
      				</div>
      				<div class="modal-footer">
        				<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        				<a id="link_hapus" href=""><button type="button" class="btn btn-primary" >Hapus</button></a>
      				</div>
   				 </div>
  			</div>
		</div>
		<div class="modal fade" id="detail_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  			<div class="modal-dialog" role="document">
    			<div class="modal-content">
      				<div class="modal-header">
        				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        				<h4 class="modal-title" id="myModalLabel">Detail Data Uang Harian </h4>
      				</div>
      				<div class="modal-body">
        				ID : <b><span id="id_uh"></span></b> <br />
        				Provinsi : <b><span id="id_prov"></span> - <span id="nama_prov"></span></b><br />
        				Status : <b><span id="id_status"></span> - <span id="status"></span></b> <br />
        				Nominal : <b><span id="nominal"></span></b>        				        				
      				</div>
      				<div class="modal-footer">
        				<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        				<a id="link_edit" href=""><button type="button" class="btn btn-primary" >Edit</button></a>
      				</div>
   				 </div>
  			</div>
		</div> 
		
		<script>
			$(document).ready( function (){
				$('#delete_modal').on('show.bs.modal', function (event) {
					  var button = $(event.relatedTarget) // Button that triggered the modal
					  var id = button.data('id') // Extract info from data-* attributes
					  var nama = button.data('nama')
					  var status = button.data('status')					 
					  var url = button.data('url') 
					  console.log(id)
					  
					  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
					  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
					  var modal = $(this)
					  modal.find('#nama').text(nama)					  
					  modal.find('#id').text(id)
					  modal.find('#status').text(status)
					  modal.find('#link_hapus').attr('href', url+id)
					})
				$('#detail_modal').on('show.bs.modal', function (event) {
					  var button = $(event.relatedTarget) // Button that triggered the modal					  					 					  			 
					  var id_uh = button.data('id_uh') // Extract info from data-* attributes
					  var id_prov = button.data('id_prov')
					  var nama_prov = button.data('nama_prov')
					  var id_status = button.data('id_status')
					  var status = button.data('status')
					  var nominal = button.data('nominal')					  					  					
					  var url = button.data('url') 
					  console.log(id_uh)
					  
					  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
					  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
					  var modal = $(this)					  
					  modal.find('#id_uh').text(id_uh)
					  modal.find('#id_prov').text(id_prov)
					  modal.find('#nama_prov').text(nama_prov)
					  modal.find('#id_status').text(id_status)
					  modal.find('#status').text(status)
					  modal.find('#nominal').text(nominal)					 
					  modal.find('#link_edit').attr('href', url+id_uh)
					})
			});
		</script>        
            
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
