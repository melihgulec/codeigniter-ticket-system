<?php
class Ticket_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
  }


  public function get_categories()
  {
    return $this->db->get("categories")->result();
  }

  public function get_products()
  {
    return $this->db->get("products")->result();
  }

  public function ticket_insert($data = array())
  {
     return $this->db->insert("tickets", $data);
  }

}
?>
