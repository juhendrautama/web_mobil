<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Slider extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Slider_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'slider/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'slider/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'slider/index.html';
            $config['first_url'] = base_url() . 'slider/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Slider_model->total_rows($q);
        $slider = $this->Slider_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'slider_data' => $slider,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'judul_page' => 'Data Slider',
            'konten' => 'slider/slider_list',
        );
        $this->load->view('v_index', $data);
    }

    public function read($id) 
    {
        $row = $this->Slider_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_slider' => $row->id_slider,
		'image' => $row->image,
	    );
            $this->load->view('slider/slider_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('slider'));
        }
    }

    public function create() 
    {
        $data = array(
            'judul_page' => 'slider/slider_form',
            'konten' => 'slider/slider_form',
            'button' => 'Create',
            'action' => site_url('slider/create_action'),
	    'id_slider' => set_value('id_slider'),
	    'image' => set_value('image'),
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
             $img = upload_gambar_biasa('slide', 'image/slide/', 'jpg|png|jpeg|gif', 10000, 'image');
            $data = array(
		'image' => $img,
        'status' => $this->input->post('status',TRUE),
	    );

            $this->Slider_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('slider'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Slider_model->get_by_id($id);

        if ($row) {
            $data = array(
                'judul_page' => 'slider/slider_form',
                'konten' => 'slider/slider_form',
                'button' => 'Update',
                'action' => site_url('slider/update_action'),
		'id_slider' => set_value('id_slider', $row->id_slider),
        'image' => set_value('image', $row->image),
		'status' => set_value('status', $row->status),
	    );
            $this->load->view('v_index', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('slider'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_slider', TRUE));
        } else {
            $data = array(
		'image' => $retVal = ($_FILES['image']['name'] == '') ? $_POST['image_old'] : upload_gambar_biasa('slide', 'image/slide/', 'jpeg|png|jpg|gif', 10000, 'image'),
        'status' => $this->input->post('status',TRUE),
	    );

            $this->Slider_model->update($this->input->post('id_slider', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('slider'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Slider_model->get_by_id($id);

        if ($row) {
            $this->Slider_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('slider'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('slider'));
        }
    }

    public function _rules() 
    {
	// $this->form_validation->set_rules('image', 'image', 'trim|required');

	$this->form_validation->set_rules('id_slider', 'id_slider', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Slider.php */
/* Location: ./application/controllers/Slider.php */
/* Please DO NOT modify this information : */
/* Generated by Boy Kurniawan 2020-09-29 09:37:27 */
/* https://jualkoding.com */