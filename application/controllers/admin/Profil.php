<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form','url'));
        $this->load->library('form_validation');
        $this->cek_login();
        $this->cek_user();
        
    }

    private function cek_login(){
        if (!$this->session->userdata('ses_id')){
            $this->session->set_flashdata('error', 'Silahkan login terlebih dahulu');
            redirect('admin/login');
        }
    }

    public function cek_user(){
        if ($this->session->userdata('ses_level') != 'Manager'){
            $this->session->set_flashdata('error','Maaf anda tidak bisa masuk kehalaman tersebut');
            redirect('admin/dashboard');
        }
    }


    public function index()
    {
        $this->cek_user();
        $profil=$this->model->profil()->row_array();
        $data = array(
            'company_name'=>$profil['company_name'],
            'address'=>$profil['address'],
            'telp'=>$profil['telp'],
            'fax'=>$profil['fax'],
            'about'=>$profil['about'],
            'logo'=>$profil['logo'],
            'email'=>$profil['email'],
            'content' => 'admin/halaman/profil',
        );
        $this->load->view('admin/template/site', $data);
    }

    
    public function update_data(){
        
        if (!$_POST['update']){
            $this->session->set_flashdata('error','Update data belum dilakukan');
            redirect('admin/user');
        }
        $company_name = $this->input->post('company_name');
        $address = $this->input->post('address');
        $about = $this->input->post('about');
        $email = $this->input->post('email');
        $telp = $this->input->post('telp');
        $fax = $this->input->post('fax');
        $email = $this->input->post('email');
        if ($_FILES['file_upload']['name'] == null){
            $foto = $this->input->post('foto');
        }else{
            $foto = $_FILES['file_upload']['name'];
        }
        $config = array(
                'upload_path' => './assets/img/',
                'allowed_types' => 'gif|jpg|JPG|png|JPEG|pdf',
                'max_size' => '2048',
            );
            $this->load->library('upload', $config);
            $this->upload->do_upload('file_upload');
        $data = array(
            'company_name' => $company_name,
            'about' => $about,
            'address' => $address,
            'email' => $email,
            'logo' => $foto,
            'telp' => $telp,
            'fax' => $fax

        );
        $result = $this->model->Update('profil',$data,array('id'=>1));
        if ($result == 1){
            if ($_FILES['file_upload']['name'] != null){
                unlink('./assets/img/'.$this->input->post('foto'));
            }
            
            $this->session->set_flashdata('sukses','Update data berhasil dilakukan');
            redirect('admin/profil');
        }else{
            $this->session->set_flasdata('error','Update data gagal dilakukan');
            redirect('admin/profil');
        }
    }



    

}
