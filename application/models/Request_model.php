<?php

class Request_model extends CI_Model
{

    public function tampilkanPermintaan()
    {
        return $this->db->get('request_wamil')->result_array();
    }

    public function tambahPermintaan()
    {

        $siswa_xls = $_FILES['filesiswa']['name'];
        if ($siswa_xls) {

            $config['upload_path'] = './uploads';
            $config['allowed_types'] = 'xls|xlsx';
            $config['max_size'] = 2048;
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('filesiswa')) {
                $data = [
                    'nama_sekolah' => htmlspecialchars($this->input->post('nama', true)),
                    'alamat_sekolah' => htmlspecialchars($this->input->post('alamat', true)),
                    'jml_siswa' => htmlspecialchars($this->input->post('jumlah', true)),
                    'kabupaten' => htmlspecialchars($this->input->post('kabupaten', true)),
                    'kecamatan' => htmlspecialchars($this->input->post('kecamatan', true)),
                    'file_siswa' => $this->upload->data('file_name'),
                    'tgl_pengajuan' => date('Y-m-d')
                ];
                $this->db->insert('request_wamil', $data);
            } else {
                $this->upload->display_errors();
            }
        }
    }

    // public function hapusPermintaan($id)
    // {
    //     $this->db->delete('request_wamil', ['id' => $id]);
    // }


    public function getPermintaanById($id)
    {
        return $this->db->get_where('request_wamil', ['id' => $id])->row_array();
    }


    // public function ubahDataPermintaan()
    // {

    //     $data = [
    //         'nama_sekolah' => htmlspecialchars($this->input->post('nama', true)),
    //         'alamat_sekolah' => htmlspecialchars($this->input->post('alamat', true)),
    //         'jml_siswa' => htmlspecialchars($this->input->post('jumlah', true)),
    //         'kabupaten' => htmlspecialchars($this->input->post('kabupaten', true)),
    //         'kecamatan' => htmlspecialchars($this->input->post('kecamatan', true))
    //     ];

    //     $this->db->where('id', $this->input->post('id'));
    //     $this->db->update('request_wamil', $data);
    // }


    public function cariDataPermintaan()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('nama_sekolah', $keyword);
        $this->db->or_like('alamat_sekolah', $keyword);
        $this->db->or_like('jml_siswa', $keyword);
        $this->db->or_like('kabupaten', $keyword);
        $this->db->or_like('kecamatan', $keyword);
        $this->db->or_like('tgl_pengajuan', $keyword);
        return $this->db->get('request_wamil')->result_array();
    }
}
