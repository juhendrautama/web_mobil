<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Web extends CI_Controller {

	public function index()
	{
        $this->db->select('a.*, b.gambar');
        $this->db->from('mobil a');
        $this->db->join('gambar_mobil b', 'a.id_mobil = b.id_mobil', 'inner');
        $this->db->where('b.cover', '1');
        $this->db->where('a.tampil_depan', '1');
        $this->db->where('a.status', '1');
        $this->db->group_by('b.id_mobil');
        $this->db->order_by('a.no_urut', 'asc');
        $this->db->limit(6);
        $data['list_mobil'] = $this->db->get();
        $this->db->where('status', '1');
        $this->db->order_by('id_slider', 'desc');
        $data['slider'] = $this->db->get('slider');
		$this->load->view('front/f_index', $data);
    }

    public function daftar_mobil()
    {

        $this->load->library('pagination');
        //konfigurasi pagination
        $config['base_url'] = base_url('web/daftar_mobil'); //site url
        $config['total_rows'] = $this->db->count_all('mobil'); //total row
        $config['per_page'] = 5;  //show record per halaman
        $config["uri_segment"] = 3;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);
 
        // Membuat Style pagination untuk BootStrap v4
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';
 
        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
 
        //panggil function get_mahasiswa_list yang ada pada mmodel mahasiswa_model. 
        $this->db->select('a.*, b.gambar');
        $this->db->join('gambar_mobil b', 'a.id_mobil = b.id_mobil', 'inner');
        $this->db->where('b.cover', '1');
        $this->db->where('a.status', '1');
        $this->db->group_by('b.id_mobil');
        $this->db->order_by('a.no_urut', 'asc');
        $data['list_mobil'] = $this->db->get('mobil a',$config["per_page"], $data['page']);       
 
        $data['pagination'] = $this->pagination->create_links();


        $this->load->view('front/daftar_mobil',$data);
    }

    public function detail_mobil($id_mobil)
    {
        $this->db->where('id_mobil', $id_mobil);
        $data['detail_mobil'] = $this->db->get('mobil');
        $this->load->view('front/detail_mobil',$data);
    }

    public function berita()
    {
        $this->load->view('front/daftar_berita');
    }

    public function tentang_kami()
    {
        $this->load->view('front/tentang_kami');
    }

    public function kontak_kami()
    {
        $this->load->view('front/kontak_kami');
    }

    public function simulasi_kredit()
    {
        $this->load->view('front/simulasi_kredit');
    }

    public function simpan_pesan()
    {
        if ($_POST) {
            $nama = $this->input->post('nama');
            $email = $this->input->post('email');
            $judul = $this->input->post('judul');
            $pesan = $this->input->post('pesan');

            $data = array(
                'nama' => $nama,
                'email' => $email,
                'judul' => $judul,
                'pesan' => $pesan,
                'create_at' => get_waktu(),
            );
            $simpan = $this->db->insert('hubungi_kami', $data);
            if ($simpan) {
                $this->session->set_flashdata('message', alert_biasa('Pesan kamu berhasil dikirim !','success'));
                redirect('web/kontak_kami','refresh');
            }

        }
    }

    public function simpan_minat()
    {
        $this->db->insert('minat', $_POST);
        $this->session->set_flashdata('message', alert_biasa('Terima kasih sudah berkunjung, sales kami akan segera menghubungi anda !','success'));
                redirect('web','refresh');
    }

    
   
	

	

	
}
