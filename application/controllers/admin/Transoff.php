<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transoff extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->cek_login();
        $this->load->helper(array('form','url'));
        $this->load->library('form_validation');
    }

    private function cek_login(){
        if (!$this->session->userdata('ses_id')){
            $this->session->set_flashdata('error', 'Silahkan login terlebih dahulu');
            redirect('admin/login');
        }
    }

    public function cek_user(){
        if ($this->session->userdata('ses_level') == 'Manager' or $this->session->userdata('ses_level') == 'Super Admin'){
            $this->session->set_flashdata('error','Maaf anda tidak bisa masuk kehalaman tersebut');
            redirect('admin/dashboard');
        }
    }

    public function cek_pengunjung(){
        if ($this->session->userdata('ses_level') == 'Pengunjung'){
            $this->session->set_flashdata('error','Maaf anda tidak bisa masuk kehalaman tersebut');
            redirect('admin/dashboard');
        }
    }

    public function index(){
        $this->cek_user();
        $data = array(
            'ses_level' => $this->session->userdata('ses_level'),
            'datatamu' => $this->model->GetDataTamu('where tipetamu="-" order by nama_tamu asc')->result_array(),
            'dataCT' => $this->model->GetDataCT('where status="0"')->result_array(),
            'tipe' => $this->model->GetTipe()->result_array(),
            'content' => 'admin/transaksi/transoff',

            
        );
        $this->load->view('admin/template/site', $data);
    }

    public function simpan_data(){
        $this->cek_user();
        if (!$_POST['simpan']){
            $this->session->set_flashdata('warning', 'Tambah data belum dilakukan');
            redirect('admin/transoff');
        }
        $id_books = 'B'.date('dmyhs');
        $detail_f = date('ymsihd');
        $transby='admin';
        $cek_kode = $this->model->GetBCTJoin("where id_books = '$id_books' || detail_f = '$detail_f' ")->num_rows();
        if ($cek_kode > 0){
            $this->session->set_flashdata('warning', 'Data sudah ada');
            redirect('admin/transoff');
        }
            

            $kode_tamu = $this->input->post('kode_tamu');
            $kode_rooms = $this->input->post('kode_rooms');
            $kode_kamar = $this->input->post('kode_kamar');
            $data = array(
                'id_books' => $id_books,
                'detail_f' => $detail_f,
                'kode_tamu' => $this->input->post('kode_tamu'),
                'kode_rooms' => $this->input->post('kode_rooms'),
                'tgl_masuk' => $this->input->post('tgl_masuk'),
                'tgl_keluar' => $this->input->post('tgl_keluar'),
                'adult' => $this->input->post('adult'),
                'child' => $this->input->post('child'),
                'dp' => null,
                'buktip' => null,
                'pcode' => null,
                'transby' => $transby,
                'status_ci'=> 'checkin'
      
            );
            $datac =array(
                'status' => '1',
                );
            $datat =array(
                'tipetamu' => 'Check In',
                );
            $this->model->Simpan('bookings', $data);
            $this->model->Update('data_tamu',$datat,array('kode_tamu' => $kode_tamu));
            $this->model->Update('rooms',$datac,array('kode_rooms' => $kode_rooms));
            $this->session->set_flashdata('sukses', 'Simpan data berhasil dilakukan');
            redirect('admin/transoff');
        
        
    }




}
?>