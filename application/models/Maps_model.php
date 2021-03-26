<?php



class Maps_model extends CI_Model
{

    public function tampilkanPermintaan()
    {
        return $this->db->get('lokasi')->result_array();
    }


    public function tambahPermintaan()
    {
        //Jika berhasil
        //Siapkan data dalam bentuk array seperti dibawah
        $data = [
            'nama_lokasi' => $this->input->post('nama', true),
            'alamat_lokasi' => $this->input->post('alamat', true),
            'lat' => $this->input->post('Latitude', true),
            'lng' => $this->input->post('Longitude', true)
        ];
        $this->db->insert('lokasi', $data);
    }

    public function hapusPermintaan($id)
    {
        $this->db->delete('lokasi', ['id_lokasi' => $id]);
    }


    public function getPermintaanById($id)
    {
        return $this->db->get_where('lokasi', ['id_lokasi' => $id])->row_array();
    }


    public function ubahDataPermintaan()
    {

        $data = [
            'nama_lokasi' => $this->input->post('nama', true),
            'alamat_lokasi' => $this->input->post('alamat', true),
            'lat' => $this->input->post('Latitude', true),
            'lng' => $this->input->post('Longitude', true)
        ];

        $this->db->where('id_lokasi', $this->input->post('id'));
        $this->db->update('lokasi', $data);
    }


    public function cariDataPermintaan()
    {
        $keyword = $this->input->post('keyword');
        $this->db->like('nama_sekolah', $keyword);
        $this->db->or_like('alamat_sekolah', $keyword);
        $this->db->or_like('jml_siswa', $keyword);
        $this->db->or_like('no_telepon', $keyword);
        $this->db->or_like('status', $keyword);
        return $this->db->get('sekolah')->result_array();
    }


    public function lokasi()
    {
        $data['title'] = 'Map Monitoring Siwamil';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['lokasi'] = $this->Maps_model->tampilkanPermintaan();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/location', $data);
        $this->load->view('templates/footer', $data);
    }
}
