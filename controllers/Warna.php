<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Warna extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Warna_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'warna/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'warna/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'warna/index.html';
            $config['first_url'] = base_url() . 'warna/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Warna_model->total_rows($q);
        $warna = $this->Warna_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'warna_data' => $warna,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'judul_page' => 'Data Warna',
            'konten' => 'warna/warna_list',
        );
        $this->load->view('v_index', $data);
    }

    public function read($id) 
    {
        $row = $this->Warna_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_warna' => $row->id_warna,
		'warna' => $row->warna,
	    );
            $this->load->view('warna/warna_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('warna'));
        }
    }

    public function create() 
    {
        $data = array(
            'judul_page' => 'warna/warna_form',
            'konten' => 'warna/warna_form',
            'button' => 'Create',
            'action' => site_url('warna/create_action'),
	    'id_warna' => set_value('id_warna'),
        'warna' => set_value('warna'),
	    'kode_warna' => set_value('kode_warna'),
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
        'warna' => $this->input->post('warna',TRUE),
		'kode_warna' => $this->input->post('kode_warna',TRUE),
	    );

            $this->Warna_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('warna'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Warna_model->get_by_id($id);

        if ($row) {
            $data = array(
                'judul_page' => 'warna/warna_form',
                'konten' => 'warna/warna_form',
                'button' => 'Update',
                'action' => site_url('warna/update_action'),
		'id_warna' => set_value('id_warna', $row->id_warna),
        'warna' => set_value('warna', $row->warna),
		'kode_warna' => set_value('kode_warna', $row->kode_warna),
	    );
            $this->load->view('v_index', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('warna'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_warna', TRUE));
        } else {
            $data = array(
        'warna' => $this->input->post('warna',TRUE),
		'kode_warna' => $this->input->post('kode_warna',TRUE),
	    );

            $this->Warna_model->update($this->input->post('id_warna', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('warna'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Warna_model->get_by_id($id);

        if ($row) {
            $this->Warna_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('warna'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('warna'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('warna', 'warna', 'trim|required');

	$this->form_validation->set_rules('id_warna', 'id_warna', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Warna.php */
/* Location: ./application/controllers/Warna.php */
/* Please DO NOT modify this information : */
/* Generated by Boy Kurniawan 2020-10-06 09:23:37 */
/* https://jualkoding.com */