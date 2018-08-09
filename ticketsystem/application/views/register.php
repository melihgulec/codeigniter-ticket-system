<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo base_url("assets/css/register.css")?>">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    <?php
    $this->load->view("dependencies/scripts");
    $this->load->view("dependencies/styles");
    ?>
    
</head>
<body>
<script>

    <?php

    $type = $this->session->flashdata("type");
    $title = $this->session->flashdata("title");
    $exp = $this->session->flashdata("exp");
    $status = $this->session->flashdata("status");

    if($status){

      echo "swal('".$title."', '".$exp."', '".$type."');";
      //$this->session->set_flashdata("status", "0");
    }

    ?>
  </script>
    <div class="container">
			<div class="row main">
				<div class="main-login main-center">
				<h5>Sign up once and request help.</h5>
					<form class="" method="post" action="<?php echo base_url("userInsert"); ?>">
						
						<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Your Name</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="name" id="name"  placeholder="Enter your Name"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="email" class="cols-sm-2 control-label">Your Email</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="email" id="email"  placeholder="Enter your Email"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="username" class="cols-sm-2 control-label">Username</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="username" id="username"  placeholder="Enter your Username"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="password" class="cols-sm-2 control-label">Password</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="password" id="password"  placeholder="Enter your Password"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="confirm" class="cols-sm-2 control-label">Confirm Password</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="confirm" id="confirm"  placeholder="Confirm your Password"/>
								</div>
							</div>
						</div>

						<div class="form-group ">
							<button type="submit" id="button" class="btn btn-primary btn-lg btn-block login-button">Register</a>
						</div>
					</form>
				</div>
			</div>
		</div>
</body>
</html>