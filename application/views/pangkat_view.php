        <div id="page-wrapper">
			<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Pengaturan Kode Pangkat Pegawai</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
            	<div class="col-lg-12">
            		<a href="<?php echo base_url(); ?>pangkat_controller/tambah" class="btn btn-outline btn-success btn-lg btn-block" role="button">
            			Tambah Kode Pangkat Baru
            		</a>            		
            		<br>
            	</div>
            </div>   
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Daftar Kode Pangkat Pegawai
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                    	<th>No</th>
                                        <th>Kode Pangkat</th>
                                        <th>Pangkat</th>
                                        <th>Aksi</th>                                    
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
									$no=1;
									foreach($daftar_pangkat as $d){
								?>
                                	<tr>
                                    	<td><?php echo $no++?></td>
										<td><?php echo $d->ID_PANGKAT; ?></td>
										<td><?php echo $d->PANGKAT; ?></td>
										<td><!-- <?php echo anchor('pangkat_controller/edit/'.$d->ID_PANGKAT, 'Edit')?> --> 
											<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#detail_modal" 
												data-id_pangkat="<?php echo $d->ID_PANGKAT;?>" data-pangkat="<?php echo $d->PANGKAT;?>" 												 						 													
												data-url="<?php echo base_url();?>pangkat_controller/edit/"> 
												Detail
											</button> |
											<!--  <?php echo anchor('pangkat_controller/hapus/'.$d->ID_PANGKAT, 'Hapus')?> -->
											<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete_modal" 
												data-id="<?php echo $d->ID_PANGKAT;?>" data-pangkat="<?php echo $d->PANGKAT;?>" 
												data-url="<?php echo base_url();?>pangkat_controller/hapus/"> 
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
        				<h4 class="modal-title" id="myModalLabel">Hapus Data Pangkat Pegawai</h4>
      				</div>
      				<div class="modal-body">
        				Apakah anda  yakin menghapus data pangkat pegawai <b><span id="pangkat"></span></b> ( ID : <b><span id="id"></span></b>) ?        				
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
        				<h4 class="modal-title" id="myModalLabel">Detail Data Pangkat </h4>
      				</div>
      				<div class="modal-body">
        				ID Pangkat : <b><span id="id_pangkat"></span></b> <br />
        				Pangkat : <b><span id="pangkat"></span></b><br />        				        				
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
					  var pangkat = button.data('pangkat')					 
					  var url = button.data('url') 
					  console.log(id)
					  
					  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
					  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
					  var modal = $(this)
					  modal.find('#pangkat').text(pangkat)					 
					  modal.find('#id').text(id)
					  modal.find('#link_hapus').attr('href', url+id)
					})
				$('#detail_modal').on('show.bs.modal', function (event) {
					  var button = $(event.relatedTarget) // Button that triggered the modal
					  // Extract info from data-* attributes					 					  			 
					  var id_pangkat = button.data('id_pangkat')
					  var pangkat = button.data('pangkat')					  					  					
					  var url = button.data('url') 
					  console.log(id_pangkat)
					  
					  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
					  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
					  var modal = $(this)					  
					  modal.find('#id_pangkat').text(id_pangkat)
					  modal.find('#pangkat').text(pangkat)					 
					  modal.find('#link_edit').attr('href', url+id_pangkat)
					})
			});
		</script>    
            
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
