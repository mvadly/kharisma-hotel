<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Promotion extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form','url'));
        $this->load->library('form_validation');
        $this->load->library('upload');
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

        $data = array(
            'promosi' =>$this->model->GetPromotion()->result_array(),
            'content' =>  'admin/halaman/promotion/promotion',
        );
        $this->load->view('admin/template/site', $data);
    }

    
    public function simpan(){
        $config['upload_path'] = './assets/upload/promotion/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name'] = TRUE; //nama yang terupload nantinya
        // $this->upload->initialize($config);
        // echo $_FILES['buktip']['name'];
        // echo strip_tags($this->input->post('id_books')).'<br>';

        $this->upload->initialize($config);
        // if($this->upload->do_upload("file")){ //upload file
        //     $data = array('upload_data' => $this->upload->data()); //ambil file name yang diupload
 
        //     $judul= $this->input->post('judul'); //get judul image
        //     $image= $data['upload_data']['file_name']; //set file name ke variable image
             
        //     $result= $this->m_upload->simpan_upload($judul,$image); //kirim value ke model m_upload
        //     echo json_decode($result);
        // }
        if(!empty($_FILES['gambar']['name']))
        {
            if ($this->upload->do_upload('gambar'))
                {
                    $gbr = $this->upload->data();
                    $gambar=$gbr['file_name']; //Mengambil file name dari gambar yang diupload
                    $data=array(
                        'title_prm'=>$this->input->post("title_prm"),
                        'gambar'=>$gambar,
                        'tgl_post'=>date("Y-m-d H:i:s")
                        );
                    $result=$this->model->simpan('promosi',$data);
                    if ($result>0) {
                        $this->session->set_flashdata('sukses','Data berhasil disimpan');
                        redirect("admin/promotion");
                    }else{
                        $this->session->set_flashdata('error','Data gagal disimpan');
                        redirect("admin/promotion");
                    }
                    
                }else{
                    $this->session->set_flashdata('error','Gambar Gagal Upload. Gambar harus bertipe gif|jpg|png|jpeg|bmp');
                    redirect("admin/promotion");
                    
                }
                     
            }else{
                $this->session->set_flashdata('error','Gagal, gambar belum di pilih');
                redirect("admin/promotion");
                
        }
                
    }

    public function hapus_data($kode = 1){
        //$this->cek_hak();
        if ($this->uri->segment(3) == null){
            $this->session->set_flashdata('warning','Hapus data belum dilakukan');
            redirect('admin/promotion');
        }
        $prm = $this->model->GetPromotion("where id_prm = '$kode'")->row_array();
        $gambar = $prm['gambar'];

        $result1 = $this->model->Hapus('promosi',array('id_prm' => $kode));


        if ($result1 == 1){
            unlink('./assets/upload/promotion/'.$gambar);            
            $this->session->set_flashdata('sukses','Hapus data berhasil dilakukan');
            redirect('admin/promotion');
        }else{
            $this->session->set_flashdata('error','Hapus data gagal dilakukan');
            redirect('admin/promotion');
        }

    }


    

}
?>