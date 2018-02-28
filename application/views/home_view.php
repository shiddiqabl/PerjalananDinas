
        <div id="page-wrapper">
			<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Daftar Perjalanan Dinas</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
            	<div class="col-lg-12">
            		<a href="<?php echo base_url(); ?>home/tambah_perjalanan" class="btn btn-outline btn-success btn-lg btn-block" role="button">
            			+ Tambah Perjalanan Dinas
            		</a>            		
            		<br>
            	</div>
             <?php 
				if($this->session->flashdata('message')){
					echo $this->session->flashdata('message');
				}
			?>	
            </div>
            <div class="row">
                <div  class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Daftar Perjalanan Dinas Pemerintah Daerah Kabupaten Sragen
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body" >
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>                                       
                                        <th>ID</th>
                                        <th>NIP</th>
                                        <th>Nama</th>
                                        <th>Lokasi</th>                                                                          
                                        <th>Daerah Tujuan</th>                                        
                                        <th>Tgl Berangkat</th>
                                        <th>Tgl Kembali</th>
                                        <th>Status</th>                                                                              
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
									$no=1;
									foreach($perjalanan_dinas as $d){
								?>
                                	<tr>
                                    	<?php $no++?>
                                    	<td><?php echo $d->id_perjalanan; ?></td>
										<td><?php echo $d->NIP; ?></td>
										<td><?php echo $d->NAMA; ?></td>																				
										<td><?php echo $d->STATUS; ?></td>										
										<td><?php if($d->ID_STATUS == 'S2'){
												  		echo ''.$daftar_kota[substr($d->id_tujuan, 5,5)];
													}else 
												  	{
												  		echo 'Kecamatan '.$daftar_kec[substr($d->id_tujuan, 10,5)];	
												  	}?></td>										
										<td><?php echo $d->tgl_berangkat; ?></td>
										<td><?php echo $d->tgl_kembali; ?></td>	
										<td><?php echo $d->status_pd;?></td>							
										<td>											
											<!-- <a href="<?php echo base_url(); ?>home/edit/<?php echo $d->id_perjalanan; ?>">Edit</a> -->
											<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#detail_modal" 
												data-id="<?php echo $d->id_perjalanan;?>" data-nip="<?php echo $d->NIP;?>" 
												data-nama="<?php echo $d->NAMA;?>" data-id_tujuan="<?php echo substr($d->id_tujuan, 5, 5);?>" 
												data-nama_tujuan="<?php if(strlen($d->id_tujuan) == 10){
												  							echo ''.$daftar_kota[substr($d->id_tujuan, 5,5)];
																		}else 
												  						{
												  							echo 'Kecamatan '.$daftar_kec[substr($d->id_tujuan, 10,5)];	
												  						}?>" 
												data-id_status="<?php echo $d->ID_STATUS;?>" data-status="<?php echo $d->STATUS;?>"
												data-tgl_berangkat="<?php echo $d->tgl_berangkat;?>" data-tgl_kembali="<?php echo$d->tgl_kembali;?>"
												data-lama_perjalanan="<?php echo $d->lama_perjalanan;?>" data-id_angkut="<?php echo $d->id_angkut;?>" 
												data-tipe_angkut="<?php echo $d->tipe_angkut_pd;?>" data-maksud="<?php echo $d->maksud_pd;?>"
												data-status_pd="<?php echo $d->status_pd;?>"							 													
												data-url="<?php echo base_url();?>home/edit/"
												data-url_print="<?php echo base_url();?>home/print_pd/"> 
												Detail
											</button>
											<!-- <a href="<?php echo base_url(); ?>home/hapus/<?php echo $d->id_perjalanan; ?>">Hapus</a> -->
											<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete_modal" 
												data-id="<?php echo $d->id_perjalanan;?>" data-nama="<?php echo $d->NAMA;?>" 
												data-tujuan="<?php echo $daftar_kota[substr($d->id_tujuan, 5,5)];?>" data-url="<?php echo base_url();?>home/hapus/"> 
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
            </div>    
            <!-- /.row -->
            
        <!-- Modal -->
		<div class="modal fade" id="delete_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  			<div class="modal-dialog" role="document">
    			<div class="modal-content">
      				<div class="modal-header">
        				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        				<h4 class="modal-title" id="myModalLabel">Hapus Perjalanan Dinas</h4>
      				</div>
      				<div class="modal-body">
        				Apakah anda  yakin menghapus data perjalanan dinas <b><span id="id"></span></b> atas nama 
        				<b><span id="nama"></span></b>
        				dengan tujuan <b><span id="tujuan"></span></b> ? 
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
        				<h4 class="modal-title" id="myModalLabel">Detail Perjalanan Dinas </h4>
      				</div>
      				<div class="modal-body">
        				ID : <b><span id="id"></span></b> <br />
        				Pegawai : <b><span id="nip"></span> - <span id="nama"></span></b><br />
        				Tujuan : <b><span id="nama_tujuan"></span></b><br />
        				Lokasi : <b><span id="id_status"></span> - <span id="status"></span></b><br />
        				Tanggal Berangkat : <b><span id="tgl_berangkat"></span></b><br />
        				Tanggal Kembali : <b><span id="tgl_kembali"></span></b><br />
        				Lama Perjalanan : <b><span id="lama_perjalanan"></span></b><br />        				
        				Alat Angkut : <b><span id="id_angkut"></span> - <span id="tipe_angkut_pd"></span></b><br />
        				Maksud Perjalanan Dinas : <b><span id="maksud_perjalanan"></span></b><br />
        				Status : <b><span id="status_pd"></span></b><br />
      				</div>
      				<div class="modal-footer">
        				<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        				<a id="link_print_pd" href=""><button type="button" class="btn btn-info" >Print</button></a>
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
					  var tujuan = button.data('tujuan')
					  var url = button.data('url') 
					  console.log(id)
					  
					  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
					  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
					  var modal = $(this)
					  modal.find('#nama').text(nama)
					  modal.find('#tujuan').text(tujuan)
					  modal.find('#id').text(id)
					  modal.find('#link_hapus').attr('href', url+id)
					})
				$('#detail_modal').on('show.bs.modal', function (event) {
					  var button = $(event.relatedTarget) // Button that triggered the modal
					  var id = button.data('id') // Extract info from data-* attributes
					  var nip = button.data('nip')
					  var nama = button.data('nama')
					  var id_tujuan = button.data('id_tujuan')
					  var nama_tujuan = button.data('nama_tujuan')
					  var id_status = button.data('id_status')
					  var status = button.data('status')
					  var tgl_berangkat = button.data('tgl_berangkat')
					  var tgl_kembali = button.data('tgl_kembali')
					  var lama_perjalanan = button.data('lama_perjalanan')
					  var id_angkut = button.data('id_angkut')
					  var tipe_angkut = button.data('tipe_angkut')
					  var maksud = button.data('maksud')					 
					  var status_pd = button.data('status_pd')
					  var url_print = button.data('url_print')					
					  var url = button.data('url') 
					  console.log(id)
					  
					  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
					  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
					  var modal = $(this)
					  modal.find('#nama').text(nama)
					  modal.find('#nip').text(nip)
					  modal.find('#id').text(id)
					  modal.find('#id_tujuan').text(id_tujuan)
					  modal.find('#nama_tujuan').text(nama_tujuan)
					  modal.find('#id_status').text(id_status)
					  modal.find('#status').text(status)
					  modal.find('#tgl_berangkat').text(tgl_berangkat)
					  modal.find('#tgl_kembali').text(tgl_kembali)
					  modal.find('#lama_perjalanan').text(lama_perjalanan)					  					 
					  modal.find('#id_angkut').text(id_angkut)
					  modal.find('#tipe_angkut_pd').text(tipe_angkut)
					  modal.find('#maksud_perjalanan').text(maksud)
					   modal.find('#status_pd').text(status_pd)
					  modal.find('#link_edit').attr('href', url+id)
					  modal.find('#link_print_pd').attr('href', url_print+id)
					})
			});
		</script>
            
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->