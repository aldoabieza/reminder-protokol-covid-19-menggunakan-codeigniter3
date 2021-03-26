<?php

class Siswa_model extends CI_Model
{
    public function tampilkanSiswa()
    {
        return $this->db->get('data_siswa')->result_array();
    }


    public function showAllSiswa($limit, $start)
    {
        return $this->db->get('data_siswa', $limit, $start)->result_array();
    }

    public function countAllSiswa()
    {
        return $this->db->get('data_siswa')->num_rows();
    }




    public function hapusSiswa($id)
    {
        $this->db->delete('data_siswa', ['id' => $id]);
    }


    public function getSiswaById($id)
    {
        return $this->db->get_where('data_siswa', ['id' => $id])->row_array();
    }


    public function ubahDataSiswa()
    {

        $data = [
            'nama_siswa' => $this->input->post('namasiswa', true),
            'tanggal_lahir' => $this->input->post('tgllahir', true),
            'jenis_kelamin' => $this->input->post('jkel', true),
            'alamat' => $this->input->post('alamat', true),
            'jurusan' => $this->input->post('jurusan', true),
            'asal_sekolah' => $this->input->post('asalsekolah', true)
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('data_siswa', $data);
    }


    public function cariDataSiswa()
    {
        $keyword = $this->input->post('keyword');
        $this->db->like('nama_siswa', $keyword);
        $this->db->or_like('tanggal_lahir', $keyword);
        $this->db->or_like('jenis_kelamin', $keyword);
        $this->db->or_like('alamat', $keyword);
        $this->db->or_like('jurusan', $keyword);
        $this->db->or_like('asal_sekolah', $keyword);
        return $this->db->get('data_siswa')->result_array();
    }


    public function import_data($datasiswa)
    {
        $jumlah = count($datasiswa);
        // var_dump($jumlah);
        // die;
        if ($jumlah > 0) {
            $this->db->replace('data_siswa', $datasiswa);
        }
    }
}
