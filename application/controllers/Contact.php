<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller{
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
       
        
        $this->load->view('umum/contact');
    }
    public function trackUs(){
       
        
        $this->load->view('umum/trackus');
    }


    

}
?>