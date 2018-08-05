<?php
class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
        $this->load->helper('swal_helper');
    }

    public function index()
    {
        $this->load->view("login");
    }

    public function loginControl()
    {
        $this->form_validation->set_rules("form_username", "Username", "required|trim");
        $this->form_validation->set_rules("form_password", "Password", "required|trim");

       if ($this->form_validation->run() == TRUE) {
          $form_username = $this->input->post("form_username");
          $form_password = $this->input->post("form_password");

          $items = $this->login_model->loginDataControl(
            array(
            "user_username" => $form_username,
            "user_pass"     => md5($form_password)
          )
        );

          @$curr_username = $items->user_username;
          @$curr_auth = $items->user_auth;
          @$user_id = $items->id;

          if(!is_null($curr_username))
          {
            $this->session->set_userdata("user_id", $user_id);
            $this->session->set_userdata("username", $curr_username);
            $this->session->set_userdata("user_auth", $curr_auth);

            if($curr_auth == 1) // Admin
            {
              redirect(base_url('panel'));
            }
            else if($curr_auth == 2){ // User
              redirect(base_url('ticket'));
            }
          }
          else {

            doSwalAlert('Error!', 'User not found.', 'error');
            redirect(base_url("login"));
        }
        }else {

          doSwalAlert('Error!', 'You must fill all fields.', 'error');
          redirect(base_url("login"));
      }
    }

    public function logout()
    {
      $this->session->sess_destroy();
      redirect(base_url("login"));
    }
  }

?>
