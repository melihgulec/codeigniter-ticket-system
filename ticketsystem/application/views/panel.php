<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <?php $this->load->view("dependencies/styles"); ?>
    <?php $this->load->view("dependencies/scripts"); ?>
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

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li class="active"><a href="<?php echo base_url("panel") ?>">Unanswered Support Requests<span class="sr-only">(current)</span></a></li>
            <li><a href="<?php echo base_url("answered") ?>">All Support Requests</a></li>
          </ul>

          <ul class="nav navbar-nav navbar-right">
            <li><a href="<?php echo base_url("logout");?>">Logout</a></li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>

<div class="container">
    <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered table-hover table-striped" style="border:3px solid black";>
                    <thead>
                        <th class="text-center">Problem</th>
                        <th class="text-center">Product</th>
                        <th class="text-center">User</th>
                        <th class="text-center">Title</th>
                        <th class="text-center">Explanation</th>
                        <th class="text-center">Date</th>
                        <th class="text-center">Reply</th>
                    </thead>
                    <tbody>
                      <?php foreach ($data as $row) { ?>
                     <tr>
                         <td class="text-center">
                             <?php echo $row->categorie; ?>
                         </td>
                         <td >
                           <?php echo $row->product_name; ?>
                         </td>
                         <td>
                           <?php echo $row->user_username; ?>
                         </td>
                         <td>
                           <?php echo $row->ticket_title; ?>
                         </td>
                         <td class="text-left" style="width:500px; height:50px">
                           <?php echo $row->ticket_exp; ?>
                         </td>
                         <td>
                           <?php echo $row->ticket_date; ?>
                         </td>
                         <td class="text-center">
                           <a href="<?php echo base_url("reply/getTicket/$row->ticket_id");?>" class="btn btn-danger">Reply</a>
                         </td>
                     </tr>
                 <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
  </div>
  </body>
</html>
