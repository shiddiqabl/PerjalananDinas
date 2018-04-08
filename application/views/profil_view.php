		<div id="page-wrapper">
			<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Profil Pengguna</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
            	<div class="col-lg-12">
                    <div class="panel panel-default">
                    	<div class="panel-heading">
                           Profil Pengguna SIPD
                       	</div>
                       	<div class="panel-body">
                       		<div class="row">
                       		<div class="col-lg-6">                       			
							<?php foreach ($data_profil as $p){?>
								<form  action="<?php echo base_url().'home/update_profil'; ?>" method="post" role="form">									
									<div class="form-group">
										<label  for="username">Username</label>
										<input type="hidden" name="username" value="<?php echo $p->username?>"> 
										<p class="form-control-static"><?php echo $p->username?></p>																		
									</div>
									<div class="form-group">
										<label for="Email">Email</label>
										<input class="form-control" type="email" name="email_edit" value="<?php echo $p->email?>" maxlength="50">
									</div>									
									<input class="btn btn-primary" type="submit" value="Simpan">
									<a href="<?php echo base_url();?>home" class="btn btn-danger" role="button">Batal</a>
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
		</div>
        <!-- /#page-wrapper -->
