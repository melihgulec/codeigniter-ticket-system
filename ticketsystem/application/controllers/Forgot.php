<?php
class Forgot extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        
    }

    public function index()
    {
        $this->load->view("forgot");
    }

    public function getUserDetail($username)
    {
        $result = $this->db->where("user_username", $username)->get("users")->row();
        print_r($result->hash);
    }

    public function sendMail()
    {
        $config = array(
            "procotol"  => "smtp",
            "smtp_host" => "ssl://smtp.gmail.com",
            "smtp_port" => "465",
            "smtp_user" => "",
            "smtp_pass" => "",
            "starttls"  => true,
            "charset"   => "utf-8",
            "mailtype"  => "html",
            "wordwrap"  => true,
            "newline"   => "\r\n"
        );

        $this->load->library('email'); 

        $this->email->from("");
        $this->email->to("");
        $this->email->subject("Test Mail");
        $this->email->message("test test mail test abcçğüğşiçİ");

        $this->email->send();

        #$this->getUserDetail("admin");
    }
}
?>