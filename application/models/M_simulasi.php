<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_simulasi extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }


    public function get_kedatangan()
    {
        $this->db->select('*');
        $this->db->from('tb_kedatangan');
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
    public function reset_tbkedatangan()
    {
        $query = $this->db->truncate('tb_kedatangan');
        return $query;
    }

    public function input_kedatangan($data)
    {
        $this->db->insert('tb_kedatangan', $data);
    }




    public function get_pelayanan()
    {
        $this->db->select('*');
        $this->db->from('tb_pelayanan');
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

    public function reset_tbpelayanan()
    {
        $query = $this->db->truncate('tb_pelayanan');
        return $query;
    }
    public function input_pelayanan($data)
    {

        $this->db->insert('tb_pelayanan', $data);
    }



    public function reset_tbsimulasi()
    {
        $query = $this->db->truncate('tb_simulasi');
        return $query;
    }


    public function input_simulasi($data)
    {
        $this->db->insert('tb_simulasi', $data);
    }


    public function get_simulasi()
    {

        $this->db->select('tb_kedatangan.*,tb_pelayanan.*,tb_simulasi.*')
            ->from('tb_simulasi')
            ->join('tb_kedatangan', 'tb_simulasi.id_kedatangan = tb_kedatangan.id_kedatangan')
            ->join('tb_pelayanan ', 'tb_simulasi.id_pelayanan = tb_pelayanan.id_pelayanan');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }


    public function get_kesimpulan()
    {

        $this->db->select('tb_hasil.*,tb_parameter.*,tb_kesimpulan.*,tb_saran.*')
            ->from('tb_kesimpulan')
            ->join('tb_hasil', 'tb_kesimpulan.id_hasil = tb_hasil.id_hasil')
            ->join('tb_parameter ', 'tb_kesimpulan.id_parameter = tb_parameter.id')
            ->join('tb_saran ', 'tb_kesimpulan.id_saran = tb_saran.id_saran');
        $this->db->order_by('tb_hasil.waktu', 'DESC');

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
    public function input_kesimpulan($data)
    {
        $this->db->insert('tb_kesimpulan', $data);
    }

    public function input_hasil($data)
    {
        $this->db->insert('tb_hasil', $data);
    }
    public function reset_tbhasil()
    {
        $query = $this->db->truncate('tb_hasil');
        return $query;
    }

    public function input_parameter($data)
    {
        $this->db->insert('tb_parameter', $data);
    }
    public function reset_tbparameter()
    {
        $query = $this->db->truncate('tb_parameter');
        return $query;
    }
    public function reset_kesimpulan()
    {
        $query = $this->db->truncate('tb_kesimpulan');
        return $query;
    }
}
