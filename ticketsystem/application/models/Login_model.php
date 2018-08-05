<?php
class Login_model extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
  }

  public function loginDataControl($where = array())
  {
    return $this->db->where($where)->get("users")->row();

  }
}

 ?>
