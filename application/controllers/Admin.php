<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once APPPATH . 'third_party/Spout/Autoloader/autoload.php';

use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->helper('download');
        $this->load->library('form_validation');
        $this->load->model('Maps_model');
        $this->load->model('Kesehatan_model');
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }


    public function role()
    {
        $data['title'] = 'Role';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get('user_role')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role', $data);
        $this->load->view('templates/footer');
    }


    public function roleAccess($role_id)
    {
        $data['title'] = 'Role Access';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();

        $this->db->where('id !=', 1);
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role-access', $data);
        $this->load->view('templates/footer');
    }


    public function changeAccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];

        $result = $this->db->get_where('user_access_menu', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Access Changed!</div>');
    }



    public function profileadmin()
    {
        $data['title'] = 'Profile Admin';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/profileadmin', $data);
        $this->load->view('templates/footer');
    }


    public function editprofile()
    {
        $data['title'] = 'Edit Profile Admin';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('name', 'Full Name', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/editprofile', $data);
            $this->load->view('templates/footer');
        } else {
            $name = $this->input->post('name');
            $email = $this->input->post('email');

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
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your profile has been updated!</div>');
            redirect('admin/profileadmin');
        }
    }


    public function changePassword()
    {
        $data['title'] = 'Change Password Admin';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[3]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[3]|matches[new_password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/changepassword', $data);
            $this->load->view('templates/footer');
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');
            if (!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong current password!</div>');
                redirect('admin/changepassword');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">New password cannot be the same as current password!</div>');
                    redirect('admin/changepassword');
                } else {
                    // password sudah ok
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password changed!</div>');
                    redirect('admin/changepassword');
                }
            }
        }
    }





    public function datakonsul()
    {
        $data['title'] = 'Laporan Data Konsultasi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['konsultasi_siswa'] = $this->Kesehatan_model->tampilDataKonsul();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/v_konsul', $data);
        $this->load->view('templates/footer');
    }

    public function pdfKonsul()
    {

        $this->load->library('mypdf');
        $data['title'] = "Laporan Data Siswa Indonesia";
        $data['konsultasi_siswa'] = $this->Kesehatan_model->tampilDataKonsul();
        $this->mypdf->generate('admin/laporan_pdfkonsul', $data, 'laporan-mahasiswa', 'A4', 'landscape');
        $this->load->view('templates/header', $data);
    }

    public function sendEmailKonsul($id)
    {
        $data['title'] = 'Kirim Email Hasil Konsultasi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data_user = $this->Kesehatan_model->getKonsultasiById($id);
        $id_user = $data_user['id_user'];
        $data['use'] = $this->Kesehatan_model->getUserById($id_user);
        $data['konsultasi_siswa'] = $this->Kesehatan_model->getKonsultasiById($id);

        $this->form_validation->set_rules('email', 'Email', 'required|trim');
        $this->form_validation->set_rules('subject', 'Subject', 'required|trim');
        $this->form_validation->set_rules('isi', 'Isi Email', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/v_broadcastkonsul', $data);
            $this->load->view('templates/footer');
        } else {

            $mail = $this->input->post('email', true);
            $subj = $this->input->post('subject', true);
            $isi = strip_tags($this->input->post('isi', true));

            $config = [
                'protocol'  => 'smtp',
                'smtp_host' => 'ssl://smtp.googlemail.com',
                'smtp_user' => 'simomilweb@gmail.com',
                'smtp_pass' => 'pur94naaldo$',
                'smtp_port' => 465,
                'mailtype'  => 'html',
                'charset'   => 'utf-8',
                'newline'   => "\r\n"
            ];

            $this->load->library('email', $config);
            $this->email->initialize($config);

            $this->email->from('aldo.abieza30@gmail.com');
            $this->email->to($mail);
            $this->email->subject($subj);
            $this->email->message($isi);

            if ($this->email->send()) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Email sudah dikirim</div>');
                redirect('admin/datakonsul');
            } else {
                show_error($this->email->print_debugger());
            }
        }
    }


    public function delete_konsul($id)
    {
        $this->Kesehatan_model->hapusKonsul($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success">Data Berhasil dihapus');
        redirect('admin/datakonsul');
    }






    /**
     * 
     * 
     * Controller Berita
     * 
     * 
     */





    public function artikel()
    {
        $data['title'] = 'Pengumuman Siswa';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['tbl_berita'] = $this->Kesehatan_model->tampilDataBerita();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/v_berita', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_berita()
    {
        $data['title'] = 'Form Tambah';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->form_validation->set_rules('judul', 'Judul berita', 'required|trim');
        $this->form_validation->set_rules('isi', 'Isi berita', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/v_addberita', $data);
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
                    'judul_berita' => htmlspecialchars($this->input->post('judul'), true),
                    'gambar_berita' => $this->upload->data('file_name'),
                    'isi_berita' => htmlspecialchars($this->input->post('isi'), true)
                ];
                $this->db->insert('tbl_berita', $data);
                redirect('admin/artikel');
            }
        }
    }

    public function delete_berita($id)
    {
        $this->Kesehatan_model->hapusBerita($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success">Berita Berhasil dihapus');
        redirect('admin/artikel');
    }

    public function edit_berita($id)
    {
        $data['title'] = 'Edit Data Permintaan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['tbl_berita'] = $this->Kesehatan_model->getBeritaById($id);
        $this->form_validation->set_rules('judul', 'Judul berita', 'required|trim');
        $this->form_validation->set_rules('isi', 'Isi berita', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/v_editberita', $data);
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
                    'judul_berita' => $this->input->post('judul'),
                    'gambar_berita' => $this->upload->data('file_name'),
                    'isi_berita' => $this->input->post('isi')
                ];
                $this->db->where('id_berita', $id);
                $this->db->update('tbl_berita', $data);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your profile has been updated!</div>');
                redirect('admin/artikel');
            }

            $data = [
                'judul_berita' => $this->input->post('judul'),
                'isi_berita' => $this->input->post('isi')
            ];
            $this->db->where('id_berita', $id);
            $this->db->update('tbl_berita', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your profile has been updated!</div>');
            redirect('admin/artikel');
        }
    }





    /**
     * 
     * 
     * 
     * Modul Broadcast Reminder Email
     * 
     * 
     */





    public function broademail()
    {

        $data['title'] = 'Remainder Email';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['pengguna'] = $this->Kesehatan_model->tampilDataUser();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/v_user', $data);
        $this->load->view('templates/footer');
    }


    public function sendEmail($id)
    {
        $data['title'] = 'Broadcast Email';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['pengguna'] = $this->Kesehatan_model->getUserByid($id);

        $this->form_validation->set_rules('email', 'Judul berita', 'required|trim');
        $this->form_validation->set_rules('subject', 'Judul berita', 'required|trim');
        $this->form_validation->set_rules('isi', 'Isi berita', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/v_broadcast', $data);
            $this->load->view('templates/footer');
        } else {

            $mail = $this->input->post('email', true);
            $subj = $this->input->post('subject', true);
            $isi = strip_tags($this->input->post('isi', true));

            $config = [
                'protocol'  => 'smtp',
                'smtp_host' => 'ssl://smtp.googlemail.com',
                'smtp_user' => 'simomilweb@gmail.com',
                'smtp_pass' => 'pur94naaldo$',
                'smtp_port' => 465,
                'mailtype'  => 'html',
                'charset'   => 'utf-8',
                'newline'   => "\r\n"
            ];

            $this->load->library('email', $config);
            $this->email->initialize($config);

            $this->email->from('aldo.abieza30@gmail.com');
            $this->email->to($mail);
            $this->email->subject($subj);
            $this->email->message($isi);

            if ($this->email->send()) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Email sudah dikirim</div>');
                redirect('admin/broademail');
            } else {
                show_error($this->email->print_debugger());
            }
        }
    }



    /* 
    

        Modul Protokol Kesehatan
    
    
    
    */



    public function data_modul()
    {
        $data['title'] = 'Data Modul';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['modul'] = $this->Kesehatan_model->tampilDataModul();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/v_modul', $data);
        $this->load->view('templates/footer');
    }


    public function tambah_modul()
    {
        $data['title'] = 'Form Tambah Modul';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->form_validation->set_rules('deskripsi', 'Deskripsi Modul', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/v_addmodul', $data);
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
                    'deskripsi_modul' => htmlspecialchars($this->input->post('deskripsi'), true),
                    'file_modul' => $this->upload->data('file_name')
                ];
                $this->db->insert('modul', $data);
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data berhasil ditambah
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>');
                redirect('admin/data_modul');
            }
        }
    }

    public function delete_modul($id)
    {
        $this->Kesehatan_model->hapusModul($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data berhasil dihapus
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
        redirect('admin/data_modul');
    }


    public function edit_modul($id)
    {
        $data['title'] = 'Edit Modul Protokol Kesehatan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['modul'] = $this->Kesehatan_model->getModulById($id);
        $this->form_validation->set_rules('deskripsi', 'Keterangan Modul', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/v_editmodul', $data);
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
                    'deskripsi_modul' => $this->input->post('deskripsi'),
                    'file_modul' => $this->upload->data('file_name')
                ];
                $this->db->where('id_modul', $id);
                $this->db->update('modul', $data);
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data berhasil diubah
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>');
                redirect('admin/data_modul');
            }

            $data = [
                'deskripsi_modul' => $this->input->post('deskripsi')
            ];
            $this->db->where('id_modul', $id);
            $this->db->update('modul', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data berhasil diubah
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>');
            redirect('admin/data_modul');
        }
    }

    public function download_berkas($id)
    {
        $data = $this->db->get_where('modul', ['id_modul' => $id])->row();
        force_download('./uploads/' . $data->keterangan_modul, NULL);
    }


    /**
     * 
     * 
     * 
     * Data Cek Kesehatan Siswa
     * 
     * 
     * 
     */



    public function datacek()
    {
        $data['title'] = 'Laporan Data Kesehatan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['cekkes'] = $this->Kesehatan_model->tampilDataCekkes();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/v_cek', $data);
        $this->load->view('templates/footer');
    }

    public function delete_cekkes($id)
    {
        $this->Kesehatan_model->hapusCekkes($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data berhasil dihapus
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
        redirect('admin/datacek');
    }

    public function pdfCekkes()
    {
        $this->load->library('mypdf');
        $data['title'] = "Laporan Data Cek Kesehatan";
        $data['cekkes'] = $this->Kesehatan_model->tampilDataCekkes();
        $this->mypdf->generate('admin/laporan_pdfcekkes', $data, 'laporan-mahasiswa', 'A4', 'landscape');
        $this->load->view('templates/header', $data);
    }

    public function sendEmailCekkes($id)
    {
        $data['title'] = 'Kirim Email Hasil Cek Kesehatan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data_user = $this->Kesehatan_model->getCekkesById($id);
        $id_user = $data_user['id_user'];
        $data['use'] = $this->Kesehatan_model->getUserById($id_user);
        $data['cekkes'] = $this->Kesehatan_model->getCekkesById($id);

        $this->form_validation->set_rules('email', 'Email', 'required|trim');
        $this->form_validation->set_rules('subject', 'Subject', 'required|trim');
        $this->form_validation->set_rules('isi', 'Keterangan', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/v_broadcastcekkes', $data);
            $this->load->view('templates/footer');
        } else {

            $mail = $this->input->post('email', true);
            $subj = $this->input->post('subject', true);
            $isi = strip_tags($this->input->post('isi', true));

            $config = [
                'protocol'  => 'smtp',
                'smtp_host' => 'ssl://smtp.googlemail.com',
                'smtp_user' => 'simomilweb@gmail.com',
                'smtp_pass' => 'pur94naaldo$',
                'smtp_port' => 465,
                'mailtype'  => 'html',
                'charset'   => 'utf-8',
                'newline'   => "\r\n"
            ];

            $this->load->library('email', $config);
            $this->email->initialize($config);

            $this->email->from('aldo.abieza30@gmail.com');
            $this->email->to($mail);
            $this->email->subject($subj);
            $this->email->message($isi);

            if ($this->email->send()) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Email sudah dikirim</div>');
                redirect('admin/datacek');
            } else {
                show_error($this->email->print_debugger());
            }
        }
    }



    // /* 


    // Controller Halaman Lokasi 


    // */

    public function lokasi()
    {
        $data['title'] = 'Laporan Data Lokasi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['lokasi'] = $this->Maps_model->tampilkanPermintaan();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/location', $data);
        $this->load->view('templates/footer', $data);
    }

    public function tambah_lokasi()
    {
        $data['title'] = 'Tambah Data Permintaan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('Latitude', 'Latitude', 'required|trim');
        $this->form_validation->set_rules('Longitude', 'Longitude', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Tambahkan Data';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/maps', $data);
            $this->load->view('templates/footer');
        } else {
            $data['lokasi'] = $this->Maps_model->tambahPermintaan();
            $this->session->set_flashdata('message', '<div class="alert alert-success">Data Berhasil Ditambah!!!</div>');
            redirect('admin/lokasi');
        }
    }

    public function delete_lokasi($id)
    {
        $this->Maps_model->hapusPermintaan($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success">Data Berhasil dihapus');
        redirect('admin/lokasi');
    }


    public function edit_lokasi($id)
    {
        $data['title'] = 'Edit Data Lokasi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['lokasi'] = $this->Maps_model->getPermintaanById($id);

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('Latitude', 'Latitude', 'required|trim');
        $this->form_validation->set_rules('Longitude', 'Longitude', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/editsekolah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Maps_model->ubahDataPermintaan();
            $this->session->set_flashdata('message', '<div class="alert alert-success">Data Berhasil Diubah!!!</div>');
            redirect('admin/lokasi');
        }
    }









    /**
     * 
     * 
     * Controller Data Laporan
     * 
     * 
     */

    public function data_laporan()
    {
        $data['title'] = 'Data Laporan Harian';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['laporan'] = $this->Kesehatan_model->tampilDataLaporan();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/v_datpol', $data);
        $this->load->view('templates/footer', $data);
    }

    public function detail_laporan($id)
    {
        $data['laporan'] = $this->Kesehatan_model->getLaporanById($id);
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('beranda/beranda_header');
        $this->load->view('admin/v_detaillap', $data);
        $this->load->view('beranda/beranda_footer');
    }

    public function delete_laporan($id)
    {
        $this->Kesehatan_model->hapusLaporan($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success">Data Berhasil dihapus');
        redirect('admin/data_laporan');
    }

    public function pdfLaporan()
    {
        $this->load->library('mypdf');
        $data['title'] = "Laporan Data Siswa Indonesia";
        $data['laporan'] = $this->Kesehatan_model->tampilDataLaporan();
        $this->mypdf->generate('admin/laporan_pdfharian', $data, 'laporan-mahasiswa', 'A4', 'landscape');
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/v_broadcastcekkes', $data);
        $this->load->view('templates/footer');
    }








    /* 
    

        Data Rumah Sakit
    
    
    */


    public function datars()
    {
        $data['title'] = 'Data Rumah Sakit Rujukan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['tbl_rs'] = $this->Kesehatan_model->tampilDataRs();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/v_datars', $data);
        $this->load->view('templates/footer', $data);
    }

    public function tambah_rs()
    {
        $data['title'] = 'Tambah Data Rumah Sakit';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('wilayah', 'Wilayah', 'required|trim');
        $this->form_validation->set_rules('notelp', 'No.Telepon', 'required|trim');
        $this->form_validation->set_rules('provinsi', 'Provinsi', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/v_addrs', $data);
            $this->load->view('templates/footer');
        } else {
            $data['lokasi'] = $this->Kesehatan_model->addDataRs();
            $this->session->set_flashdata('message', '<div class="alert alert-success">Data Berhasil Ditambah!!!</div>');
            redirect('admin/datars');
        }
    }


    public function edit_rs($id)
    {
        $data['title'] = 'Edit Data Rumah Sakit Rujukan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['tbl_rs'] = $this->Kesehatan_model->getRsById($id);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/v_editrs', $data);
        $this->load->view('templates/footer');
    }

    public function delete_rs($id)
    {
        $this->Kesehatan_model->hapusRs($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success">Data Berhasil dihapus');
        redirect('admin/datars');
    }





    /*
    
    
        Data Donasi
    
    
    */


    public function datadonasi()
    {
        $data['title'] = 'Data Peduli Siswa';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['tbl_donatur'] = $this->Kesehatan_model->getDataDonatur();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/v_datadonasi', $data);
        $this->load->view('templates/footer', $data);
    }

    public function kelola_donasi()
    {
        $data['title'] = 'Data Peduli Siswa';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['tbl_kategori_donasi'] = $this->Kesehatan_model->getDataKategori();

        $this->form_validation->set_rules('tujuan', 'Tujuan', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/v_keloladonasi', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $data['tbl_kategori_donasi'] = $this->Kesehatan_model->tambahDataTujuan();
            $this->session->set_flashdata('message', '<div class="alert alert-success">Data Berhasil Ditambah!!!</div>');
            redirect('admin/kelola_donasi');
        }
    }

    public function detail_donatur($id)
    {
        $data['title'] = 'Edit Data Rumah Sakit Rujukan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['tbl_donatur'] = $this->Kesehatan_model->getDonaturById($id);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/v_editdonatur', $data);
        $this->load->view('templates/footer');
    }

    public function edit_status()
    {
        $data['title'] = 'Approve Peduli Siswa';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['status_donasi'] = ['Konfirmasi', 'Belum dikonfirmasi'];

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/edit', $data);
            $this->load->view('templates/footer');
        } else {

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
        }
    }

    public function delete_donatur($id)
    {
        $this->Kesehatan_model->hapusDonatur($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success">Data Berhasil dihapus');
        redirect('admin/kelola_donasi');
    }






    /**
     * 
     * 
     * Data Relawan
     * 
     * 
     */


    public function datarelawan()
    {
        $data['title'] = 'Data Relawan Covid-19';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['tbl_relawan'] = $this->Kesehatan_model->getDataRelawan();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/v_datarelawan', $data);
        $this->load->view('templates/footer', $data);
    }
}
