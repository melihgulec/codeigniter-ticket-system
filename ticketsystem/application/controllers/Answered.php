<?php
class Answered extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model("answered_model");
    $this->load->helper("authentication_helper");
  }

  public function index()
  {
    admin_verify_session();
    $viewData['data']=$this->answered_model->getAnsweredTickets();
    $this->load->view("answered", $viewData);
  }
}


?>
