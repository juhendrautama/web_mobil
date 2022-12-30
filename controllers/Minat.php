<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Minat extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Minat_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'minat/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'minat/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'minat/index.html';
            $config['first_url'] = base_url() . 'minat/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Minat_model->total_rows($q);
        $minat = $this->Minat_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'minat_data' => $minat,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'judul_page' => 'Data Minat',
            'konten' => 'minat/minat_list',
        );
        $this->load->view('v_index', $data);
    }

    public function read($id) 
    {
        $row = $this->Minat_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_minat' => $row->id_minat,
		'nama' => $row->nama,
		'no_telp' => $row->no_telp,
		'alamat' => $row->alamat,
		'id_mobil' => $row->id_mobil,
	    );
            $this->load->view('minat/minat_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('minat'));
        }
    }

    public function create() 
    {
        $data = array(
            'judul_page' => 'Data Minat',
            'konten' => 'minat/minat_form',
            'button' => 'Create',
            'action' => site_url('minat/create_action'),
	    'id_minat' => set_value('id_minat'),
	    'nama' => set_value('nama'),
	    'no_telp' => set_value('no_telp'),
	    'alamat' => set_value('alamat'),
	    'id_mobil' => set_value('id_mobil'),
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
		'no_telp' => $this->input->post('no_telp',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'id_mobil' => $this->input->post('id_mobil',TRUE),
	    );

            $this->Minat_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('minat'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Minat_model->get_by_id($id);

        if ($row) {
            $data = array(
                'judul_page' => 'Data Minat',
                'konten' => 'minat/minat_form',
                'button' => 'Update',
                'action' => site_url('minat/update_action'),
		'id_minat' => set_value('id_minat', $row->id_minat),
		'nama' => set_value('nama', $row->nama),
		'no_telp' => set_value('no_telp', $row->no_telp),
		'alamat' => set_value('alamat', $row->alamat),
		'id_mobil' => set_value('id_mobil', $row->id_mobil),
	    );
            $this->load->view('v_index', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('minat'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_minat', TRUE));
        } else {
            $data = array(
		'nama' => $this->input->post('nama',TRUE),
		'no_telp' => $this->input->post('no_telp',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'id_mobil' => $this->input->post('id_mobil',TRUE),
	    );

            $this->Minat_model->update($this->input->post('id_minat', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('minat'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Minat_model->get_by_id($id);

        if ($row) {
            $this->Minat_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('minat'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('minat'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('no_telp', 'no telp', 'trim|required');
	$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
	$this->form_validation->set_rules('id_mobil', 'id mobil', 'trim|required');

	$this->form_validation->set_rules('id_minat', 'id_minat', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Minat.php */
/* Location: ./application/controllers/Minat.php */
/* Please DO NOT modify this information : */
/* Generated by Boy Kurniawan 2022-07-26 17:55:02 */
/* https://jualkoding.com */