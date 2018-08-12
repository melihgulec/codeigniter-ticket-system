<?php
class Ticket extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    user_verify_session();

    $this->load->model("ticket_model");
    $this->load->helper("swal_helper");
    $this->load->helper("authentication_helper");
  }

  public $get_categories;
  public $get_products;
  public $user_auth;
  public $v_data;

  public function get_all()
  {
    $this->get_categories = $this->ticket_model->get_categories();
    $this->get_products = $this->ticket_model->get_products();

    $this->v_data = array(
      'categorie' => $this->get_categories,
      'product'   => $this->get_products
    );
  }

  public function index()
  {
      user_verify_session();
      $this->get_all();
      $this->load->view("ticket", $this->v_data);
  }

  function getLast_id(){
    $result = $this->db->order_by("id", "DESC")->get("tickets")->row();
    return $result->id;
  }


  function upload()
  {
    $last = $this->getLast_id() + 1;
    if($_FILES['userfile']['name'] != "") {

        $config['upload_path']          = "uploads/";
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = $last;
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('userfile'))
        {
          echo $this->upload->display_errors();
        }
        else{
          echo $this->db->insert_id();
        }

        $data = $last.".png";
        return $data;
    }
    else{
      $data = "null";
      return $data;
    }
  }

  public function insert()
  {
    $categorie = $this->input->post("categorie");
    $product_type = $this->input->post("product_type");
    $title = $this->input->post("title");
    $exp = $this->input->post("exp");

    $this->form_validation->set_rules("title", "Title", "required");
    $this->form_validation->set_rules("exp", "Explanation", "required");

    if($this->form_validation->run() == TRUE)
    {
      $categorie_arr = explode("-", $categorie);
      $product_arr = explode("-", $product_type);

      $insert = $this->ticket_model->ticket_insert(
        array(
          "user_id"       => $this->session->userdata("user_id"),
          "ticket_date"   => date("Y-m-d H:i:s"),
          "categorie_id"  => $categorie_arr[0],
          "product_id"    => $product_arr[0],
          "ticket_title"  => $title,
          "ticket_exp"    => $exp,
          "ticket_status" => "0",
          "attachments"   => $this->upload()
        )
      );

      doSwalAlert("Success!", "Your support request has been saved.", "success");
      redirect(base_url("sent"));
    }
    else {
      doSwalAlert("Error!", "You must fill all fields.", "error");
      redirect(base_url("ticket"));
    }
  }
}

?>
