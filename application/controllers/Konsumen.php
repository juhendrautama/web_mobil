<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Konsumen extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Konsumen_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'konsumen/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'konsumen/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'konsumen/index.html';
            $config['first_url'] = base_url() . 'konsumen/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Konsumen_model->total_rows($q);
        $konsumen = $this->Konsumen_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'konsumen_data' => $konsumen,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'judul_page' => 'Data Konsumen',
            'konten' => 'konsumen/konsumen_list',
        );
        $this->load->view('v_index', $data);
    }

    public function read($id) 
    {
        $row = $this->Konsumen_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_konsumen' => $row->id_konsumen,
		'nama_konsumen' => $row->nama_konsumen,
		'no_telp' => $row->no_telp,
		'alamat' => $row->alamat,
	    );
            $this->load->view('konsumen/konsumen_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('konsumen'));
        }
    }

    public function create() 
    {
        $data = array(
            'judul_page' => 'Data Konsumen',
            'konten' => 'konsumen/konsumen_form',
            'button' => 'Create',
            'action' => site_url('konsumen/create_action'),
	    'id_konsumen' => set_value('id_konsumen'),
	    'nama_konsumen' => set_value('nama_konsumen'),
	    'no_telp' => set_value('no_telp'),
	    'alamat' => set_value('alamat'),
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
		'nama_konsumen' => $this->input->post('nama_konsumen',TRUE),
		'no_telp' => $this->input->post('no_telp',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
	    );

            $this->Konsumen_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('konsumen'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Konsumen_model->get_by_id($id);

        if ($row) {
            $data = array(
                'judul_page' => 'Data Konsumen',
                'konten' => 'konsumen/konsumen_form',
                'button' => 'Update',
                'action' => site_url('konsumen/update_action'),
		'id_konsumen' => set_value('id_konsumen', $row->id_konsumen),
		'nama_konsumen' => set_value('nama_konsumen', $row->nama_konsumen),
		'no_telp' => set_value('no_telp', $row->no_telp),
		'alamat' => set_value('alamat', $row->alamat),
	    );
            $this->load->view('v_index', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('konsumen'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_konsumen', TRUE));
        } else {
            $data = array(
		'nama_konsumen' => $this->input->post('nama_konsumen',TRUE),
		'no_telp' => $this->input->post('no_telp',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
	    );

            $this->Konsumen_model->update($this->input->post('id_konsumen', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('konsumen'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Konsumen_model->get_by_id($id);

        if ($row) {
            $this->Konsumen_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('konsumen'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('konsumen'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_konsumen', 'nama konsumen', 'trim|required');
	$this->form_validation->set_rules('no_telp', 'no telp', 'trim|required');
	$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');

	$this->form_validation->set_rules('id_konsumen', 'id_konsumen', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Konsumen.php */
/* Location: ./application/controllers/Konsumen.php */
/* Please DO NOT modify this information : */
/* Generated by Boy Kurniawan 2022-07-26 17:54:55 */
/* https://jualkoding.com */