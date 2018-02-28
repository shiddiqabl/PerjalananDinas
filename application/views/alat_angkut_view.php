        <div id="page-wrapper">
			<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Daftar Alat Angkut</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
            	<div class="col-lg-12">
            		<a href="<?php echo base_url(); ?>alat_angkut_controller/tambah" class="btn btn-outline btn-success btn-lg btn-block" role="button">
            			+ Tambah Alat Angkut Baru 
            		</a>            		
            		<br>
            	</div>
            </div> 
             <?php 
				if($this->session->flashdata('message')){
					echo $this->session->flashdata('message');
				}
			?>         
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Daftar Alat Angkut yang Tersedia
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                    	<th>No</th>
                                        <th>ID Alat</th>
                                        <th>Alat</th>
                                        <th>Aksi</th>                                    
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
									$no=1;
									foreach($daftar_angkut as $d){
								?>
                                	<tr>
                                    	<td><?php echo $no++?></td>
										<td><?php echo $d->ID_ANGKUT; ?></td>
										<td><?php echo $d->TIPE_ANGKUT_PD; ?></td>
										<td><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#detail_modal" 
												data-id_alat="<?php echo $d->ID_ANGKUT;?>" data-nama_alat="<?php echo $d->TIPE_ANGKUT_PD;?>" 												 						 													
												data-url="<?php echo base_url();?>alat_angkut_controller/edit/"> 
												Detail
											</button> |											
											<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete_modal" 
												data-id="<?php echo $d->ID_ANGKUT;?>" data-nama="<?php echo $d->TIPE_ANGKUT_PD;?>" 
												data-url="<?php echo base_url();?>alat_angkut_controller/hapus/"> 
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
        				<h4 class="modal-title" id="myModalLabel">Hapus Data Provinsi</h4>
      				</div>
      				<div class="modal-body">
        				Apakah anda yakin menghapus alat angkut <b><span id="nama"></span></b> 
        				(ID : <b><span id="id"></span></b>) ? 
      				</div>
      				<div class="modal-footer">
        				<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        				<a id="link_hapus" href=""><button type="button" class="btn btn-danger" >Hapus</button></a>
      				</div>
   				 </div>
  			</div>
		</div>
		<div class="modal fade" id="detail_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  			<div class="modal-dialog" role="document">
    			<div class="modal-content">
      				<div class="modal-header">
        				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        				<h4 class="modal-title" id="myModalLabel">Detail Tujuan Dinas </h4>
      				</div>
      				<div class="modal-body">
        				ID Provinsi : <b><span id="id_alat"></span></b> <br />
        				Provinsi : <b><span id="nama_alat"></span></b><br />        				        				
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
					  var url = button.data('url') 
					  console.log(id)
					  
					  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
					  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
					  var modal = $(this)
					  modal.find('#nama').text(nama)					  
					  modal.find('#id').text(id)
					  modal.find('#link_hapus').attr('href', url+id)
					})
				$('#detail_modal').on('show.bs.modal', function (event) {
					  var button = $(event.relatedTarget) // Button that triggered the modal
					  // Extract info from data-* attributes					 					  			 
					  var id_alat = button.data('id_alat')
					  var nama_alat = button.data('nama_alat')					  					  					
					  var url = button.data('url') 
					  console.log(id_alat)
					  
					  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
					  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
					  var modal = $(this)					  
					  modal.find('#id_alat').text(id_alat)
					  modal.find('#nama_alat').text(nama_alat)					 
					  modal.find('#link_edit').attr('href', url+id_alat)
					})
			});
		</script>    
                        
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
