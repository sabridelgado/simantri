<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_detail extends CI_Model
{
  function __construct()
  {
    parent::__construct();
  }

  public function fetch_data()
  {
    $this->db->select('*');
    $this->db->from('sungai a');
    $this->db->join('monitoring b','a.id_sungai=b.id_sungai','LEFT');
    //$this->db->order_by("a.waktu_hujan", "desc");
    //$this->db->group_by("a.id_sungai");
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      foreach ($query->result() as $row) {
        $data[] = $row;
      }
      return $data;
    }
    return false;
  }



  public function get($id)
  {
    $this->db->select('*');
    $this->db->from('monitoring');
    $this->db->where('id_sungai', $id);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      foreach ($query->result() as $row) {
        $data[] = $row;
      }
      return $data;
    }
    return false;
  }

  

  public function input($data)
  {
    $this->db->insert('id_sungai', $data);
  }

  public function edit($data)
  {
    $this->db->update('monitoring', $data, array(
      'id_sungai' => $data['id_sungai']
    ));
  }

  public function delete($id)
  {
    $this->db->delete('id_sungai', array('nama_sungai' => $id));
  }
}
