<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_monitoring extends CI_Model
{
  function __construct()
  {
    parent::__construct();
  }

  public function fetch_data()
  {
    $this->db->select('*');
    $this->db->from('monitoring a');
    $this->db->join('sungai b', 'a.id_sungai=b.id_sungai', 'LEFT');
    $this->db->order_by("a.waktu_hujan", "desc");
    $this->db->group_by("b.id_sungai");
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      foreach ($query->result() as $row) {
        $data[] = $row;
      }
      return $data;
    }
    return false;
  }

  public function datasungai()
  {
  }


  public function get_last()
  {
    $this->db->select('*');
    $this->db->from('sungai');
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

  public function get($id)
  {
    $this->db->select('*');
    $this->db->from('monitoring a');
    $this->db->join('sungai b', 'a.id_sungai=b.id_sungai', 'LEFT');
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

  public function gett($id)
  {
    $this->db->select('*');
    $this->db->from('monitoring a');
    $this->db->join('detail b', 'a.id_sungai=b.id_sungai', 'LEFT');
    $this->db->where('a.id_sungai', $id);
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
    $this->db->insert('monitoring', $data);
  }

  public function input_batch($data)
  {
    $this->db->insert_batch('monitoring', $data);
  }

  public function edit($data)
  {
    $this->db->update('monitoring', $data, array(
      'id_sungai' => $data['id_sungai']
    ));
  }

  public function delete($id)
  {
    $this->db->delete('monitoring', array('id_sungai' => $id));
  }
}
