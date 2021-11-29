<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kedatangan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model("m_simulasi");
        $this->load->model('m_user');
        $this->load->model('m_group');
        $this->load->model("m_setting");
        $this->load->model("m_widget");
        #Check user login or not
        if (!($this->session->userdata('user_id'))) {
            $this->session->set_flashdata('login', 'Maaf Anda Tidak Mempunyai Hak Akses Untuk Menu User!');
            redirect('home');
        }
    }

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */

    public function index()
    {

        $query = $this->m_simulasi->get_kedatangan();
        $data['s_kedatangan'] = $query;
        $data['nama'] = "Simulasi " . $this->uri->segment(1);

        //=========================================
        $setting['settings_app'] = $this->m_setting->fetch_setting();
        $data["user"]         = $this->m_user->fetch_data();
        $data["group"]        = $this->m_group->fetch_data();
        //----------------------------//

        $this->load->view("attribute/header", $setting);
        $this->load->view("attribute/menus", $setting);
        $this->load->view('admin/master_data/simulasi/simulasi_kedatangan', $data);
        $this->load->view("attribute/footer", $setting);
    }

    public function simulasi_kedatangan()
    {

        //validasi inputan
        $this->form_validation->set_rules('lamda', 'Lamda', 'required|trim');
        $this->form_validation->set_rules('durasi', 'Durasi', 'required|trim');

        $lamda = $this->input->post('lamda');
        $jam = $this->input->post('durasi');


        //==========================================//
        //membuat Variabel

        $durasi = $jam * 3600;

        $konter = 0;

        $kedatangan = 0;

        $TinterKdt = 0;

        $WaktuKdt = 0;

        $AcakInter = 0;

        $InterKdt = 0;

        $InterWaktuKdt = 0;
        //==========================================//

        //kondisi validasi
        if ($this->form_validation->run() == false) {

            $data['jumlah'][] = [
                $kedatangan,
                $AcakInter,
                $InterWaktuKdt,
                $WaktuKdt,
                $durasi,
                $konter

            ];



            $data['nama'] = $this->uri->segment(2);

            //=========================================
            $setting['settings_app'] = $this->m_setting->fetch_setting();
            $data["user"]         = $this->m_user->fetch_data();
            $data["group"]        = $this->m_group->fetch_data();
            //----------------------------//

            $this->load->view("attribute/header", $setting);
            $this->load->view("attribute/menus", $setting);
            $this->load->view('admin/master_data/simulasi/simulasi_kedatangan', $data);
            $this->load->view("attribute/footer", $setting);
        } else {

            //perulangan kedatangan nasabah
            $this->m_simulasi->reset_tbkedatangan();
            $this->m_simulasi->reset_tbpelayanan();
            $this->m_simulasi->reset_tbsimulasi();


            //rumus mendcari kedatangan nasabah
            while ($konter <= $durasi) {


                $kedatangan = $kedatangan + 1;
                if ($kedatangan == 1) {

                    $AcakinterKdt = 0;
                    $InterWaktuKdt = 0;
                } else {

                    //bangkitkan bilangan acak
                    $AcakInter = rand(0.1 * 1000, 0.9 * 1000) / 1000;
                    //hitung waktu antar kedatangan
                    $InterKdt = round(abs((1 / $lamda) * log10($AcakInter)), 5);

                    //hitung waktu kedatangan
                    $TinterKdt = round($TinterKdt + $InterKdt, 5);

                    $InterWaktuKdt = $InterKdt * 3600 * $jam;

                    $WaktuKdt = $TinterKdt * 3600 * $jam;

                    $konter = round($WaktuKdt);
                    //hitung konter

                }

                //  masukan kedalam database
                $result = [
                    'durasi' => $jam,
                    'bil_acak' => $AcakInter,
                    'i_waktu_kedatangan' => $InterKdt,
                    'w_kedatangan' => $TinterKdt,
                    'iwk_waktu' => $InterWaktuKdt,
                    'wk_waktu' => $WaktuKdt
                ];
                $simulasi = [

                    'id_kedatangan' => $kedatangan,
                    'id_pelayanan' => $kedatangan
                ];

                $parameter['p_lamda'] = $lamda;

                $this->m_widget->update_data($parameter);


                $this->m_simulasi->input_kedatangan($result);
                $this->m_simulasi->input_simulasi($simulasi);
            }

            $data["data"][] = [$AcakInter];

            $data['s_kedatangan'] = $this->m_simulasi->get_kedatangan();


            $data['lamda'] = $lamda;
            $data['durasi'] = $jam;

            $data['nama1'] = $this->uri->segment(1);
            $data['nama'] = $this->uri->segment(2);
            //=========================================
            $setting['settings_app'] = $this->m_setting->fetch_setting();
            $data["user"]         = $this->m_user->fetch_data();
            $data["group"]        = $this->m_group->fetch_data();
            //=========================================//
            $this->load->view("attribute/header", $setting);
            $this->load->view("attribute/menus", $setting);
            $this->load->view('admin/master_data/simulasi/simulasi_kedatangan', $data);
            $this->load->view("attribute/footer", $setting);
        }
    }
    public function resetdata()
    {
        $this->db->truncate('tb_kedatangan');
        $this->db->truncate('tb_pelayanan');
        $this->db->truncate('tb_hasil');
        redirect('kedatangan');
    }
}
