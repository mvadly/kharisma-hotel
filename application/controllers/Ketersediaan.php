<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ketersediaan extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form','url'));
        $this->load->library('form_validation');


    }

    

    public function index(){
        
        $tgl_masuk = $this->input->post('tgl_masuk');
        $tgl_keluar = $this->input->post('tgl_keluar');
        $adult = $this->input->post('adult');
        $this->session->set_userdata('adult',$adult);
        $child = $this->input->post('child');
        $this->session->set_userdata('child',$child);
        $lama = $this->input->post('lama');
        $kamar = $this->input->post('kamar');
        $lantai = $this->input->post('lantai');
        $data=array(
            'tgl_masuk'=>$tgl_masuk,
            'tgl_keluar'=>$tgl_keluar,
            'lama'=>$lama,
            
            );
        if (!$tgl_masuk || !$tgl_keluar || !$lama || !$kamar || !$lantai ) {
            $this->session->set_flashdata('error','anda belum melakukan reservasi, silahkan melakukan reservasi pada halaman awal ');
            redirect("");
        }
        $link='<a href="./gallery">Ini</a>';
        $this->rooms();
                    

            
   
    }
    
    public function cari(){
        $idc=$this->input->post("idc");
        $tgl_masuk=$this->input->post("tgl_masuk");
        $tgl_keluar=$this->input->post("tgl_keluar");
        $book1=$this->model->GetBCTJoin('where status_ci="booked" and
            id_rooms="'.$idc.'"  and 
            tgl_masuk between "'.$tgl_masuk.'" and "'.$tgl_keluar.'"')->num_rows();
        $book2=$this->model->GetBCTJoin('where status_ci="booked" and
            id_rooms="'.$idc.'"  and 
            tgl_keluar = "'.$tgl_masuk.'" and "'.$tgl_keluar.'"')->num_rows();
        $bisa="<span class='fa fa-check' style='font-size:100px'></span>
                <p id='psn'>Anda bisa booking</p>";
        $gabisa="<span class='fa fa-minus-circle' style='font-size:100px'></span>
                <p id='psn'>Maaf room yang anda pilih saat ini tidak bisa dibooking dari tanggal ".date('d-m-Y',strtotime($tgl_masuk))." sampai dengan ".date('d-m-Y',strtotime($tgl_keluar)).". silahkan cari Room yang tersedia sesuai dengan waktu yang anda jadwalkan. Terima kasih </p>";
        if (($book1==0) and ($book2==0) ) {
            echo $bisa;
        }else{
            echo $gabisa;
        }
        //echo $book1.' - '.$book2;
        

    }

    public function rooms(){
        $reservasi = $this->input->post('reservasi');
        $tgl_masuk = $this->input->post('tgl_masuk');
        $tgl_keluar = $this->input->post('tgl_keluar');
        $adult = $this->input->post('adult');
        $child = $this->input->post('child');
        $lama = $this->input->post('lama');
        $kamar = $this->input->post('kamar');
        $lantai = $this->input->post('lantai');
        $mtipe = $this->model->GetTipe()->result_array();

        $weekday= array('Mon','Tue','Wed','Thu','Fri');
        $weekend= array('Sat','Sun');
        $hari=date('D',strtotime($tgl_masuk));
                      
        foreach ($weekday as $k) {
            
            if ($hari==$k) {
                $tipe = "Weekday";
            }
        }
        foreach ($weekend as $v) {
            if ($hari==$v){
                $tipe = "Weekend";
            }                            
        }
        $harga=0;
        foreach ($mtipe as $key) {
            if ($tipe==$key['tipe_bayar']) {
                $harga = $key['nominal'];
            }
        }

        $this->session->set_userdata("tipe",$tipe);

        $data=array(
            'tgl_masuk'=>$tgl_masuk,
            'tgl_keluar'=>$tgl_keluar,
            'lama'=>$lama,
            'tipebook'=>$tipe,
            'nominal'=>$harga,
            'tipe'=>$this->model->GetTipe()
            );
        $link='<a href="./gallery">Ini</a>';
        

        $data['roomstersedia']= $this->model->GetDataCT("where lantai=$lantai AND jml_kamar=$kamar AND status='0' OR status='2'  ")->num_rows();

        switch ($data['roomstersedia'] ) {
                case 0:
                    $this->session->set_flashdata('error','rooms tidak tersedia untuk tanggal '.$tgl_masuk.' sampai '.$tgl_keluar);
                    redirect('');

                    break;
                default:   

                    $data['datarooms']= $this->model->GetDataCT("where lantai=$lantai AND jml_kamar=$kamar AND status='0' OR status='2'   ")->result_array();
                    $data['dtg']= $this->model;

                    if ($data['roomstersedia']<1) {
                        $this->session->set_flashdata('error','rooms tidak tersedia untuk tanggal '.$tgl_masuk.' sampai '.$tgl_keluar.' klik '.$link);
                        redirect('');
                    }else{
                    $this->load->view('umum/brooms',$data);
                    }
                    

            }
        
    }


    public function tampilbc(){
        $tipe='weekday';
        $hari=array('Sun','Mon','Tue','Wed','Thu','Fri','Sat');

    }


    
}
?>