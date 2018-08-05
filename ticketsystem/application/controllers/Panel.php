<?php
class Panel extends CI_Controller
{
  public function __construct(){
    parent::__construct();
    $this->load->model("panel_model");
  }

  public function index()
  {
    $viewData['data']=$this->panel_model->getAll(array(
      "tickets.ticket_status" => "0"
    ));
    $this->load->view("panel", $viewData);
  }
}
?>
