<?php

class Konsultasi_model extends CI_model
{
    function getKondisi()
    {
        //simulasi pengambilan data dari tabel pada db
        return array(
            "0" => "Tidak Mengalami",
            "0.2" => "Tidak Yakin",
            "0.4" => "Kurang Yakin",
            "0.6" => "Lumayan",
            "0.8" => "Yakin",
            "1.0" => "Sangat Yakin"
        );
    }
    public function getGejala()
    {
        $this->db->select('*');
        $this->db->from('t_gejala');
        return $this->db->get()->result();
    }

    public function getUserGejala(){
        $cf_user = $this->input->post();
        foreach ($cf_user as $key => $value) {
            if ($value == 0)
                unset($cf_user[$key]);
        }
        $gejala = $this->db->get('t_gejala')->result_array();
        foreach ($gejala as $value) if (array_key_exists($value['kode'], $cf_user)) {
            if ($cf_user[$value['kode']] == 0.2) {
                $kondisi = "Tidak Yakin";
            } else if ($cf_user[$value['kode']] == 0.4) {
                $kondisi = "Kurang Yakin";
            } else if ($cf_user[$value['kode']] == 0.6) {
                $kondisi = "Lumayan";
            } else if ($cf_user[$value['kode']] == 0.8) {
                $kondisi = "Yakin";
            } else if ($cf_user[$value['kode']] == 1.0) {
                $kondisi = "Sangat Yakin";
            }
            $result[] = [
                'kode' => $value['kode'],
                'gejala' => $value['gejala'],
                'kondisi' => $kondisi
            ];
        }
        return $result;
    }

    public function diagnosa()
    {
        $cf = $this->hasil();
        $result = [];
        if($cf <= 0.4)
            $hasil = ["Dari hasil diagnosa, anda kemungkinan kecil terkena Corona. Infeksi virus Corona dapat dicegah bila Anda memiliki kondisi dan kekebalan tubuh yang baik.
                     Oleh karena itu, terapkan perilaku hidup sehat setiap hari.",1];
        else if($cf > 0.4 & $cf <= 0.7)
            $hasil = ["Dari hasil diagnosa, ada kemungkinan anda tertular virus Corona. Anda disarankan untuk tetap dirumah dan hindari kontak dengan lain secara fisik.
                    Bila muncul gejala demam dan batuk, sebaiknya Anda tetap di rumah dan minum paracetamol untuk menurunkan demam.",2];
        else if($cf > 0.7)
            $hasil = ["Dari hasil diagnosa, anda berkemungkinan sangat tinggi tertular virus Corona. Anda dapat langsung menuju rumah sakit terdekat untuk melakukan test.
                     Atau melakukan Self-Isolation dengan tidak keluar rumah.",3];
        $userdata = $this->session->userdata('userdata');
        $result = [
            'nama_pasien' => $userdata['nama'],
            'umur' => $userdata['umur'],
            'gender' => $userdata['gender'],
            'nilai' => $cf,
            'hasil' => $hasil,
            'tanggal' => date('Y-m-d H:i:s')
        ];
        return $result;
    }

    public function hasil(){
        $gejala = $this->db->get('t_gejala')->result_array();
        $cf_user = $this->input->post();
        $cf_he = [];
        foreach($gejala as $g_value){
            foreach ($cf_user as $u_key => $u_value) if ($u_key == $g_value['kode']) {
                $cf_he[$g_value['kode']] = $g_value['nilai'] * $u_value;
            }
        }
        $cf_final = '';
        $i = 0;
        foreach($cf_he as $value){
            if($i==0){
                $cf_final = $value;
                $i++;
            } else {
                $cf_final = round($value + $cf_final * (1 - $value), 3);
            }
        }

        return $cf_final;
    }

    public function simpan()
    {
        $this->db->insert('t_riwayat', $this->input->post());
    }
}
