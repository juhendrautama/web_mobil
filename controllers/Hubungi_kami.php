<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Hubungi_kami extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Hubungi_kami_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'hubungi_kami/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'hubungi_kami/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'hubungi_kami/index.html';
            $config['first_url'] = base_url() . 'hubungi_kami/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Hubungi_kami_model->total_rows($q);
        $hubungi_kami = $this->Hubungi_kami_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'hubungi_kami_data' => $hubungi_kami,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'judul_page' => 'Hubungi Kami',
            'konten' => 'hubungi_kami/hubungi_kami_list',
        );
        $this->load->view('v_index', $data);
    }

    public function read($id) 
    {
        $row = $this->Hubungi_kami_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_hubungi' => $row->id_hubungi,
		'nama' => $row->nama,
		'email' => $row->email,
		'judul' => $row->judul,
		'pesan' => $row->pesan,
        'judul_page' => 'Hubungi Kami',
        'konten' => 'hubungi_kami/hubungi_kami_read'
	    );
            $this->load->view('v_index', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('hubungi_kami'));
        }
    }

    public function create() 
    {
        $data = array(
            'judul_page' => 'hubungi_kami/hubungi_kami_form',
            'konten' => 'hubungi_kami/hubungi_kami_form',
            'button' => 'Create',
            'action' => site_url('hubungi_kami/create_action'),
	    'id_hubungi' => set_value('id_hubungi'),
	    'nama' => set_value('nama'),
	    'email' => set_value('email'),
	    'judul' => set_value('judul'),
	    'pesan' => set_value('pesan'),
	);
        $this->load->view('v_index', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama' => $this->input->post('nama',TRUE),
		'email' => $this->input->post('email',TRUE),
		'judul' => $this->input->post('judul',TRUE),
		'pesan' => $this->input->post('pesan',TRUE),
	    );

            $this->Hubungi_kami_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('hubungi_kami'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Hubungi_kami_model->get_by_id($id);

        if ($row) {
            $data = array(
                'judul_page' => 'hubungi_kami/hubungi_kami_form',
                'konten' => 'hubungi_kami/hubungi_kami_form',
                'button' => 'Update',
                'action' => site_url('hubungi_kami/update_action'),
		'id_hubungi' => set_value('id_hubungi', $row->id_hubungi),
		'nama' => set_value('nama', $row->nama),
		'email' => set_value('email', $row->email),
		'judul' => set_value('judul', $row->judul),
		'pesan' => set_value('pesan', $row->pesan),
	    );
            $this->load->view('v_index', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('hubungi_kami'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_hubungi', TRUE));
        } else {
            $data = array(
		'nama' => $this->input->post('nama',TRUE),
		'email' => $this->input->post('email',TRUE),
		'judul' => $this->input->post('judul',TRUE),
		'pesan' => $this->input->post('pesan',TRUE),
        'update_at' => get_waktu(),
	    );

            $this->Hubungi_kami_model->update($this->input->post('id_hubungi', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('hubungi_kami'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Hubungi_kami_model->get_by_id($id);

        if ($row) {
            $this->Hubungi_kami_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('hubungi_kami'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('hubungi_kami'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('email', 'email', 'trim|required');
	$this->form_validation->set_rules('judul', 'judul', 'trim|required');
	$this->form_validation->set_rules('pesan', 'pesan', 'trim|required');

	$this->form_validation->set_rules('id_hubungi', 'id_hubungi', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Hubungi_kami.php */
/* Location: ./application/controllers/Hubungi_kami.php */
/* Please DO NOT modify this information : */
/* Generated by Boy Kurniawan 2020-10-05 03:54:46 */
/* https://jualkoding.com */