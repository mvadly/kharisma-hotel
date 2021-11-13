<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Drooms extends CI_Controller{

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
        if ($this->session->userdata('ses_level') == 'Front Office' or $this->session->userdata('ses_level') == 'Manager'){
            $this->session->set_flashdata('error','Maaf anda tidak bisa masuk kehalaman tersebut');
            redirect('admin/Drooms');
        }
    }

    public function cek_pengunjung(){
        if ($this->session->userdata('ses_level') == 'Pengunjung'){
            $this->session->set_flashdata('error','Maaf anda tidak bisa masuk kehalaman tersebut');
            redirect('admin/login');
        }
    }

    public function index(){
        $data = array(
            'ses_level' => $this->session->userdata('ses_level'),
            'dataCT' => $this->model->GetDataCT('order by kode_rooms asc')->result_array(),
            'datagambar' => $this->model->GetDataGambar('order by id_gambar asc')->result_array(),
            'content' => 'admin/halaman/datarooms/datarooms',
            
        );
        $this->load->view('admin/template/site', $data);
    }

    public function simpan_data(){
        if (!$_POST['simpan']){
            $this->session->set_flashdata('warning', 'Tambah data belum dilakukan');
            redirect('admin/Drooms');
        }
        $cek_kode = $this->model->GetDataCT("where kode_rooms = '$kode_rooms'")->num_rows();
        if ($cek_kode > 0){
            $this->session->set_flashdata('warning', 'Data sudah ada');
            redirect('admin/Drooms');
        }else {
            $id_gambar=date('ymdHis');


            $data = array(
                
                'kode_rooms' => $this->input->post('kode_rooms'),
                'jml_kamar' => $this->input->post('jml_kamar'),
                'lantai' => $this->input->post('lantai'),
                'hargasewa' => $this->input->post('hargasewa'),
                'status' => '0',
                'id_gambar' => $id_gambar,
                
            );
            $this->model->Simpan('rooms', $data);
            $this->session->set_flashdata('sukses', 'Simpan data berhasil dilakukan');
            redirect('admin/Drooms');
        }
    }

    public function edit_data($kode = 0){
        
        if ($this->uri->segment(3) == null){
            $this->session->set_flashdata('warning','Anda belum memilih data untuk di edit');
            redirect('admin/Drooms');
         }
        $datarooms = $this->model->GetDataCT("where kode_rooms = '$kode'")->row_array();
        $data = array(
            'datagambar' => $this->model->GetDataGambar('order by id_gambar asc')->result_array(),
            'datarooms' => $this->model->GetDataCTJ()->result_array(),
            'id_rooms' => $datarooms['id_rooms'],
            'kode_rooms' => $datarooms['kode_rooms'],
            'jml_kamar' => $datarooms['jml_kamar'],
            'lantai' => $datarooms['lantai'],
            'hargasewa' => $datarooms['hargasewa'],

            'content' => 'admin/halaman/datarooms/edit',
        );
        $this->load->view('admin/template/site',$data);
    }
    public function tambah_gambar($kode = 0){
        
        if ($this->uri->segment(3) == null){
            $this->session->set_flashdata('warning','Anda belum memilih rooms untuk tambah gambar');
            redirect('admin/Drooms');
         }
        $datarooms = $this->model->GetDataCT("where id_gambar = '$kode'")->row_array();
        $data = array(
            'datagambar' => $this->model,
            //'datarooms' => $this->model->GetDataCT()->result_array(),
            'kode_rooms' => $datarooms['kode_rooms'],
            'jml_kamar' => $datarooms['jml_kamar'],
            'hargasewa' => $datarooms['hargasewa'],
            'id_gambar' => $datarooms['id_gambar'],

            'content' => 'admin/halaman/datarooms/tambahgambar',
        );
        $this->load->view('admin/template/site',$data);
    }

    public function hapus_gambar($kode = 1){
        if ($this->uri->segment(3) == null){
            $this->session->set_flashdata('warning','Hapus data belum dilakukan');
            redirect('admin/Drooms');
        }
        $kode_rooms=$this->input->Get("kc");
        $datarooms = $this->model->GetDataGambar("where id_g = '$kode'")->row_array();
        $result = $this->model->Hapus('data_gambar',array('id_g' => $kode));

        if ($result == 1){
            unlink('./assets/upload/gambar/'.$datarooms['gambar']);
            
            $this->session->set_flashdata('sukses','Hapus data berhasil dilakukan');
            redirect('admin/Drooms/tambah_gambar/'.$datarooms['id_gambar']);
        }else{
            $this->session->set_flashdata('error','Hapus data gagal dilakukan');
            redirect('admin/Drooms');
        }

    }

    public function update_data(){
        if (!$_POST['update']){
            $this->session->set_flashdata('warning','Update data belum dilakukan');
            redirect('admin/Drooms');
        }
        $kode_rooms = $this->input->post('kode_rooms');
        $jml_kamar = $this->input->post('jml_kamar');
        $hargasewa = $this->input->post('hargasewa');
        
        $data= array(
            'jml_kamar' => $this->input->post('jml_kamar'),
            'lantai' => $this->input->post('lantai'),
            'hargasewa' => $this->input->post('hargasewa'),
        
        );

       

        $result = $this->model->Update('rooms',$data,array('kode_rooms' => $kode_rooms));

        if ($result == 1){
            
            $this->session->set_flashdata('sukses', 'Update data berhasil dilakukan');
            redirect('admin/Drooms');
        }else{
            $this->session->set_flashdata('error', 'Update data gagal dilakukan');
            redirect('admin/Drooms');
        }
    }

    public function hapus_data($kode = 1){
        if ($this->uri->segment(3) == null){
            $this->session->set_flashdata('warning','Hapus data belum dilakukan');
            redirect('admin/Drooms');
        }
        $datarooms = $this->model->GetDataCT("where kode_rooms = '$kode'")->row_array();
        $result = $this->model->Hapus('rooms',array('kode_rooms' => $kode));

        if ($result == 1){
            
            $this->session->set_flashdata('sukses','Hapus data berhasil dilakukan');
            redirect('admin/Drooms');
        }else{
            $this->session->set_flashdata('error','Hapus data gagal dilakukan');
            redirect('admin/Drooms');
        }

    }

   
}
?>