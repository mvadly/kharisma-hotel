<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengaturan extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->cek_login();
    }

    private function cek_login(){
        if (!$this->session->userdata('ses_id')){
            $this->session->set_flashdata('error','Silahkan login terlebih dahulu');
            redirect('admin/login');
        }
    }
    public function cek_user(){
        if (($this->session->userdata('ses_level') == 'Super Admin') or ($this->session->userdata('ses_level') == 'Front Office')){
            $this->session->set_flashdata('error','Maaf anda tidak bisa masuk kehalaman tersebut');
            redirect('admin/dashboard');
        }
    }

    public function index(){
        $this->cek_user();
        $data = array(

            'content' => 'admin/halaman/pengaturan',
        );
        $this->load->view('admin/template/site', $data);
    }
    public function hapus_cico(){
        $this->model->HapusCICO();
        $this->session->set_flashdata('sukses','Seluruh data Check In dan Check Out telah dihapus');
        redirect('admin/pengaturan');
    }
    public function hapus_book(){
        $this->model->HapusBOOK();
        $this->session->set_flashdata('sukses','Seluruh data Booking telah dihapus');
        redirect('admin/pengaturan');
    }
    public function kosong_KH(){
        $this->model->KosongKH();
        $this->session->set_flashdata('sukses','Seluruh status data kamar hotel telah dikosongkan');
        redirect('admin/pengaturan');
    }
    public function kosong_CT(){
        $this->model->KosongCT();
        $this->session->set_flashdata('sukses','Seluruh status data cottage telah dikosongkan');
        redirect('admin/pengaturan');
    }

    


}
?>