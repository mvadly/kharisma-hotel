<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Packages extends CI_Controller{
    public function __construct(){
        parent::__construct();

    }


    public function index(){
        $data=array(
            'paket'=> $this->model->GetGF(" group by id_fasilitas")->result_array(),
            );

        
        
        $this->load->view('umum/packages',$data);
    }
    

    

}
?>