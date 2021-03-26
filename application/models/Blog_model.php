<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Blog_model extends CI_Model
{

    public function tampilBlog()
    {
        $this->db->select('*');
        $this->db->from('tbl_berita');
        $this->db->join('user', 'user.id_user = tbl_berita.id_user');
        return $this->db->get()->result();
    }
}
