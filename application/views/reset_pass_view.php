<html>
	<head>
		<title>Reset Password</title>
		<link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.css"); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>
	<body>		
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-md-offset-4">
					<div class="login-panel panel panel-default">
						<div class="panel-heading">
                        	<h3 class="panel-title">Silahkan masukkan password baru</h3>
                    	</div>
						<div class="panel-body">
							<?php foreach ($data_user as $u){?>
							<form  action="<?php echo base_url().'lupa_password/update_pass'; ?>" method="post" role="form">
							<div class="form-group">
								<label for="username">Username</label>
								<input type="hidden" id="username" class="form-control" name="username" value="<?php echo $u->username?>" />
								<p class="form-control-static"><?php echo $u->username?></p>	
							</div>	
							<div class="form-group">
								<label for="username">Email</label>
								<input type="hidden" id="email" class="form-control" name="email" value="<?php echo $u->email?>" />
								<p class="form-control-static"><?php echo $u->email?></p>	
							</div>
							<div class="form-group">
								<label for="username">Password Baru</label>
								<input type="password" id="password" class="form-control" name="password" required autofocus/>
							</div>								
							<button type="submit" class="btn btn-success">Submit</button>	
							<a href="<?php echo base_url();?>/login/index" class="btn btn-danger" role="button">Batal</a>				  
							</form>
						<?php }?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script type="text/javascript" src="<?php echo base_url("assets/js/jquery.js"); ?>"></script>
		<script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.js"); ?>"></script>
	</body>
</html>
