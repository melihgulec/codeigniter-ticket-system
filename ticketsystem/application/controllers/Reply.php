<?php
class Reply extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model("reply_model");
    $this->load->helper("swal_helper");
    $this->load->library('user_agent');
    $this->load->helper("authentication_helper");
  }

  public $ticket_id;

  public function getTicket()
  {
     only_registered_session();
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

  function getLast_id(){
    $result = $this->db->order_by("id", "DESC")->get("tickets_reply")->row();
    return $result->id;
  }

  function upload()
  {
    $last = $this->getLast_id() + 1;
    if($_FILES['userfile']['name'] != "") {

        $config['upload_path']          = "uploads/";
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = $this->session->userdata("last-ticket-id")."-".$last;
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('userfile'))
        {
          echo $this->upload->display_errors();
        }
        else{
          echo $this->db->insert_id();
        }

        $data = $this->session->userdata("last-ticket-id")."-".($this->getLast_id()+1).".png";
        return $data;
    }
    else{
      $data = "null";
      return $data;
    }
  }

  public function insert()
  {
    /*setlocale(LC_TIME,'turkish');
    $date = iconv('latin5','utf-8',strftime('%d %B %Y - %H:%M:%S'));*/
    
    $date = strftime('%d %B %Y - %H:%M');

    $this->form_validation->set_rules("reply_exp", "Explanation", "required");

    if($this->form_validation->run() == TRUE)
    {
      $reply_exp = $this->input->post("reply_exp");

      $result = $this->reply_model->replyInsert(array(
        "ticket_id"   => $this->session->userdata("last-ticket-id"),
        "reply_exp"   => $reply_exp,
        "user_id"     => $this->session->userdata("user_id"),
        "reply_date"  => $date,
        "attachments" => $this->upload()
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
