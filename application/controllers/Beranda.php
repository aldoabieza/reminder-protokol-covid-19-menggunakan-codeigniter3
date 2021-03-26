<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beranda extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('download');
		$this->load->library('form_validation');
		$this->load->model('Maps_model');
		$this->load->model('Kesehatan_model');
		$this->load->model('Blog_model', 'blog');
	}

	public function index()
	{
		$data['lokasi'] = $this->Maps_model->tampilkanPermintaan();
		$this->load->view('beranda/beranda_header');
		$this->load->view('beranda/sectionutama', $data);
		$this->load->view('beranda/beranda_footer');
	}

	public function tampilartikel()
	{
		$data['tbl_berita'] = $this->blog->tampilBlog();
		$this->load->view('beranda/beranda_header', $data);
		$this->load->view('beranda/blog_view', $data);
		$this->load->view('beranda/beranda_footer');
	}

	public function detail_artikel($id)
	{
		$data['tbl_berita'] = $this->Kesehatan_model->getBeritaById($id);
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['taber'] = $this->Kesehatan_model->tampilDataBerita();
		$this->load->view('beranda/beranda_header');
		$this->load->view('beranda/detail_blog', $data);
		$this->load->view('beranda/beranda_footer');
	}

	public function tampilmodul()
	{
		$data['modul'] = $this->Kesehatan_model->tampilDataModul();
		$this->load->view('beranda/beranda_header');
		$this->load->view('beranda/modul_view', $data);
		$this->load->view('beranda/beranda_footer');
	}

	public function download_berkas($id)
	{
		$data = $this->db->get_where('modul', ['id_modul' => $id])->row();
		force_download('uploads/' . $data->file_modul, null);
	}
}
