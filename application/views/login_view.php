<html>
	<head>
		<title>Login</title>
		<link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.css"); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>
	<body>
		<?php echo form_open('verifylogin'); ?>
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-md-offset-4">
					<div class="login-panel panel panel-default">
						<div class="panel-heading">
                        	<h3 class="panel-title">Masuk ke SIPD</h3>
                    	</div>
						<div class="panel-body">
							<?php echo validation_errors(); ?>
							<form class="form-horizontal">
							<div class="form-group">
								<label for="username">Username:</label>
								<input type="text" id="username" class="form-control" name="username" autofocus/>
							</div>
							<div class="form-group">
								<label for="password">Password:</label>
								<input type="password" id="password" class="form-control" name="password" />
							</div>
							<button type="submit" class="btn btn-success">Login</button> 
							<a href="<?php echo base_url(); ?>lupa_password" class="btn btn-outline btn-info " role="button">
            					Lupa Password
            				</a>    
						</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script type="text/javascript" src="<?php echo base_url("assets/js/jquery.js"); ?>"></script>
		<script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.js"); ?>"></script>
	</body>
</html>
