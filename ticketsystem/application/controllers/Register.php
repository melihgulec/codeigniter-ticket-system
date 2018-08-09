<?php
class Register extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper("swal_helper");
        $this->load->model("register_model");
    }

    public function index()
    {
        $this->load->view("register");
    }

    function createHash($length) {
        $chars = 'qwertyuopasdfghjklizxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM1234567890';
        return substr(str_shuffle($chars), 0, $length);
    }

    public function register()
    {
        $hash = $this->createHash(32);
        $username = $this->form_validation->set_rules("username","Username","required|trim");
        $name     = $this->form_validation->set_rules("name", "Name", "required|trim");
        $email    = $this->form_validation->set_rules("email", "Email", "required|trim");
        $password = $this->form_validation->set_rules("password", "Password", "required|trim");
        $confirm  = $this->form_validation->set_rules("confirm", "Confirm", "required|trim");

        if($this->form_validation->run() == TRUE)
        {
            $name = $this->input->post("name");
            $username = $this->input->post("username");
            $email = $this->input->post("email");
            $password = md5($this->input->post("password"));
            $confirm = md5($this->input->post("confirm"));

            $check = $this->register_model->usernameCheck($username, $email);

            if($check == 1)
            {
                doSwalAlert("Error!","Email or username already in use.","error");
                redirect(base_url("register"));
            }
            else{

                if($password != $confirm)
                    {
                        doSwalAlert("Error!","Password not match.","error");
                        redirect(base_url("register"));
                    }
                else{
                    $this->register_model->userInsert(array(
                        "user_name"     => $name,
                        "user_username" => $username,
                        "user_pass"     => $password,
                        "user_email"    => $email,
                        "hash"          => $hash,
                        "user_auth"     => "2"
                    ));
                }

                doSwalAlert("Success!","Account is created.","succes");
                redirect(base_url("login"));
                
            }
        }
        else{
            doSwalAlert("Error!","You must fill al fields.","error");
            redirect(base_url("register"));
        }
    }
}


?>