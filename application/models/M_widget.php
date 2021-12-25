<?php
defined('BASEPATH') or exit('No direct script access allowed');
class m_widget extends CI_Model
{
  function __construct()
  {
    parent::__construct();
    $this->load->database();
  }


  public function total_group()
  {
    $query  = $this->db->query("SELECT * FROM group_tbl");
    return $query->num_rows();
  }
  public function total_user()
  {
    $query  = $this->db->query("SELECT * FROM user_tbl");
    return $query->num_rows();
  }
  public function total_nasabah()
  {
    $query  = $this->db->query("SELECT * FROM tb_kedatangan");
    return $query->num_rows();
  }

  public function update_data($data)
  {
    $this->db->update('tb_parameter', $data, array('id' => 1));
  }

  public function get_hasil()
  {
    $this->db->select('*');
    $this->db->from('tb_hasil');
    //$this->db->where('b.id_sungai', $id);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      foreach ($query->result() as $row) {
        $data[] = $row;
      }
      return $data;
    }
    return false;
  }
  public function get_parameter()
  {
    $this->db->select('*');
    $this->db->from('tb_parameter');
    //$this->db->where('b.id_sungai', $id);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      foreach ($query->result() as $row) {
        $data[] = $row;
      }
      return $data;
    }
    return false;
  }


  function __destruct()
  {
    $this->db->close();
  }
}
