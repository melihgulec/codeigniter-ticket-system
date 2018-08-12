<?php
class Panel extends CI_Controller
{
  public function __construct(){
    parent::__construct();
    $this->load->model("panel_model");
    $this->load->helper("authentication_helper");
  }

  public function index()
  {
    admin_verify_session();
    $viewData['data']=$this->panel_model->getAll(array(
      "tickets.ticket_status" => "0"
    ));
    $this->load->view("panel", $viewData);
  }
}
?>
