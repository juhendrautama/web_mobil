<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Cabang extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Cabang_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'cabang/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'cabang/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'cabang/index.html';
            $config['first_url'] = base_url() . 'cabang/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Cabang_model->total_rows($q);
        $cabang = $this->Cabang_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'cabang_data' => $cabang,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'judul_page' => 'Cabang',
            'konten' => 'cabang/cabang_list',
        );
        $this->load->view('v_index', $data);
    }

    public function read($id) 
    {
        $row = $this->Cabang_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_cabang' => $row->id_cabang,
		'nama_cabang' => $row->nama_cabang,
		'alamat' => $row->alamat,
		'jam_dealer' => $row->jam_dealer,
		'jam_service' => $row->jam_service,
		'no_telp_dealer' => $row->no_telp_dealer,
		'no_telp_service' => $row->no_telp_service,
		'pelayanan' => $row->pelayanan,
	    );
            $this->load->view('cabang/cabang_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('cabang'));
        }
    }

    public function create() 
    {
        $data = array(
            'judul_page' => 'cabang/cabang_form',
            'konten' => 'cabang/cabang_form',
            'button' => 'Create',
            'action' => site_url('cabang/create_action'),
	    'id_cabang' => set_value('id_cabang'),
	    'nama_cabang' => set_value('nama_cabang'),
	    'alamat' => set_value('alamat'),
	    'jam_dealer' => set_value('jam_dealer'),
	    'jam_service' => set_value('jam_service'),
	    'no_telp_dealer' => set_value('no_telp_dealer'),
	    'no_telp_service' => set_value('no_telp_service'),
        'pelayanan' => set_value('pelayanan'),
        'foto' => set_value('foto'),
	    'status' => set_value('status'),
	);
        $this->load->view('v_index', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $img = upload_gambar_biasa('cabang', 'image/user/', 'jpg|png|jpeg', 10000, 'foto');
            $data = array(
		'nama_cabang' => $this->input->post('nama_cabang',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'jam_dealer' => $this->input->post('jam_dealer',TRUE),
		'jam_service' => $this->input->post('jam_service',TRUE),
		'no_telp_dealer' => $this->input->post('no_telp_dealer',TRUE),
		'no_telp_service' => $this->input->post('no_telp_service',TRUE),
        'pelayanan' => implode(',', $this->input->post('pelayanan',TRUE)),
		'foto' => $img,
        'status' => $this->input->post('status',TRUE),
        'crete_at' => get_waktu(),
	    );

            $this->Cabang_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('cabang'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Cabang_model->get_by_id($id);

        if ($row) {
            $data = array(
                'judul_page' => 'cabang/cabang_form',
                'konten' => 'cabang/cabang_form',
                'button' => 'Update',
                'action' => site_url('cabang/update_action'),
		'id_cabang' => set_value('id_cabang', $row->id_cabang),
		'nama_cabang' => set_value('nama_cabang', $row->nama_cabang),
		'alamat' => set_value('alamat', $row->alamat),
		'jam_dealer' => set_value('jam_dealer', $row->jam_dealer),
		'jam_service' => set_value('jam_service', $row->jam_service),
		'no_telp_dealer' => set_value('no_telp_dealer', $row->no_telp_dealer),
		'no_telp_service' => set_value('no_telp_service', $row->no_telp_service),
        'pelayanan' => set_value('pelayanan', $row->pelayanan),
        'foto' => set_value('foto', $row->foto),
		'status' => set_value('status', $row->status),
	    );
            $this->load->view('v_index', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('cabang'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_cabang', TRUE));
        } else {
            $data = array(
		'nama_cabang' => $this->input->post('nama_cabang',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'jam_dealer' => $this->input->post('jam_dealer',TRUE),
		'jam_service' => $this->input->post('jam_service',TRUE),
		'no_telp_dealer' => $this->input->post('no_telp_dealer',TRUE),
		'no_telp_service' => $this->input->post('no_telp_service',TRUE),
        'pelayanan' => implode(',', $this->input->post('pelayanan',TRUE)),
		'foto' => $retVal = ($_FILES['foto']['name'] == '') ? $_POST['foto_old'] : upload_gambar_biasa('cabang', 'image/user/', 'jpeg|png|jpg|gif', 10000, 'foto'),
        'status' => $this->input->post('status',TRUE),
        'update_at' => get_waktu(),
	    );

            $this->Cabang_model->update($this->input->post('id_cabang', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('cabang'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Cabang_model->get_by_id($id);

        if ($row) {
            $this->Cabang_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('cabang'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('cabang'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_cabang', 'nama cabang', 'trim|required');
	$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
	$this->form_validation->set_rules('jam_dealer', 'jam dealer', 'trim|required');
	// $this->form_validation->set_rules('jam_service', 'jam service', 'trim|required');
	$this->form_validation->set_rules('no_telp_dealer', 'no telp dealer', 'trim|required');
	// $this->form_validation->set_rules('no_telp_service', 'no telp service', 'trim|required');
	// $this->form_validation->set_rules('pelayanan', 'pelayanan', 'trim|required');

	$this->form_validation->set_rules('id_cabang', 'id_cabang', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Cabang.php */
/* Location: ./application/controllers/Cabang.php */
/* Please DO NOT modify this information : */
/* Generated by Boy Kurniawan 2020-10-08 03:57:26 */
/* https://jualkoding.com */