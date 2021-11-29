<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_rekomendasi extends CI_Model
{
  function __construct()
  {
    parent::__construct();
  }

  public function fetch_data()
  {
    $this->db->select('a.rekomendasi_id,a.nim_mahasiswa,a.nama_mahasiswa,a.judul_skripsi,b.keahlian_nama as topik_skripsi, c.dosen_nama as dosen_pembimbing1,d.dosen_nama as dosen_pembimbing2,e.dosen_nama as dosen_penguji1,f.dosen_nama as dosen_penguji2,g.dosen_nama as dosen_penguji3');
    $this->db->from('rekomendasi_tbl a');
    $this->db->join('keahlian_tbl b', 'a.topik_skripsi=b.keahlian_id', 'LEFT');
    $this->db->join('dosen_tbl c', 'a.dosen_pembimbing1=c.dosen_id', 'LEFT');
    $this->db->join('dosen_tbl d', 'a.dosen_pembimbing2=d.dosen_id', 'LEFT');
    $this->db->join('dosen_tbl e', 'a.dosen_penguji1=e.dosen_id', 'LEFT');
    $this->db->join('dosen_tbl f', 'a.dosen_penguji2=f.dosen_id', 'LEFT');
    $this->db->join('dosen_tbl g', 'a.dosen_penguji3=g.dosen_id', 'LEFT');
    // $this->db->order_by("rekomendasi_id", "asc");
    $this->db->order_by('a.rekomendasi_id', "DESC");
    $this->db->limit(1);
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
    $this->db->from('rekomendasi_tbl a');
    $this->db->join('subkriteria_tbl b', 'a.jabatan=b.subkriteria_id', 'LEFT');
    $this->db->join('subkriteria_tbl c', 'a.pendidikan=b.subkriteria_id', 'LEFT');
    $this->db->join('subkriteria_tbl d', 'a.status=b.subkriteria_id', 'LEFT');
    $this->db->where('a.rekomendasi_id', $id);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      foreach ($query->result() as $row) {
        $data[] = $row;
      }
      return $data;
    }
    return false;
  }

  public function get_perhitungan($id)
  {
    $this->db->select('a.rekomendasi_id,a.rekomendasi_nama,a.jabatan,a.pendidikan,a.status,b.subkriteria_nama as jabatan_nama,b.subkriteria_bobot as jabatan_bobot, c.subkriteria_nama as pendidikan_nama, c.subkriteria_bobot as pendidikan_bobot,d.subkriteria_nama as status_nama,d.subkriteria_bobot as status_bobot');
    $this->db->from('rekomendasi_tbl a');
    $this->db->join('subkriteria_tbl b', 'a.jabatan=b.subkriteria_id', 'LEFT');
    $this->db->join('subkriteria_tbl c', 'a.pendidikan=c.subkriteria_id', 'LEFT');
    $this->db->join('subkriteria_tbl d', 'a.status=d.subkriteria_id', 'LEFT');
    $this->db->where('a.rekomendasi_id', $id);
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
    $this->db->insert('rekomendasi_tbl', $data);
  }

  public function edit($data)
  {
    $this->db->update('rekomendasi_tbl', $data, array(
      'rekomendasi_id' => $data['rekomendasi_id']
    ));
  }

  public function delete($id)
  {
    $this->db->delete('rekomendasi_tbl', array('rekomendasi_id' => $id));
  }
}
