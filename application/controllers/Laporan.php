<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Penjualan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        if (isset($_POST['proses'])) {    
            $data = array(
                'judul_page' => 'Laporan Penjualan',
                'konten' => 'penjualan/laporan'
            );
            $data['tampil_data_user_op']=$this->Penjualan_model->Tampil_data_user_op();
            $data['tampil_data_penjualan_lap']=$this->Penjualan_model->tampil_data_penjualan_lap();
            $this->load->view('v_index', $data);
        }else if (isset($_POST['cetak'])) {
            $data['tampil_data_penjualan_lap']=$this->Penjualan_model->tampil_data_penjualan_lap();
            $this->load->view('penjualan/cetak_lap_penjulan',$data);
        }else{
            $data = array(
                'judul_page' => 'Laporan Penjualan',
                'konten' => 'penjualan/laporan',
            'tanggal' => date('Y-m-d'),
            );
            $data['tampil_data_user_op']=$this->Penjualan_model->Tampil_data_user_op();
            $this->load->view('v_index', $data);
        }    
    }

    public function chart_data()
    {
        header('Content-Type: application/json');
        date_default_timezone_set('Asia/Jakarta');
        $tgl1=$this->input->post('tgl1');
        $tgl2=$this->input->post('tgl2');
        $data=$this->Penjualan_model->tampil_data_penjualan_lap_graf($tgl1,$tgl2)->result();
        
        echo json_encode($data);

    }




}

/* End of file Penjualan.php */
/* Location: ./application/controllers/Penjualan.php */
/* Please DO NOT modify this information : */
/* Generated by Boy Kurniawan 2022-07-26 17:55:06 */
/* https://jualkoding.com */