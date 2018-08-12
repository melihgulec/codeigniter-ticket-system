<?php
class Sent extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model("sent_model");
    $this->load->helper("authentication_helper");
  }

  public function index()
  {
    user_verify_session();
    $result = $this->sent_model->getRows(array(
      "users.id" => $this->session->userdata("user_id")
    ));

    $viewData['data'] = $result;

    $this->load->view("sent", $viewData);
  }
}
?>
