<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <?php $this->load->view("dependencies/styles"); ?>
    <?php $this->load->view("dependencies/scripts"); ?>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/ticket.css');?>">
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
<!-- Navbar -->
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"><?php echo $this->session->userdata("username");?></a> <!-- Username -->
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="<?php echo base_url("ticket");?>">Send Support Request<span class="sr-only">(current)</span></a></li>
        <li><a href="<?php echo base_url("sent");?>">My Requests</a></li>
      </ul>

      <ul class="nav navbar-nav navbar-right">
        <li><a href="<?php echo base_url("logout");?>">Logout</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<!-- Navbar end -->

<div class="container">
  <div class="row">
    <div class="col-md-12">
  <form class="well form-horizontal" action="<?php echo base_url('ticket-insert')?>" method="post" id="contact_form" enctype="multipart/form-data">
    <fieldset>
      <!-- Form Name -->
      <legend>Company Name</legend>

      <!-- Get Categorie -->
      <div class="form-group">
        <label class="col-md-4 control-label">What kind of help do you need?</label>
        <div class="col-md-4 inputGroupContainer">
          <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-asterisk"></i></span>
            <select class="form-control selectpicker" name="categorie">
              <?php
                foreach ($categorie as $categorie_data) {
                  echo '<option>'.$categorie_data->id."- ".$categorie_data->categorie.'</option>';
                }
              ?>
            </select>
          </div>
        </div>
      </div>

      <!-- Get Product -->
      <div class="form-group">
        <label class="col-md-4 control-label">Your Product</label>
        <div class="col-md-4 inputGroupContainer">
          <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-asterisk"></i></span>
            <select class="form-control selectpicker" name="product_type">
              <?php
                foreach ($product as $product_data) {
                  echo '<option>'.$product_data->id."- ".$product_data->product_name.'</option>';
                }
              ?>
            </select>
          </div>
        </div>
      </div>

      <!-- Title -->
      <div class="form-group">
        <label class="col-md-4 control-label">Title</label>
        <div class="col-md-4 inputGroupContainer">
          <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-asterisk"></i></span>
            <input name="title" class="form-control" type="text">
          </div>
        </div>
      </div>


      <!-- Text area -->

      <div class="form-group">
        <label class="col-md-4 control-label">Tell Us</label>
        <div class="col-lg-4 inputGroupContainer">
          <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
            <textarea class="form-control" name="exp" placeholder="" rows="5"></textarea>
          </div>
        </div>
      </div>

      <!-- Send Button -->
      <div class="form-group">
        <label class="col-md-4 control-label"></label>
        <div class="col-md-4">
          <input type="submit" class="btn btn-primary" value="Send"></button><br><br>
          <input type="file" name="userfile" accept="image/x-png">
        </form>
        </div>
      </div>
  </fieldset>

</div>
      </div>
</div>
</div>
</div>
</div>

  </body>
</html>
