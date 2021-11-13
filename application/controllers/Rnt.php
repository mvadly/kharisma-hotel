<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rnt extends CI_Controller{
    public function __construct(){
        parent::__construct();

    }


    public function index(){
        $data=array(
            'datarooms'=> $this->model->GetDataCT("")->result_array(),
            'tipe'=>$this->model->GetTipe()
            );

        
        
        $this->load->view('umum/rnt',$data);
    }
    

    

}
?>