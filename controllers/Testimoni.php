<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Testimoni extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Testimoni_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'testimoni/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'testimoni/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'testimoni/index.html';
            $config['first_url'] = base_url() . 'testimoni/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Testimoni_model->total_rows($q);
        $testimoni = $this->Testimoni_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'testimoni_data' => $testimoni,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'judul_page' => 'Data Testimoni',
            'konten' => 'testimoni/testimoni_list',
        );
        $this->load->view('v_index', $data);
    }

    public function read($id) 
    {
        $row = $this->Testimoni_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_testimoni' => $row->id_testimoni,
		'foto' => $row->foto,
		'nama' => $row->nama,
		'pekerjaan' => $row->pekerjaan,
		'deskripsi' => $row->deskripsi,
	    );
            $this->load->view('testimoni/testimoni_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('testimoni'));
        }
    }

    public function create() 
    {
        $data = array(
            'judul_page' => 'testimoni/testimoni_form',
            'konten' => 'testimoni/testimoni_form',
            'button' => 'Create',
            'action' => site_url('testimoni/create_action'),
	    'id_testimoni' => set_value('id_testimoni'),
	    'foto' => set_value('foto'),
	    'nama' => set_value('nama'),
	    'pekerjaan' => set_value('pekerjaan'),
        'deskripsi' => set_value('deskripsi'),
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
            $img = upload_gambar_biasa('testimoni', 'image/user/', 'jpg|png|jpeg', 10000, 'foto');
            $data = array(
		'foto' => $img,
		'nama' => $this->input->post('nama',TRUE),
		'pekerjaan' => $this->input->post('pekerjaan',TRUE),
		'deskripsi' => $this->input->post('deskripsi',TRUE),
        'status' => $this->input->post('status',TRUE),
        'crete_at' => get_waktu(),
	    );

            $this->Testimoni_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('testimoni'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Testimoni_model->get_by_id($id);

        if ($row) {
            $data = array(
                'judul_page' => 'testimoni/testimoni_form',
                'konten' => 'testimoni/testimoni_form',
                'button' => 'Update',
                'action' => site_url('testimoni/update_action'),
		'id_testimoni' => set_value('id_testimoni', $row->id_testimoni),
		'foto' => set_value('foto', $row->foto),
		'nama' => set_value('nama', $row->nama),
		'pekerjaan' => set_value('pekerjaan', $row->pekerjaan),
        'deskripsi' => set_value('deskripsi', $row->deskripsi),
		'status' => set_value('status', $row->status),
	    );
            $this->load->view('v_index', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('testimoni'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_testimoni', TRUE));
        } else {
            $data = array(
		'foto' => $retVal = ($_FILES['foto']['name'] == '') ? $_POST['foto_old'] : upload_gambar_biasa('testimoni', 'image/user/', 'jpeg|png|jpg|gif', 10000, 'foto'),
		'nama' => $this->input->post('nama',TRUE),
		'pekerjaan' => $this->input->post('pekerjaan',TRUE),
		'deskripsi' => $this->input->post('deskripsi',TRUE),
        'status' => $this->input->post('status',TRUE),
        'crete_at' => get_waktu(),
	    );

            $this->Testimoni_model->update($this->input->post('id_testimoni', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('testimoni'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Testimoni_model->get_by_id($id);

        if ($row) {
            $foto = get_data('testimoni','id_testimoni',$id,'foto');
            unlink("image/user/".$foto);
            $this->Testimoni_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('testimoni'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('testimoni'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('pekerjaan', 'pekerjaan', 'trim|required');
	$this->form_validation->set_rules('deskripsi', 'deskripsi', 'trim|required');

	$this->form_validation->set_rules('id_testimoni', 'id_testimoni', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Testimoni.php */
/* Location: ./application/controllers/Testimoni.php */
/* Please DO NOT modify this information : */
/* Generated by Boy Kurniawan 2020-09-29 09:37:31 */
/* https://jualkoding.com */