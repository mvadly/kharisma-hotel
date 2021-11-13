<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Claporan extends CI_Controller{
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
            // rooms
            'tamubooking' => $this->model->GetBCTJoin('where status="2" and status_ci="booked"')->num_rows(),
            'tamubookcnow' => $this->model->GetBCTJoin('where tgl_masuk="'.date('Y-m-d').'" and status="2" and status_ci="booked" and tipetamu="Booking" ')->result_array(),
            'tamubookrow' => $this->model->GetBCTJoin('where tgl_masuk="'.date('Y-m-d').'" and status="2" and status_ci="booked" and tipetamu="Booking" ')->num_rows(),
            'roomstersedia' => $this->model->GetDataCSedia('where status="0"')->num_rows(),
            'roomstotal' => $this->model->GetDataCSedia()->num_rows(),
            'tamucekinrooms' => $this->model->GetBCTJoin('where status="1" and tipetamu="Check In" and status_ci="checkin" ')->num_rows(),
            'cekout' => $this->model->GetBCTJoin('where status_ci="done" ')->num_rows(),

            'tcekout' => $this->model->GetBCTJoin('where tgl_keluar="'.date('Y-m-d').'" and status_ci="done" and status="1" '),




            'content' => 'admin/halaman/laporan/laporanmaster',
        );
        $this->load->view('admin/template/site', $data);
    }
    public function cetak_master(){
        $laporan1=$this->input->post('laporan1');
        switch ($laporan1) {
            case 'd_rooms':
                $data=array(
                    'title'=>'Data Rooms',
                    'print'=>'admin/halaman/laporan/printr',
                    'datact' => $this->model->GetDataCTJ(' order by kode_rooms asc')->result_array(),

                    );
                $this->load->view('admin/halaman/laporan/layout', $data);
                break;
            case 'd_tamu':
                $data=array(
                    'title'=>'Data Tamu',
                    'print'=>'admin/halaman/laporan/printdt',
                    'dtamu' => $this->model->GetDataTamu(' order by nama_tamu asc')->result_array(),

                    );
                $this->load->view('admin/halaman/laporan/layout', $data);
                break; 
            case 'd_fasilitas':
                $data=array(
                    'title'=>'Data Fasilitas',
                    'print'=>'admin/halaman/laporan/printf',
                    'dfas' => $this->model->GetFasilitas(' order by nama_fasilitas asc')->result_array()

                    );
                $this->load->view('admin/halaman/laporan/layout', $data);
                break; 
            default:
                $this->session->set_flashdata('error', 'Pilih Laporan yang akan dicetak!');
                redirect('admin/claporan');
                break;
        }
        
        
        
      
        
    }

    public function cetak_trans(){
        
        $laporan2=$this->input->post('laporan2');
        $dari=$this->input->post('dari');
        $ke=$this->input->post('ke');
        $data = array(
            'dari'=>$dari,
            'ke'=>$ke,
            
          
        );
        
        switch ($laporan2) {
            case 'd_bookingct_acc':
                $data['databooking'] = $this->model->GetBCTJoin(' where status_ci="booked" and tgl_masuk between "'.$dari.'" and "'.$ke.'"  order by tgl_keluar desc')->result_array();
                $data['dbacc'] = $this->model->GetBCTJoin(' where status_ci="booked" and tgl_masuk between "'.$dari.'" and "'.$ke.'"  order by tgl_keluar desc')->num_rows();
                $data['print']='admin/halaman/laporan/printbookacc';
                $data['title']='Booking Diterima';
                switch ($data['dbacc']) {
                    case null:
                    $this->session->set_flashdata('warning', 'Laporan Booking rooms diterima tidak ada!');
                redirect('admin/claporan');
                    break;
                    
                    default:
                        $this->load->view('admin/halaman/laporan/layout', $data);
                    break;
                }
                
                
                break;
            case 'd_bookingct_rjc':
                $data['databooking'] = $this->model->GetBCTJoin(' where status_ci="rejected" and tgl_masuk between "'.$dari.'" and "'.$ke.'"  order by tgl_keluar desc')->result_array();
                $data['dbrjc'] = $this->model->GetBCTJoin(' where status_ci="rejected" and tgl_masuk between "'.$dari.'" and "'.$ke.'"  order by tgl_keluar desc')->num_rows();
                $data['print']='admin/halaman/laporan/printbookrjc';
                $data['title']='Booking Ditolak';
                switch ($data['dbrjc']) {
                    case null:
                    $this->session->set_flashdata('warning', 'Laporan Booking Rooms ditolak tidak ada!');
                redirect('admin/claporan');
                    break;
                    
                    default:
                        $this->load->view('admin/halaman/laporan/layout', $data);
                    break;
                }

                
                break;

            case 'd_checkinct':
                $data['datacekin'] = $this->model->GetBCTJoin(' where status_ci="checkin" and tgl_masuk between "'.$dari.'" and "'.$ke.'"  order by tgl_keluar asc')->result_array();
                $data['dcic'] = $this->model->GetBCTJoin(' where status_ci="checkin" and tgl_masuk between "'.$dari.'" and "'.$ke.'"  order by tgl_keluar asc')->num_rows();
                $data['print']='admin/halaman/laporan/printcict';
                $data['title']='Check In';
                switch ($data['dcic']) {
                    case null:
                    $this->session->set_flashdata('warning', 'Laporan Check In tidak ada!');
                redirect('admin/claporan');
                    break;
                    
                    default:
                        $this->load->view('admin/halaman/laporan/layout', $data);
                    break;
                }

                
                break;
            case 'd_checkoutct':
                $data['datacekin'] = $this->model->GetBCTJoin(' where status_ci="done" and tgl_masuk between "'.$dari.'" and "'.$ke.'"  order by tgl_keluar asc')->result_array();
                $data['dcic'] = $this->model->GetBCTJoin(' where status_ci="done" and tgl_masuk between "'.$dari.'" and "'.$ke.'"  order by tgl_keluar asc')->num_rows();
                $data['fakturci'] = $this->model;
                $data['print']='admin/halaman/laporan/printcoct';
                $data['title']='Check Out';
                switch ($data['dcic']) {
                    case null:
                    $this->session->set_flashdata('warning', 'Laporan Check Out tidak ada!');
                redirect('admin/claporan');
                    break;
                    
                    default:
                        $this->load->view('admin/halaman/laporan/layout', $data);
                    break;
                }
                break;
            
            default:
                $this->session->set_flashdata('warning', 'Anda belum memilih laporan transaksi!');
                redirect('admin/claporan');
                break;
        }
        
    }
    
    


}
?>