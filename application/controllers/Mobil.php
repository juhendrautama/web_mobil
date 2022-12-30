<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mobil extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Mobil_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'mobil/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'mobil/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'mobil/index.html';
            $config['first_url'] = base_url() . 'mobil/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Mobil_model->total_rows($q);
        $mobil = $this->Mobil_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'mobil_data' => $mobil,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'judul_page' => 'Data Mobil',
            'konten' => 'mobil/mobil_list',
        );
        $this->load->view('v_index', $data);
    }

    public function read($id) 
    {
        $row = $this->Mobil_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_mobil' => $row->id_mobil,
		'judul' => $row->judul,
		'deskripsi' => $row->deskripsi,
	    );
            $this->load->view('mobil/mobil_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mobil'));
        }
    }

    public function create() 
    {
        $data = array(
            'judul_page' => 'mobil/mobil_form',
            'konten' => 'mobil/mobil_form',
            'button' => 'Create',
            'action' => site_url('mobil/create_action'),
	    'id_mobil' => set_value('id_mobil'),
        'judul' => set_value('judul'),
	    'harga' => set_value('harga'),
        'stok_awal' => set_value('stok_awal'),
        'deskripsi' => set_value('deskripsi'),
        'tampil_depan' => set_value('tampil_depan'),
        'id_series' => set_value('id_series'),
        'id_type' => set_value('id_type'),
        'id_warna' => set_value('id_warna'),
        'kecepatan' => set_value('kecepatan'),
        'transisi' => set_value('transisi'),
        'bahan_bakar' => set_value('bahan_bakar'),
        'fitur_lain' => set_value('fitur_lain'),
        'kapasitas_bahan_bakar' => set_value('kapasitas_bahan_bakar'),
        'brosur' => set_value('brosur'),
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
            $brosur = upload_gambar_biasa('brosur', 'image/file/', '*', 100000, 'brosur');
            if (strpos($brosur, '<p>') !== false) {
                $this->session->set_flashdata('message', alert_biasa($brosur,'error'));
                redirect('mobil/create','refresh');
            }
            $data = array(
        'judul' => $this->input->post('judul',TRUE),
		'harga' => $this->input->post('harga',TRUE),
        'stok_awal' => $this->input->post('stok_awal',TRUE),
        'deskripsi' => $this->input->post('deskripsi',TRUE),
        'tampil_depan' => $this->input->post('tampil_depan',TRUE),
        'id_series' => $this->input->post('id_series',TRUE),
        'id_type' => $this->input->post('id_type',TRUE),
        'id_warna' => implode(',', $this->input->post('id_warna',TRUE)),
        'kecepatan' => $this->input->post('kecepatan',TRUE),
        'transisi' => $this->input->post('transisi',TRUE),
        'bahan_bakar' => $this->input->post('bahan_bakar',TRUE),
        'kapasitas_bahan_bakar' => $this->input->post('kapasitas_bahan_bakar',TRUE),
        'fitur_lain' => $this->input->post('fitur_lain',TRUE),
        'status' => $this->input->post('status',TRUE),
		'brosur' => $brosur,
        'crete_at' => get_waktu(),
	    );

            $this->Mobil_model->insert($data);

            $id_mobil = $this->db->insert_id();

            $dt = array();

             // Count total files
            $countfiles = count($_FILES['files']['name']);

            // Looping all files
            for($i=0;$i<$countfiles;$i++){

                if(!empty($_FILES['files']['name'][$i])){

                  // Define new $_FILES array - $_FILES['file']
                  $_FILES['file']['name'] = $_FILES['files']['name'][$i];
                  $_FILES['file']['type'] = $_FILES['files']['type'][$i];
                  $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
                  $_FILES['file']['error'] = $_FILES['files']['error'][$i];
                  $_FILES['file']['size'] = $_FILES['files']['size'][$i];

                  // Set preference
                  $config1['upload_path'] = 'image/mobil/'; 
                  $config1['allowed_types'] = '*';
                  $config1['max_size'] = '200000'; // max_size in kb
                  $config1['file_name'] = 'mobil_'.time();

                  //Load upload library
                  $this->load->library('upload',$config1); 
                  $this->upload->initialize($config1);

                  // File upload
                  if($this->upload->do_upload('file')){
                    // Get data about the file
                    $uploadData = $this->upload->data();
                    $filename = $uploadData['file_name'];
                    // Initialize array
                    $this->db->insert('gambar_mobil', array(
                        'id_mobil' => $id_mobil,
                        'gambar' => $filename,
                        'cover' => $retVal = ($i == 0) ? '1' : '0',
                    ));

                  } else {
                    log_data($_FILES);
                    log_r($this->upload->display_errors());
                  }
                }

            }

            

            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('mobil'));
        }
    }
    
    public function update($id) 
    {

        $row = $this->Mobil_model->get_by_id($id);

        if ($row) {
            $data = array(
                'judul_page' => 'mobil/mobil_form',
                'konten' => 'mobil/mobil_form',
                'button' => 'Update',
                'action' => site_url('mobil/update_action'),
		'id_mobil' => set_value('id_mobil', $row->id_mobil),
        'judul' => set_value('judul', $row->judul),
		'harga' => set_value('harga', $row->harga),
        'stok_awal' => set_value('stok_awal', $row->stok_awal),
        'deskripsi' => set_value('deskripsi', $row->deskripsi),
        'tampil_depan' => set_value('tampil_depan', $row->tampil_depan),
        'id_series' => set_value('id_series', $row->id_series),
        'id_type' => set_value('id_type', $row->id_type),
        'id_warna' => set_value('id_warna', $row->id_warna),
        'kecepatan' => set_value('kecepatan', $row->kecepatan),
        'transisi' => set_value('transisi', $row->transisi),
        'bahan_bakar' => set_value('bahan_bakar', $row->bahan_bakar),
        'kapasitas_bahan_bakar' => set_value('kapasitas_bahan_bakar', $row->kapasitas_bahan_bakar),
        'fitur_lain' => set_value('fitur_lain', $row->fitur_lain),
        'status' => set_value('status', $row->status),
		'brosur' => set_value('brosur', $row->brosur),
	    );
            $this->load->view('v_index', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mobil'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_mobil', TRUE));
        } else {
            $retVal = ($_FILES['brosur']['name'] == '') ? $_POST['brosur_old'] : upload_gambar_biasa('brosur', 'image/file/', 'pdf', 10000, 'brosur');
            if (strpos($retVal, '<p>') !== false) {
                $this->session->set_flashdata('message', alert_biasa($retVal,'error'));
                redirect('mobil/update/'.$this->input->post('id_mobil', TRUE),'refresh');
            }
            $data = array(
        'judul' => $this->input->post('judul',TRUE),
		'harga' => $this->input->post('harga',TRUE),
        'stok_awal' => $this->input->post('stok_awal',TRUE),
		'deskripsi' => $this->input->post('deskripsi',TRUE),
        'tampil_depan' => $this->input->post('tampil_depan',TRUE),
        'id_series' => $this->input->post('id_series',TRUE),
        'id_type' => $this->input->post('id_type',TRUE),
        'id_warna' => implode(',', $this->input->post('id_warna',TRUE)),
        'kecepatan' => $this->input->post('kecepatan',TRUE),
        'transisi' => $this->input->post('transisi',TRUE),
        'bahan_bakar' => $this->input->post('bahan_bakar',TRUE),
        'kapasitas_bahan_bakar' => $this->input->post('kapasitas_bahan_bakar',TRUE),
        'fitur_lain' => $this->input->post('fitur_lain',TRUE),
        'status' => $this->input->post('status',TRUE),
        'brosur' => $retVal,
        'update_at' => get_waktu(),
	    );

            if ($_FILES['files']['name'][0] != '') {
                $this->db->where('id_mobil', $this->input->post('id_mobil'));
                $this->db->delete('gambar_mobil');
                // Count total files
                $countfiles = count($_FILES['files']['name']);

                // Looping all files
                for($i=0;$i<$countfiles;$i++){

                    if(!empty($_FILES['files']['name'][$i])){

                    // log_r($_FILES);

                      // Define new $_FILES array - $_FILES['file']
                      $_FILES['file']['name'] = $_FILES['files']['name'][$i];
                      $_FILES['file']['type'] = $_FILES['files']['type'][$i];
                      $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
                      $_FILES['file']['error'] = $_FILES['files']['error'][$i];
                      $_FILES['file']['size'] = $_FILES['files']['size'][$i];

                      // Set preference
                      $config1['upload_path'] = 'image/mobil/'; 
                      $config1['allowed_types'] = '*';
                      $config1['max_size'] = '20000'; // max_size in kb
                      $config1['file_name'] = 'mobil_'.time();

                      //Load upload library
                      $this->load->library('upload',$config1); 
                      $this->upload->initialize($config1); 

                      // File upload
                      if($this->upload->do_upload('file')){
                        // Get data about the file
                        $uploadData = $this->upload->data();
                        $filename = $uploadData['file_name'];
                        // Initialize array
                        $this->db->insert('gambar_mobil', array(
                            'id_mobil' => $this->input->post('id_mobil'),
                            'gambar' => $filename,
                            'cover' => $retVal = ($i == 0) ? '1' : '0',
                        ));

                      } else {
                        log_data($_FILES['files']);
                        log_r($this->upload->display_errors());
                      }
                    }
                }
            }

            $this->Mobil_model->update($this->input->post('id_mobil', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('mobil'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Mobil_model->get_by_id($id);

        if ($row) {
            //hapus brosur
            unlink('image/file/'.get_data('mobil','id_mobil',$id,'brosur'));
            $this->Mobil_model->delete($id);

            //hapus gambar
            foreach ($this->db->get_where('gambar_mobil', array('id_mobil'=>$id))->result() as $key => $value) {
                unlink('image/mobil/'.$value->gambar);
            }

            $this->db->where('id_mobil', $id);
            $this->db->delete('gambar_mobil');

            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('mobil'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mobil'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('judul', 'judul', 'trim|required');
	// $this->form_validation->set_rules('deskripsi', 'deskripsi', 'trim|required');

	$this->form_validation->set_rules('id_mobil', 'id_mobil', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Mobil.php */
/* Location: ./application/controllers/Mobil.php */
/* Please DO NOT modify this information : */
/* Generated by Boy Kurniawan 2020-10-03 05:26:25 */
/* https://jualkoding.com */