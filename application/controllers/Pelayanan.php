<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelayanan extends CI_Controller
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

        if ($query == null) {
            $data['s_kedatangan'] = $query;
            $pesan = 'Tabel Kedatangan Is NULL';

            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger" role="alert">' . $pesan . '</div>'
            );
            redirect('kedatangan');
        }

        $data['s_layan'] = $this->m_simulasi->get_pelayanan();

        //=========================================
        $data['nama'] = $this->uri->segment(1);
        $setting['settings_app'] = $this->m_setting->fetch_setting();
        $data["user"]         = $this->m_user->fetch_data();
        $data["group"]        = $this->m_group->fetch_data();
        //----------------------------//

        $this->load->view("attribute/header", $setting);
        $this->load->view("attribute/menus", $setting);
        $this->load->view('admin/master_data/simulasi/simulasi_pelayanan', $data);
        $this->load->view("attribute/footer", $setting);
    }

    public function simulasi_pelayanan()

    {
        $this->m_simulasi->reset_tbhasil();

        $query = $this->m_simulasi->get_kedatangan();
        //validasi inputan
        $this->form_validation->set_rules('miu', 'miu', 'required|trim');
        $this->form_validation->set_rules('loket', 'loket', 'required|trim');


        if ($query != null) {
            $loket = $this->input->post('loket');
            $HtgSvr = 0;
            $MulaiLyn = 0;
            $nasabah = 0;
            $wq = 0;
            $lq = 0;
            $TWaktuTgu = 0;
            $TWaktuTguLyn = 0;
            $TWaktuTguSys = 0;

            $miu = $this->input->post('miu');

            function hitung($Mlayan, $miu)
            {
                $miu = $miu;
                //bangkitkan bilangan acak
                $AcakInter = rand(0.1 * 100, 0.3 * 100) / 10000;
                //hitung waktu pelayanan
                $Layan = round(abs((1 / $miu) * log10($AcakInter)), 4);

                //hitung waktu layanan
                $SelesaiLyn = round($Mlayan + $Layan, 4);

                $nilai = [
                    $SelesaiLyn, $Layan, $AcakInter
                ];


                return $nilai;
            }


            $waktuselesai = [];
            $WaktuTgu = 0;
            $WaktuTguSys = 0;
            $all = [];



            $this->m_simulasi->reset_tbpelayanan();
            foreach ($query as $q) {
                // kondisi pertama

                if ($q->id_kedatangan > $nasabah) {
                    // kondisi ke dua
                    if ($nasabah < $loket) {

                        $HtgSvr = $nasabah;

                        $WaktuDtg = $q->w_kedatangan;

                        $MulaiLyn = $WaktuDtg;

                        $waktuselesai = hitung($MulaiLyn, $miu);

                        $WaktuTgu = $MulaiLyn - $WaktuDtg;

                        $WaktuTguSys = round($waktuselesai[0] - $WaktuDtg, 4);

                        $all[] = [$waktuselesai[0], $WaktuTgu, $WaktuTguSys, $WaktuDtg, $MulaiLyn];
                    } else {

                        $WaktuDtg = $q->w_kedatangan;
                        $tampungkecil = [];
                        for ($i = 0; $i < count($all); $i++) {
                            $tampungkecil[] = $all[$i][0];
                        }
                        $fixkecil = [];

                        rsort($tampungkecil);
                        for ($i = 0; $i < $loket; $i++) {
                            $fixkecil[] = $tampungkecil[$i];
                        }
                        $kecil = min($fixkecil);

                        if ($WaktuDtg > $kecil) {
                            $MulaiLyn = $WaktuDtg;
                            $waktuselesai = hitung($MulaiLyn, $miu);
                            $WaktuTgu = $MulaiLyn - $WaktuDtg;
                            $WaktuTguSys = round($waktuselesai[0] - $WaktuDtg, 4);
                            $all[] = [$waktuselesai[0], $WaktuTgu, $WaktuTguSys, $WaktuDtg, $MulaiLyn];
                        } else {
                            $MulaiLyn = $kecil;
                            $waktuselesai = hitung($MulaiLyn, $miu);
                            $WaktuTgu = $MulaiLyn - $WaktuDtg;
                            $WaktuTguSys = round($waktuselesai[0] - $WaktuDtg, 4);
                            $all[] = [$waktuselesai[0], $WaktuTgu, $WaktuTguSys, $WaktuDtg, $MulaiLyn];
                        }
                    }

                    $waktu = $q->durasi * 3600;

                    $mulai = $MulaiLyn * $waktu;
                    $layanan = $waktuselesai[1] * $waktu;
                    $s_layanan = $waktuselesai[0] * $waktu;
                    $t_antrian = $WaktuTgu * $waktu;
                    $t_sistem = $WaktuTguSys * $waktu;


                    $resultt = [

                        'bil_acak' => $waktuselesai[2],
                        'w_mulai' => $mulai,
                        'w_layanan' => $layanan,
                        'w_selesai_layanan' => $s_layanan,
                        'w_tunggu_antrian' => $t_antrian,
                        'w_tunggu_sistem' => $t_sistem

                    ];

                    $parameter['p_miu'] = $miu;
                    $parameter['p_loket'] = $loket;

                    $this->m_widget->update_data($parameter);

                    $this->m_simulasi->input_pelayanan($resultt);

                    $TWaktuTgu = $TWaktuTgu + $WaktuTgu;
                    $TWaktuTguLyn = $TWaktuTguLyn + $waktuselesai[1];
                    $TWaktuTguSys = $TWaktuTguSys + $WaktuTguSys;

                    $nasabah++;
                }
            }






            // die;

            $durasim = $q->durasi;
            $wq = round($TWaktuTgu / $nasabah, 4);
            $ws = round($TWaktuTguSys / $nasabah, 4);
            $lq = ceil($TWaktuTgu / $durasim);
            $ls = round($TWaktuTguSys / $durasim, 4);
            $probabilitas = round($TWaktuTguLyn / ($loket * $durasim), 5);

            echo '<pre>';
            print_r($TWaktuTguLyn);
            echo '</pre>';

            echo '<pre>';
            print_r($probabilitas);
            echo '</pre>';

            $uji = [
                'durasi' => $durasim,
                'total_w_tunggu' => $TWaktuTgu,
                'tw_sisitem' => $TWaktuTguSys,
                'total_nasabah' => $nasabah
            ];


            $result = [
                'r_tunggu_antrian' => $wq,
                'r_tunggu_sistem' => $ws,
                'r_nasabah_antrian' => $lq,
                'r_nasabah_sistem' => $ls,
                'probabilitas_teler' => $probabilitas,

            ];

            echo '<pre>';
            print_r($result);
            echo '</pre>';

            echo '<pre>';
            print_r($uji);
            echo '</pre>';

            $this->m_simulasi->input_hasil($result);



            redirect('pelayanan');
        } else {
            $pesan = 'Tabel Kedatangan Is NULL';

            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger" role="alert">' . $pesan . '</div>'
            );
            redirect('kedatangan');
        }
    }





    public function resetdata()
    {

        $this->db->truncate('tb_pelayanan');
        $this->db->truncate('tb_hasil');
        $this->db->truncate('tb_parameter');
        redirect('pelayanan');
    }
}
