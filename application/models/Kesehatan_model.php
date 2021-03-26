<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kesehatan_model extends CI_Model
{

    public function tampilDataKonsul()
    {
        $this->db->select('*');
        $this->db->from('konsultasi_siswa');
        $this->db->join('user', 'user.id_user = konsultasi_siswa.id_user');
        return $this->db->get()->result();
    }

    public function tambahKonsultasi()
    {
        $data = [
            'keterangan_konsul' => $this->input->post('keterangan', true),
            'tanggal_konsul' => date('Y-m-d'),
            'id_user' => $this->session->userdata('id_user')
        ];
        $this->db->insert('konsultasi_siswa', $data);
    }

    public function getKonsultasiById($id)
    {
        return $this->db->get_where('konsultasi_siswa', ['id' => $id])->row_array();
    }


    public function hapusKonsul($id)
    {
        $this->db->delete('konsultasi_siswa', ['id' => $id]);
    }


    public function getLaporanById($id)
    {
        return $this->db->get_where('laporan', ['id_laporan' => $id])->row_array();
    }

    public function hapusLaporan($id)
    {
        $this->db->delete('laporan', ['id_laporan' => $id]);
    }

    /**
     * 
     * 
     * Model Reminder Email
     * 
     * 
     */

    public function tampilDataUser()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('role_id', 2);
        return $this->db->get()->result();
    }

    public function getUserById($id)
    {
        return $this->db->get_where('user', ['id_user' => $id])->row_array();
    }


    /*
    
    
        Model Berita
    
    
    */


    public function tampilDataBerita()
    {
        $this->db->select('*');
        $this->db->from('tbl_berita');
        $this->db->join('user', 'user.id_user = tbl_berita.id_user');
        return $this->db->get()->result();
    }


    public function getBeritaById($id)
    {
        return $this->db->get_where('tbl_berita', ['id_berita' => $id])->row_array();
    }

    public function hapusBerita($id)
    {
        $this->db->delete('tbl_berita', ['id_berita' => $id]);
    }

    public function ubahDataBerita()
    {
        $id = $this->input->post('id');
        $data = [
            'judul_berita' => $this->input->post('judul', true),
            'gambar_berita' => $this->upload->data('file_name'),
            'tgl_berita' => date('Y-m-d'),
            'isi_berita' => $this->input->post('isi', true),
            'id_user' => $this->session->userdata('id_user')
        ];
        $this->db->where('id_berita', $id);
        $this->db->update('tbl_berita', $data);
    }



    /**
     * 
     * 
     * 
     * Model Modul Prokol Kesehatan
     * 
     * 
     * 
     */

    public function tampilDataModul()
    {
        return $this->db->get('modul')->result_array();
    }

    public function getModulById($id)
    {
        return $this->db->get_where('modul', ['id_modul' => $id])->row_array();
    }

    public function hapusModul($id)
    {
        $this->db->delete('modul', ['id_modul' => $id]);
    }




    /**
     * 
     * 
     * Model Gejala
     * 
     * 
     */

    public function tampilkanGejala()
    {
        return $this->db->get('gejala')->result_array();
    }


    /**
     * 
     * 
     * Model Laporan Siswa
     * 
     * 
     */


    public function tampilDataLaporan()
    {
        $this->db->select('*');
        $this->db->from('laporan');
        $this->db->join('user', 'user.id_user = laporan.id_user');
        return $this->db->get()->result();
    }





    /**
     * 
     * 
     * Model Data Rumah Sakit Rujukan
     * 
     * 
     */


    public function tampilDataRs()
    {
        return $this->db->get('tbl_rs')->result_array();
    }

    public function getRsById($id)
    {
        return $this->db->get_where('tbl_rs', ['id_rs' => $id])->row_array();
    }

    public function editDataRs()
    {
        $id = $this->input->post('id');
        $data = [
            "nama_rs" => $this->input->post('nama', true),
            "alamat_rs" => $this->input->post('alamat', true),
            "wilayah_rs" => $this->input->post('wilayah', true),
            "no_telepon" => $this->input->post('notelp', true),
            "provinsi_rs" => $this->input->post('provinsi', true)
        ];
        $this->db->where('id_rs', $id);
        $this->db->update('tbl_rs', $data);
    }



    public function addDataRs()
    {
        $data = [
            "nama_rs" => $this->input->post('nama', true),
            "alamat_rs" => $this->input->post('alamat', true),
            "wilayah_rs" => $this->input->post('wilayah', true),
            "no_telepon" => $this->input->post('notelp', true),
            "provinsi_rs" => $this->input->post('provinsi', true),
            "id_user" => $this->session->userdata('id_user')
        ];

        $this->db->insert('tbl_rs', $data);
    }

    public function hapusRs($id)
    {
        $this->db->delete('tbl_rs', ['id_rs' => $id]);
    }











    /**
     * 
     * 
     * 
     * Model Manipulasi Donasi
     * 
     * 
     */


    public function tampilKategoriDonasi()
    {
        return $this->db->get('tbl_kategori_donasi')->result_array();
    }

    public function getDataDonatur()
    {
        $this->db->select('*');
        $this->db->from('tbl_donatur');
        $this->db->join('tbl_kategori_donasi', 'tbl_donatur.id_kategori_donasi = tbl_kategori_donasi.id_kategori_donasi', 'LEFT');
        $this->db->join('user', 'tbl_donatur.id_user = user.id_user', 'LEFT');
        return $this->db->get()->result();
    }

    public function getDonaturById($id)
    {
        // return $this->db->get_where('tbl_donatur', ['id_donatur' => $id])->row_array();
        $this->db->select('*');
        $this->db->from('tbl_donatur');
        $this->db->join('tbl_kategori_donasi', 'tbl_donatur.id_kategori_donasi = tbl_kategori_donasi.id_kategori_donasi', 'LEFT');
        $this->db->join('user', 'tbl_donatur.id_user = user.id_user', 'LEFT');
        $this->db->where('id_donatur', $id);

        return $this->db->get()->result_array();
    }

    public function ubahDataDonatur()
    {
        $id = $this->input->post('id');
        $data = ['status_donasi' => $this->input->post('status')];
        $this->db->where('id_donatur', $id);
        $this->db->update('tbl_donatur', $data);
    }

    public function tambahDataDonatur()
    {
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']      = '2048';
        $config['upload_path'] = './uploads/';

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('gambar')) {
            echo $this->upload->display_errors();
        } else {
            $data = [
                'nominal_sumbangan' => $this->input->post('nominal'),
                'kategori_donasi' => $this->input->post('tujuan'),
                'id_user' => $this->session->userdata('id_user'),
                'bukti_donasi' => $this->upload->data('file_name')
            ];

            $this->db->insert('tbl_donatur', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success">Data Berhasil di kirim</div>');
            redirect('user/laporan_harian');
        }
    }

    public function hapusDonatur($id)
    {
        $this->db->delete('tbl_kategori_donasi', ['id_kategori_donasi' => $id]);
    }

    public function getDataKategori()
    {
        return $this->db->get('tbl_kategori_donasi')->result_array();
    }

    public function tambahDataTujuan()
    {
        $data = [
            "tujuan_donasi" => $this->input->post('tujuan')
        ];

        $this->db->insert('tbl_kategori_donasi', $data);
    }






    /**
     * 
     * 
     * Model Data Relawan
     * 
     * 
     */
    public function getDataRelawan()
    {
        return $this->db->get('tbl_relawan')->result_array();
    }
}
