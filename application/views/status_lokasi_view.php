        <div id="page-wrapper">
			<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Daftar Status Lokasi Tujuan Perjalanan Dinas</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
            	<div class="col-lg-12">
            		<a href="<?php echo base_url(); ?>status_lokasi_controller/tambah" class="btn btn-outline btn-success btn-lg btn-block" role="button">
            			+ Tambah Status Lokasi Baru
            		</a>            		
            		<br>
            	</div>
            </div>   
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Daftar Status Lokasi Tujuan Perjalanan Dinas Pemerintah Daerah Kabupaten Sragen
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                    	<th>No</th>
                                        <th>Kode Status Lokasi</th>
                                        <th>Status Lokasi</th>
                                        <th>Aksi</th>                                    
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
									$no=1;
									foreach($daftar_status as $ds){
								?>
                                	<tr>
                                    	<td><?php echo $no++?></td>
										<td><?php echo $ds->ID_STATUS; ?></td>
										<td><?php echo $ds->STATUS; ?></td>
										<td><!-- <?php echo anchor('status_lokasi_controller/edit/'.$ds->ID_STATUS, 'Edit')?> -->
											<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#detail_modal" 
												data-id_status="<?php echo $ds->ID_STATUS;?>" data-status="<?php echo $ds->STATUS;?>" 												 						 													
												data-url="<?php echo base_url();?>status_lokasi_controller/edit/"> 
												Detail
											</button> |
											<!-- <?php echo anchor('status_lokasi_controller/hapus/'.$ds->ID_STATUS, 'Hapus')?> -->
											<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete_modal" 
												data-id="<?php echo $ds->ID_STATUS;?>" data-status="<?php echo $ds->STATUS;?>" 
												data-url="<?php echo base_url();?>status_lokasi_controller/hapus/"> 
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
        				<h4 class="modal-title" id="myModalLabel">Hapus Data Status Lokasi</h4>
      				</div>
      				<div class="modal-body">
        				Apakah anda yakin menghapus data lokasi <b><span id="status"></span></b> (ID : <b><span id="id"></span></b>) ? 
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
        				<h4 class="modal-title" id="myModalLabel">Detail Status Lokasi Tujuan Dinas </h4>
      				</div>
      				<div class="modal-body">
        				ID : <b><span id="id_status"></span></b> <br />
        				Status : <b><span id="status"></span></b><br />        				        				
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
					  var status = button.data('status')					 
					  var url = button.data('url') 
					  console.log(id)
					  
					  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
					  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
					  var modal = $(this)
					  modal.find('#status').text(status)					  
					  modal.find('#id').text(id)
					  modal.find('#link_hapus').attr('href', url+id)
					})
				$('#detail_modal').on('show.bs.modal', function (event) {
					  var button = $(event.relatedTarget) // Button that triggered the modal					 					 					  			 
					  var id_status = button.data('id_status')  // Extract info from data-* attributes
					  var status = button.data('status')					  					  					
					  var url = button.data('url') 
					  console.log(id_status)
					  
					  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
					  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
					  var modal = $(this)					  
					  modal.find('#id_status').text(id_status)
					  modal.find('#status').text(status)					 
					  modal.find('#link_edit').attr('href', url+id_status)
					})
			});
		</script>
                       
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
