        <div id="page-wrapper">
			<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Table Data Pegawai</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
            	<div class="col-lg-12">
            		<a href="<?php echo base_url(); ?>data_pegawai_controller/tambah" class="btn btn-outline btn-success btn-lg btn-block" role="button">
            			+ Tambah Data Pegawai Baru
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
                            Data Pegawai Pemerintah Daerah Kabupaten Sragen
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>No </th>
                                        <th>NIP</th>
                                        <th>Nama</th>
                                        <th>Jabatan</th>
                                        <th>Golongan / Eselon</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
									$no=1;
									foreach($daftar_pegawai as $d){
								?>
                                	<tr>
                                    	<td><?php echo $no++?></td>
										<td><?php echo $d->NIP; ?></td>
										<td><?php echo $d->NAMA; ?></td>
										<td><?php echo $d->JABATAN; ?></td>
										<td><?php echo $d->PANGKAT; ?></td>										
										<td><!-- <?php echo anchor('data_pegawai_controller/edit/'.$d->NIP, 'Edit')?> -->
											<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#detail_modal" 
												data-nip="<?php echo $d->NIP;?>" data-nama="<?php echo $d->NAMA;?>" 
												data-jabatan="<?php echo $d->JABATAN;?>" data-id_pangkat="<?php echo $d->ID_PANGKAT;?>"  
												data-pangkat="<?php echo $d->PANGKAT;?>" 						 													
												data-url="<?php echo base_url();?>data_pegawai_controller/edit/"> 
												Detail
											</button>
											<!-- <?php echo anchor('data_pegawai_controller/hapus/'.$d->NIP, 'Hapus')?> -->
											<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete_modal" 
												data-nip="<?php echo $d->NIP;?>" data-nama="<?php echo $d->NAMA;?>" 
												data-url="<?php echo base_url();?>data_pegawai_controller/hapus/"> 
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
        				<h4 class="modal-title" id="myModalLabel">Hapus Data Pegawai</h4>
      				</div>
      				<div class="modal-body">
        				Apakah anda yakin menghapus data <b><span id="nama"></span></b> ( NIP : <b><span id="nip"></span></b>) ? 
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
        				<h4 class="modal-title" id="myModalLabel">Detail Pegawai </h4>
      				</div>
      				<div class="modal-body">
        				NIP : <b><span id="nip"></span></b> <br />
        				Nama : <b><span id="nama"></span></b><br />
        				Jabatan : <b><span id="jabatan"></span></b><br />
        				Pangkat : <b><span id="id_pangkat"></span> - <span id="pangkat"></span></b><br />        				
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
					  var nip = button.data('nip') // Extract info from data-* attributes
					  var nama = button.data('nama')					 
					  var url = button.data('url') 
					  console.log(nip)
					  
					  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
					  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
					  var modal = $(this)
					  modal.find('#nama').text(nama)					  
					  modal.find('#nip').text(nip)
					  modal.find('#link_hapus').attr('href', url+nip)
					})
				$('#detail_modal').on('show.bs.modal', function (event) {
					  var button = $(event.relatedTarget) // Button that triggered the modal
					  var nip = button.data('nip') // Extract info from data-* attributes					 
					  var nama = button.data('nama')
					  var jabatan = button.data('jabatan')					 
					  var id_pangkat = button.data('id_pangkat')
					  var pangkat = button.data('pangkat')					  					  					
					  var url = button.data('url') 
					  console.log(nip)
					  
					  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
					  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
					  var modal = $(this)
					  modal.find('#nama').text(nama)
					  modal.find('#nip').text(nip)
					  modal.find('#jabatan').text(jabatan)
					  modal.find('#id_pangkat').text(id_pangkat)
					  modal.find('#pangkat').text(pangkat)					 
					  modal.find('#link_edit').attr('href', url+nip)
					})
			});
		</script>    
		    
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
