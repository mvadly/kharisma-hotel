<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller{
    public function __construct(){
        parent::__construct();

    }

    // public function index(){
    //     $data = array(
    //         'kontent' => 'global/halaman/beranda',
    //     );
    //     $this->load->view('global/index', $data);
    // }
    public function index(){
       $data=array(
        'unit'=>$this->model->GetGC(' limit 3'),
        'fasilitas'=>$this->model->GetGF(' limit 3')
        );
        
        $this->load->view('umum/index',$data);
    }
    public function trackus(){
        
        $this->load->view('umum/trackus');
    }
    public function aboutus(){
        
        $this->load->view('umum/contact');
    }
    public function gallery(){
       $data = array(
                'title'=>'Gallery Room',
                'gambar' => $this->model->GetGC()->result_array()

        );
        
        $this->load->view('umum/gallery',$data);
    }

    public function galleryf(){
       $data = array(
                'title'=>'Gallery Facilities',
                'gambar' => $this->model->GetGF()->result_array()

        );
        
        $this->load->view('umum/gallery',$data);
    }
    public function promotion(){
       $data = array(

                'promosi' => $this->model->GetPromotion('order by tgl_post desc')->result_array()

        );
        
        $this->load->view('umum/promotion',$data);
    }
    

}
?>