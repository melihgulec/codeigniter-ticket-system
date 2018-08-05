<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <?php $this->load->view("dependencies/styles");?>
    <?php $this->load->view("dependencies/scripts");?>

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

    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><?php echo $this->session->userdata("username");?></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li>
              <?php

                if($this->session->userdata("user_id") == "1"){
                  echo "<a href='"; echo (base_url("panel"))."'>Unanswered Support Requests</a>";
                }
                else if($this->session->userdata("user_id") == "2"){
                  echo "<a href='"; echo (base_url("ticket"))."'>Send Support Request</a>";
                }


              ?>
              </li>
              <?php

              if($this->session->userdata("user_id") == "2"){
                echo "<li><a href='"; echo (base_url("sent"))."'>My Requests</a></li>";

              }

              if($this->session->userdata("user_id") == "1"){
                echo "<li><a href='"; echo (base_url("answered"))."'>All Support Requests</a></li>";

              }
              ?>

          </ul>

          <ul class="nav navbar-nav navbar-right">
            <li><a href="<?php echo base_url("logout");?>">Logout</a></li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>

    <!-- Navbar END -->

    <!-- Reply Form Begins -->

    <div class="container">
      <div class="row">
        <div class="col-md-15">
      <div class="well form-horizontal" method="post" id="contact_form">
        <fieldset>
          <!-- Form Name -->
          <legend>Request #<?php echo $data->ticket_id ?></legend>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-4 control-label">Problem</label>
            <div class="col-md-4">
              <p class="form-control-static"><?php echo $data->categorie ?></p>
            </div>
          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-4 control-label">Product</label>
            <div class="col-md-4 inputGroupContainer">
              <div class="input-group">
                <p class="form-control-static"><?php echo $data->product_name ?></p>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-4 control-label">Title</label>
            <div class="col-md-4 inputGroupContainer">
              <div class="input-group">
                <p class="form-control-static"><?php echo $data->ticket_title ?></p>
              </div>
            </div>
          </div>


          <!-- Text area -->

          <div class="form-group">
            <label class="col-md-4 control-label">Explanation</label>
            <div class="col-md-6 inputGroupContainer">
              <div class="input-group">
                <p class="form-control-static"><?php echo $data->ticket_exp ?></p>
              </div>
            </div>
          </div>

          <?php
            foreach($reply as $row){
          ?>
         <hr>
          <div class="panel panel-default">
            <div class="panel-body" style="<?php if($row->user_auth == "1"){echo 'background-color:#f9dede';}  ?>"><b><?php if($row->user_auth == "1"){echo $row->user_username." - Support Team";} else {echo $row->user_username;} ?></b><label class="pull-right"><?php echo $row->reply_date ?></label></div>
            <div class="panel-footer"><?php echo $row->reply_exp ?></div>
          </div>
      <?php } ?>

          <form action="<?php echo base_url("reply/insert") ?>" method="post">
            <div class="form-group">
              <label class="col-md-4 control-label">Your answer</label>
              <div class="col-md-4 inputGroupContainer">
                <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                  <textarea name="reply_exp" class="form-control" rows="5"></textarea>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-4 control-label"></label>
              <div class="col-md-4">
                <input type="submit" class="btn btn-primary" value="Send"></button>
              </div>
              </div>
            </div>
          </form>
      </fieldset>

    </div>
          </div>
    </div>

  </body>
</html>
