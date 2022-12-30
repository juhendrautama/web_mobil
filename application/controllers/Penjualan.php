<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Penjualan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Penjualan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'penjualan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'penjualan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'penjualan/index.html';
            $config['first_url'] = base_url() . 'penjualan/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Penjualan_model->total_rows($q);
        $penjualan = $this->Penjualan_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'penjualan_data' => $penjualan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'judul_page' => 'Data Penjualan',
            'konten' => 'penjualan/penjualan_list',
        );
        $this->load->view('v_index', $data);
    }

    public function read($id) 
    {
        $row = $this->Penjualan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_penjualan' => $row->id_penjualan,
		'kode_transaksi' => $row->kode_transaksi,
		'tanggal' => $row->tanggal,
		'tipe_pembayaran' => $row->tipe_pembayaran,
		'id_mobil' => $row->id_mobil,
		'created_at' => $row->created_at,
		'user_at' => $row->user_at,
	    );
            $this->load->view('penjualan/penjualan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('penjualan'));
        }
    }

    public function create() 
    {
        date_default_timezone_set('Asia/Jakarta');
        $data = array(
            'judul_page' => 'Data Penjualan',
            'konten' => 'penjualan/penjualan_form',
            'button' => 'Create',
            'action' => site_url('penjualan/create_action'),
	    'id_penjualan' => set_value('id_penjualan'),
	    'kode_transaksi' => "TRX".date('dmYHi'),
	    'tanggal' => date('Y-m-d'),
        'id_konsumen' => set_value('id_konsumen'),
	    'tipe_pembayaran' => set_value('tipe_pembayaran'),
	    'id_mobil' => set_value('id_mobil'),
	    'created_at' => set_value('created_at'),
	    'user_at' => set_value('user_at'),
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
		'kode_transaksi' => $this->input->post('kode_transaksi',TRUE),
		'tanggal' => $this->input->post('tanggal',TRUE),
        'id_konsumen' => $this->input->post('id_konsumen',TRUE),
		'tipe_pembayaran' => $this->input->post('tipe_pembayaran',TRUE),
		'id_mobil' => $this->input->post('id_mobil',TRUE),
		'created_at' => $this->input->post('created_at',TRUE),
		'user_at' => $this->input->post('user_at',TRUE),
	    );

        $id_mobil=$this->input->post('id_mobil');
        $stok_lama=$this->Penjualan_model->stok_lama($id_mobil);
        $stok_awal= $stok_lama->stok_awal;
        $stok_keluar= $stok_lama->stok_keluar;
        $hasil_stok=$stok_awal-$stok_keluar;


            if($hasil_stok==0){?> 
                    <script type="text/javascript">
                            alert('STOK HABIS');
                            window.location= window.location="<?php echo base_url() ?>Penjualan";
                        </script>
                    <?php 
            }else{
                $hasil_kurang=$this->Penjualan_model->Kurang_stok($id_mobil,$hasil_stok);
                if ($hasil_kurang) {
                $this->Penjualan_model->insert($data);
                $this->session->set_flashdata('message', 'Create Record Success');
                redirect(site_url('penjualan'));
                }else{
                    echo"kurang stok gagal";
                }

            }
        }
    }
    
    public function update($id) 
    {
        $row = $this->Penjualan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'judul_page' => 'Data Penjualan',
                'konten' => 'penjualan/penjualan_form',
                'button' => 'Update',
                'action' => site_url('penjualan/update_action'),
		'id_penjualan' => set_value('id_penjualan', $row->id_penjualan),
		'kode_transaksi' => set_value('kode_transaksi', $row->kode_transaksi),
		'tanggal' => set_value('tanggal', $row->tanggal),
        'id_konsumen' => set_value('id_konsumen', $row->id_konsumen),
		'tipe_pembayaran' => set_value('tipe_pembayaran', $row->tipe_pembayaran),
		'id_mobil' => set_value('id_mobil', $row->id_mobil),
		'created_at' => set_value('created_at', $row->created_at),
		'user_at' => set_value('user_at', $row->user_at),
	    );
            $this->load->view('v_index', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('penjualan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_penjualan', TRUE));
        } else {
            $data = array(
		'kode_transaksi' => $this->input->post('kode_transaksi',TRUE),
		'tanggal' => $this->input->post('tanggal',TRUE),
        'id_konsumen' => $this->input->post('id_konsumen',TRUE),
		'tipe_pembayaran' => $this->input->post('tipe_pembayaran',TRUE),
		'id_mobil' => $this->input->post('id_mobil',TRUE),
		'created_at' => $this->input->post('created_at',TRUE),
		'user_at' => $this->input->post('user_at',TRUE),
	    );

            $this->Penjualan_model->update($this->input->post('id_penjualan', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('penjualan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Penjualan_model->get_by_id($id);

        if ($row) {
            $this->Penjualan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('penjualan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('penjualan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('kode_transaksi', 'kode transaksi', 'trim|required');
	$this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');
	$this->form_validation->set_rules('tipe_pembayaran', 'tipe pembayaran', 'trim|required');
	$this->form_validation->set_rules('id_mobil', 'id mobil', 'trim|required');
	$this->form_validation->set_rules('created_at', 'created at', 'trim|required');
	$this->form_validation->set_rules('user_at', 'user at', 'trim|required');

	$this->form_validation->set_rules('id_penjualan', 'id_penjualan', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Penjualan.php */
/* Location: ./application/controllers/Penjualan.php */
/* Please DO NOT modify this information : */
/* Generated by Boy Kurniawan 2022-07-26 17:55:06 */
/* https://jualkoding.com */