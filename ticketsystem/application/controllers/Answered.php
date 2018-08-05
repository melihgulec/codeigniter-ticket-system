<?php
class Answered extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model("answered_model");
  }

  public function index()
  {
    $viewData['data']=$this->answered_model->getAnsweredTickets();
    $this->load->view("answered", $viewData);
  }
}


?>
