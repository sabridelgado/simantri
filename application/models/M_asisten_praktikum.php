<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_asisten_praktikum extends CI_Model {
  function __construct() {
    parent::__construct();
  }
  
  public function fetch_data() {
    $this->db->select('*');
    $this->db->from('asisten_praktikum_tbl');
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      foreach ($query->result() as $row) {
        $data[] = $row;
      }
      return $data;
    }
    return false;
  }

  public function fetch_data_pertahunajaran($tahun_ajaran)
  {
    $this->db->select('*');
    $this->db->from('asisten_praktikum_tbl a');
    $this->db->join('tahun_ajaran_tbl b', 'a.tahun_ajaran_id=b.tahun_ajaran_id', 'LEFT');
    $this->db->join('relasi_dosen_mk_tbl i', 'a.matakuliah_id=i.matakuliah_id', 'LEFT');
    $this->db->join('dosen_tbl j', 'i.dosen_id=j.dosen_id', 'LEFT');
    $this->db->where('b.tahun_ajaran_id', $tahun_ajaran);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      foreach ($query->result() as $row) {
        $data[] = $row;
      }
      return $data;
    }
    return false;
  }

  public function fetch_data_perdosen($id,$tahun_ajaran) {
    $this->db->select('*');
    $this->db->from('asisten_praktikum_tbl a');
    $this->db->join('tahun_ajaran_tbl b', 'a.tahun_ajaran_id=b.tahun_ajaran_id', 'LEFT');
    $this->db->join('relasi_dosen_mk_tbl i', 'a.matakuliah_id=i.matakuliah_id', 'LEFT');
    $this->db->join('dosen_tbl j', 'i.dosen_id=j.dosen_id', 'LEFT');
    $this->db->where('j.nip', $id);
    $this->db->where('b.tahun_ajaran_id', $tahun_ajaran);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      foreach ($query->result() as $row) {
        $data[] = $row;
      }
      return $data;
    }
    return false;
  }

  public function fetch_data_perdosen_permatakuliah($id,$matakuliah_id)
  {
    $this->db->select('*');
    $this->db->from('asisten_praktikum_tbl a');
    $this->db->join('relasi_dosen_mk_tbl i', 'a.matakuliah_id=i.matakuliah_id', 'LEFT');
    $this->db->join('dosen_tbl j', 'i.dosen_id=j.dosen_id', 'LEFT');
    $this->db->where('j.nip', $id);
    $this->db->where('i.matakuliah_id', $matakuliah_id);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      foreach ($query->result() as $row) {
        $data[] = $row;
      }
      return $data;
    }
    return false;
  }

  public function fetch_data_perdosen_permatakuliah_pertahunajaran($id,$matakuliah_id,$tahun_ajaran)
  {
    $this->db->select('*');
    $this->db->from('asisten_praktikum_tbl a');
    $this->db->join('tahun_ajaran_tbl b', 'a.tahun_ajaran_id=b.tahun_ajaran_id', 'LEFT');
    $this->db->join('relasi_dosen_mk_tbl i', 'a.matakuliah_id=i.matakuliah_id', 'LEFT');
    $this->db->join('dosen_tbl j', 'i.dosen_id=j.dosen_id', 'LEFT');
    $this->db->where('j.nip', $id);
    $this->db->where('i.matakuliah_id', $matakuliah_id);
    $this->db->where('b.tahun_ajaran_id', $tahun_ajaran);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      foreach ($query->result() as $row) {
        $data[] = $row;
      }
      return $data;
    }
    return false;
  }

  public function fetch_data_permatakuliah_pertahunajaran($matakuliah_id,$tahun_ajaran)
  {
    $this->db->select('*');
    $this->db->from('asisten_praktikum_tbl a');
    $this->db->join('tahun_ajaran_tbl b', 'a.tahun_ajaran_id=b.tahun_ajaran_id', 'LEFT');
    $this->db->join('relasi_dosen_mk_tbl i', 'a.matakuliah_id=i.matakuliah_id', 'LEFT');
    $this->db->join('dosen_tbl j', 'i.dosen_id=j.dosen_id', 'LEFT');
    $this->db->where('i.matakuliah_id', $matakuliah_id);
    $this->db->where('b.tahun_ajaran_id', $tahun_ajaran);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      foreach ($query->result() as $row) {
        $data[] = $row;
      }
      return $data;
    }
    return false;
  }

  public function fetch_data_permatakuliah($matakuliah_id)
  {
    $this->db->select('*');
    $this->db->from('asisten_praktikum_tbl a');
    $this->db->join('relasi_dosen_mk_tbl i', 'a.matakuliah_id=i.matakuliah_id', 'LEFT');
    $this->db->join('dosen_tbl j', 'i.dosen_id=j.dosen_id', 'LEFT');
    $this->db->where('i.matakuliah_id', $matakuliah_id);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      foreach ($query->result() as $row) {
        $data[] = $row;
      }
      return $data;
    }
    return false;
  }

  public function get($id) {
    $this->db->select('*');
    $this->db->from('asisten_praktikum_tbl');
    $this->db->where('asisten_praktikum_id', $id);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      foreach ($query->result() as $row) {
        $data[] = $row;
      }
      return $data;
    }
    return false;
  }
  
  public function input($data) {
    $this->db->insert('asisten_praktikum_tbl', $data);
  }
  
  public function edit($data) {
    $this->db->update('asisten_praktikum_tbl', $data, array(
      'asisten_praktikum_id' => $data['asisten_praktikum_id']
    ));
  }
  
  public function delete($id) {
    $this->db->delete('asisten_praktikum_tbl', array('asisten_praktikum_id' => $id));
  }  
}
?>
