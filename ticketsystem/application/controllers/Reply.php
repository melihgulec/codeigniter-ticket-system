<?php
class Reply extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model("reply_model");
    $this->load->helper("swal_helper");
    $this->load->library('user_agent');

  }

  public $ticket_id;

  public function getTicketDetails()
  {

     $this->ticket_id = $this->uri->segment(3);
     $this->session->set_userdata("last-ticket-id", $this->ticket_id);
     $result = $this->reply_model->getTicket(array(
      "tickets.id" => $this->ticket_id
    ));

    $replys = $this->reply_model->getReplys(array(
      "tickets.id" => $this->ticket_id
    ));

    $viewData = array(
      "data"  => $result,
      "reply" => $replys
    );
    $this->load->view("reply", $viewData);
  }

  public function insert()
  {
    /*setlocale(LC_TIME,'turkish');
    $date = iconv('latin5','utf-8',strftime('%d %B %Y - %H:%M:%S'));*/
    
    $date = strftime('%d %B %Y - %H:%M:%S');

    $this->form_validation->set_rules("reply_exp", "Explanation", "required");
    if($this->form_validation->run() == TRUE)
    {
      $reply_exp = $this->input->post("reply_exp");

      $result = $this->reply_model->replyInsert(array(
        "ticket_id"   => $this->session->userdata("last-ticket-id"),
        "reply_exp"   => $reply_exp,
        "user_id"     => $this->session->userdata("user_id"),
        "reply_date"  => $date
      ));

      if($result != "")
      {
        doSwalAlert("Success!", "Your response has been saved.", "success");
        redirect($this->agent->referrer());
      }
    }
    else {
      doSwalAlert("Error!", "You must fill all fields.", "error");
      redirect($this->agent->referrer());
    }
  }
}
?>
