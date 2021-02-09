<?php

class User_Diagnosa_model extends CI_model
{
    public function getGejala(){
        return $this->db->get('t_gejala')->result_array();
    }

    public function getKondisi(){
        return [
            'Tidak' => 0,
            'Tidak yakin' => 0.2,
            'Kurang yakin' => 0.4,
            'Lumayan' => 0.6,
            'Yakin' => 0.8,
            'Sangat yakin' => 1
        ];
    }

    public function diagnosa(){
        $cf = $this->hasil();
        $userdata = $this->session->userdata('userdata');
        if($cf <= 0.4)
            $hasil = ["Dari hasil diagnosa, anda kemungkinan kecil terkena Corona. Infeksi virus Corona dapat dicegah bila Anda memiliki kondisi dan kekebalan tubuh yang baik.
                     Oleh karena itu, terapkan perilaku hidup sehat setiap hari.",1];
        else if($cf > 0.4 & $cf <= 0.7)
            $hasil = ["Dari hasil diagnosa, ada kemungkinan anda tertular virus Corona. Anda disarankan untuk tetap dirumah dan hindari kontak dengan lain secara fisik.
                    Bila muncul gejala demam dan batuk, sebaiknya Anda tetap di rumah dan minum paracetamol untuk menurunkan demam.",2];
        else if($cf > 0.7)
            $hasil = ["Dari hasil diagnosa, anda berkemungkinan sangat tinggi tertular virus Corona. Anda dapat langsung menuju rumah sakit terdekat untuk melakukan test.
                     Atau melakukan Self-Isolation dengan tidak keluar rumah.",3];
        $data = [
            'nama_pasien' => $userdata['nama'],
            'umur' => $userdata['umur'],
            'gender' => $userdata['gender'],
            'nilai' => $cf,
            'tanggal' => date('Y-m-d H:i:s')
        ];
        // $this->db->insert('t_riwayat',$data);
        $data['hasil'] = $hasil;
        return $data;
    }

    public function hasil(){
        $gejala = $this->db->get('t_gejala')->result_array();
        $cf_user = $this->input->post();
        $cf_he = [];
        foreach($gejala as $g_value){
            foreach ($cf_user as $u_key => $u_value){
                if ($u_key == $g_value['kode']){
                    $cf_he[$g_value['kode']] = $g_value['nilai'] * $u_value;
                }
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
}