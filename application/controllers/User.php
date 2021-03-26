<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Kesehatan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'My Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }


    public function edit()
    {
        $data['title'] = 'Edit Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['jurusan'] = ['IPA', 'IPS'];
        $data['jenis_kelamin'] = ['Laki-Laki', 'Perempuan'];
        $this->form_validation->set_rules('name', 'Full Name', 'required|trim');
        $this->form_validation->set_rules('nisn', 'NISN', 'required|trim');
        $this->form_validation->set_rules('kelas', 'Kelas Siswa', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat Siswa', 'required|trim');

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/edit', $data);
            $this->load->view('templates/footer');
        } else {

            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $nisn = $this->input->post('nisn');
            $kelas = $this->input->post('kelas');
            $jurusan = $this->input->post('jurusan');
            $jkel = $this->input->post('jkel');
            $alamat = $this->input->post('alamat');

            // cek jika ada gambar yang akan diupload
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']      = '2048';
                $config['upload_path'] = './assets/img/profile/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $data['user']['image'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->dispay_errors();
                }
            }

            $this->db->set('name', $name);
            $this->db->set('nik', $nisn);
            $this->db->set('kelas', $kelas);
            $this->db->set('jurusan', $jurusan);
            $this->db->set('jkel', $jkel);
            $this->db->set('alamat_siswa', $alamat);

            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your profile has been updated!</div>');
            redirect('user');
        }
    }


    public function changePassword()
    {
        $data['title'] = 'Change Password';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[3]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[3]|matches[new_password1]');

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/changepassword', $data);
            $this->load->view('templates/footer');
        } else {

            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');

            if (!password_verify($current_password, $data['user']['password'])) {

                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong current password!</div>');
                redirect('user/changepassword');
            } else {

                if ($current_password == $new_password) {

                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">New password cannot be the same as current password!</div>');
                    redirect('user/changepassword');
                } else {

                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password changed!</div>');
                    redirect('user/changepassword');
                }
            }
        }
    }


    public function konsul()
    {
        $data['title'] = 'Tanya Guru';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required|trim');


        if ($this->form_validation->run() == false) {
            $data['title'] = 'Tanya Guru';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/v_konsultasi', $data);
            $this->load->view('templates/footer');
        } else {
            $data['konsultasi_siswa'] = $this->Kesehatan_model->tambahKonsultasi();
            $this->session->set_flashdata('pesan', '<div class="alert alert-success">Terima kasih sudah konsultasi, Kamu akan kami hubungi dalam waktu 1X24 Jam</div>');
            redirect('user/konsul');
        }
    }


    public function tambah_cekkes()
    {
        $data['title'] = 'Cek Kesehatan Siswa';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->form_validation->set_rules('first', 'Keterangan', 'required|trim');
        $this->form_validation->set_rules('second', 'Gejala', 'required|trim');
        $this->form_validation->set_rules('third', 'Keterangan', 'required|trim');
        $this->form_validation->set_rules('fourth', 'Gejala', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/v_cek', $data);
            $this->load->view('templates/footer');
        } else {
            $data['cekkes'] = $this->Kesehatan_model->tambahDataCekkes();
            $this->session->set_flashdata('message', '<div class="alert alert-success">Terima kasih sudah cek kesehatan kamu, Kami akan mengumumkan hasil nya lewat Email.</div>');
            redirect('user/tambah_cekkes');
        }
    }

    public function laporan_harian()
    {
        $data['title'] = 'Laporan Harian Protokol Kesehatan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('first', 'First', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/v_laporan', $data);
            $this->load->view('templates/footer');
        } else {
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']      = '2048';
            $config['upload_path'] = './uploads/';

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('gambar')) {
                echo $this->upload->display_errors();
            } else {

                $data = [
                    'ask_first' => $this->input->post('first'),
                    'id_user' => $this->session->userdata('id_user'),
                    'foto_laporan' => $this->upload->data('file_name')
                ];

                $this->db->insert('laporan', $data);
                $this->session->set_flashdata('message', '<div class="alert alert-success">Data Berhasil di kirim</div>');
                redirect('user/laporan_harian');
            }
        }
    }




    public function pedulisiswa()
    {
        $data['title'] = 'Peduli Siswa dalam melawan Covid-19';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['tbl_kategori_donasi'] = $this->Kesehatan_model->tampilKategoriDonasi();

        $this->form_validation->set_rules('nominal', 'Nominal', 'required|trim');
        $this->form_validation->set_rules('tujuan', 'Tujuan', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/v_peduli_siswa', $data);
            $this->load->view('templates/footer');
        } else {
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']      = '2048';
            $config['upload_path'] = './uploads/';

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('gambar')) {
                echo $this->upload->display_errors();
            } else {
                $data = [
                    'nominal_sumbangan' => $this->input->post('nominal'),
                    'id_kategori_donasi' => $this->input->post('tujuan'),
                    'bukti_donasi' => $this->upload->data('file_name'),
                    'id_user' => $this->session->userdata('id_user')
                ];
                $this->db->insert('tbl_donatur', $data);
                $this->session->set_flashdata('message', '<div class="alert alert-success">Data Berhasil di kirim</div>');
                redirect('user/pedulisiswa');
            }
        }
    }


    public function rujukan()
    {
        $data['title'] = 'Data Rumah Sakit Rujukan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['tbl_rs'] = $this->Kesehatan_model->tampilDataRs();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/v_rs', $data);
        $this->load->view('templates/footer', $data);
    }

    public function requestrelawan()
    {
        $data['title'] = 'Pengajuan Relawan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/v_addrelawan', $data);
            $this->load->view('templates/footer');
        } else {
            $config['allowed_types'] = 'pdf';
            $config['max_size']      = '2048';
            $config['upload_path'] = './uploads/';

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('modul')) {
                echo $this->upload->display_errors();
            } else {
                $data = [
                    'file_relawan' => $this->upload->data('file_name'),
                    'id_user' => $this->session->userdata('id_user')
                ];
                $this->db->insert('tbl_relawan', $data);
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data berhasil ditambah
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>');
                redirect('user/requestrelawan');
            }
        }
    }
}
