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
      <a class="navbar-brand" href="#"><?php echo $this->session->userdata("username");?></a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="<?php echo base_url("ticket");?>">Send Support Request</a></li>
        <li class="active"><a href="<?php echo base_url("sent");?>">My Requests<span class="sr-only">(current)</span></a></li>
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
                <table class="table table-bordered table-hover table-striped myTable" style="border:3px solid black";>
                    <thead>
                        <th class="text-center">Problem</th>
                        <th class="text-center">Product</th>
                        <th class="text-center">User</th>
                        <th class="text-center">Title</th>
                        <th class="text-center">Explanation</th>
                        <th class="text-center">Date</th>
                        <th class="text-center">Status</th>
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
                           <?php

                              if($row->ticket_status == 1)
                              {
                                echo "Answered";?><br><br><form action="<?php echo base_url("reply/getTicket/$row->ticket_id");?>"><input type="submit" class="btn btn-danger" value="See"></form><?php
                              }
                              else {
                                echo "Awaiting Response"?><br><br><form action="<?php echo base_url("reply/getTicket/$row->ticket_id");?>"><input type="submit" class="btn btn-primary" value="See"></form><?php
                              }
                              ?>
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
