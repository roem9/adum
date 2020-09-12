<?php
class Peserta extends CI_CONTROLLER{
    public function __construct(){
        parent::__construct();
        $this->load->model('Peserta_model');
        $this->load->model('Main_model');
        ini_set('xdebug.var_display_max_depth', '10');
        ini_set('xdebug.var_display_max_children', '256');
        ini_set('xdebug.var_display_max_data', '1024');
        if($this->session->userdata('status') != "login"){
            $this->session->set_flashdata('login', 'Maaf, Anda harus login terlebih dahulu');
			redirect(base_url("login"));
		}
    }

    public function reguler(){
        $data['title'] = 'Peserta Reguler Aktif';
        $data['peserta'] = $this->Main_model->get_all("peserta_reguler", ["status" => "aktif"], "nama_peserta", "ASC");


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('peserta/peserta_reguler', $data);
        $this->load->view('templates/footer');
    }

    // get
        public function get_detail_peserta(){
            $data = $this->Peserta_model->get_detail_peserta();
            echo json_encode($data);
        }
    // get

    // laporan
        public function download(){
            header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
            header('Content-Disposition: attachment;filename="Laporan Kelas Reguler.xls"');
            $data['title'] = "Data Kelas Reguler";
            $kelas = $this->Main_model->get_all("kelas_reguler", ["status" => "aktif"]);
            foreach ($kelas as $i => $kelas) {
                    $data['kelas'][$i]['kelas'] = $kelas;
                    $peserta = $this->Main_model->get_all("peserta", ["id_kelas" => $kelas['id_kelas'], "status" => "aktif"]);
                    $data['kelas'][$i]["peserta"] = [];
                    foreach ($peserta as $j => $peserta) {
                        $data['kelas'][$i]["peserta"][$j]["peserta"] = $peserta;
                        $alamat = $this->Main_model->get_one("alamat", ["id_peserta" => $peserta['id_peserta']]);
                        $data['kelas'][$i]["peserta"][$j]['alamat'] = $alamat;
                        $ortu = $this->Main_model->get_one("ortu", ["id_peserta" => $peserta['id_peserta']]);
                        $data['kelas'][$i]["peserta"][$j]['ortu'] = $ortu;
                        $pekerjaan = $this->Main_model->get_one("pekerjaan", ["id_peserta" => $peserta['id_peserta']]);
                        $data['kelas'][$i]["peserta"][$j]['pekerjaan'] = $pekerjaan;
                        $kelas = $this->Main_model->get_one("kelas", ["id_kelas" => $peserta['id_kelas']]);
                    }
            }
            
            $this->load->view("peserta/download", $data);
        }

        public function downloads(){
            // header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
            // header('Content-Disposition: attachment;filename="Laporan Peserta Reguler '.$name.'.xls"');
            $data['title'] = "Data Peserta Reguler";
            $peserta = $this->Main_model->get_all("peserta", ["status" => "aktif", "tipe_peserta" => "reguler"]);
            foreach ($peserta as $i => $peserta) {
                if($i <= 5){
                    $data["peserta"][$i]["peserta"] = $peserta;
                    $alamat = $this->Main_model->get_one("alamat", ["id_peserta" => $peserta['id_peserta']]);
                    $data["peserta"][$i]['alamat'] = $alamat;
                    $ortu = $this->Main_model->get_one("ortu", ["id_peserta" => $peserta['id_peserta']]);
                    $data["peserta"][$i]['ortu'] = $ortu;
                    $pekerjaan = $this->Main_model->get_one("pekerjaan", ["id_peserta" => $peserta['id_peserta']]);
                    $data["peserta"][$i]['pekerjaan'] = $pekerjaan;
                    $kelas = $this->Main_model->get_one("kelas", ["id_kelas" => $peserta['id_kelas']]);
                    $data["peserta"][$i]['kelas'] = $kelas;
                    $jadwal = $this->Main_model->get_one("jadwal", ["id_kelas" => $peserta['id_kelas']]);
                    $data["peserta"][$i]['jadwal'] = $jadwal;
                    $kpq = $this->Main_model->get_one("kpq", ["nip" => $kelas['nip']]);
                    $data['peserta'][$i]['kpq'] = $kpq;
                }
            }

            // var_dump($data);
            // exit();
            $this->load->view("peserta/download", $data);
        }
    // laporan
}