<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="<?php echo base_url("assets/css/login.css")?>">
    <script src="<?php echo base_url('assets\js\sweetalert2.all.min.js')?>"></script>
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
    <div class="site">
    <div class="box">
      <p class="title">Login</p>
      <div class="loginInputs">
        <form action="<?php echo base_url("login-control")?>" method="post">
          <input type="text" class="userid" name="form_username" placeholder="Username">
          <input type="password" class="userpass" name="form_password" placeholder="Password">
          <p style="color:#2196F3">Did you forget your password ?</p>
          <input type="submit" class="loginbutton" value="LOGIN">
        </form>
      </div>
    </div>
  </div>
  </body>
</html>
