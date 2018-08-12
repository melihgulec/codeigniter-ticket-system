<?php
class Reply_model extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
  }

  public function getTicket($where = array())
  {
    $this->db->select('tickets.id AS ticket_id, tickets.attachments, users.user_auth, categories.categorie, products.product_name, users.user_username, tickets.ticket_title, tickets.ticket_exp, tickets.ticket_date');
    $this->db->from('tickets');
    $this->db->where($where);
    $this->db->join('users', 'users.id = tickets.user_id', "INNER");
    $this->db->join('products', 'products.id = tickets.product_id', "INNER");
    $this->db->join('categories', 'categories.id = tickets.categorie_id', "INNER");
    return $this->db->get()->row();
  }

  public function getReplys($where)
  {
    $this->db->select("tickets_reply.attachments, users.user_name, users.user_auth, tickets_reply.reply_exp, users.user_username, tickets.ticket_date, tickets_reply.reply_date");
    $this->db->from('tickets_reply');
    $this->db->where($where);
    $this->db->join('users', 'users.id = tickets_reply.user_id', "INNER");
    $this->db->join('tickets', 'tickets.id = tickets_reply.ticket_id', "INNER");
    return $this->db->get()->result();
  }

  public function replyInsert($data)
  {
    $ticket_status  = ($this->session->userdata("user_auth") == '1' ? "1" : "0");
    $update = array(
      "ticket_status" => $ticket_status
    );

    $this->db->where("id", $this->session->userdata("last-ticket-id"));
    $this->db->update('tickets', $update);

    return $this->db->insert("tickets_reply", $data);
  }
}
?>
