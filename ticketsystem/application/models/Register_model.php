<?php
class Register_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function userInsert($data = array())
    {
        $this->db->insert("users", $data);
    }

    public function usernameCheck($username, $email)
    {
        $query = $this->db->query("SELECT id FROM users WHERE user_username = '$username' OR user_email = '$email'");

        if($query->num_rows() > 0)
        {
            return 1;
        }
        else{
            return 0;
        }
    }
}

?>