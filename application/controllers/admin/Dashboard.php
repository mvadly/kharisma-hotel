<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->cek_login();
        date_default_timezone_set('Asia/Jakarta');
    }

    private function cek_login(){
        if (!$this->session->userdata('ses_id')){
            $this->session->set_flashdata('error','Silahkan login terlebih dahulu');
            redirect('admin/login');
        }
    }

    public function index(){
        

        $data = array(
            // rooms
            'tamubooking' => $this->model->GetBCTJoin('where status="2" and status_ci="booked"')->num_rows(),
            'tamubookcnow' => $this->model->GetBCTJoin('where tgl_masuk="'.date('Y-m-d').'" and status="2" and status_ci="booked" and tipetamu="Booking" ')->result_array(),
            'tamubookrow' => $this->model->GetBCTJoin('where tgl_masuk="'.date('Y-m-d').'" and status="2" and status_ci="booked" and tipetamu="Booking" ')->num_rows(),
            'roomstersedia' => $this->model->GetDataCT('where status="0"')->num_rows(),
            'roomstotal' => $this->model->GetDataCT()->num_rows(),
            'tamucekinrooms' => $this->model->GetBCTJoin('where status="1" and tipetamu="Check In" and status_ci="checkin" ')->num_rows(),
            'cekout' => $this->model->GetBCTJoin('where status_ci="done" ')->num_rows(),

            'tcekout' => $this->model->GetBCTJoin('where tgl_keluar="'.date('Y-m-d').'" and status_ci="checkin" and status="1" '),

            'sumsalesM' => $this->model->GetSumSalesM()->row_array(), 
            'sumsalesD' => $this->model->GetSumSalesD()->row_array(),
            'TFSum_M' => $this->model->GetTFSum()->row_array(),
            'TFSum_D' => $this->model->GetTFSumD()->row_array(),


            'content' => 'admin/template/dashboard',
        );
        $this->load->view('admin/template/site', $data);
    }
    public function konf_book_ct(){
        if (!$_POST['checkin']) {
            $this->session->set_flashdata('sukses', 'checkin blm dilakukan ');
            redirect('admin/dashboard');
            
        }
        $id_books = $this->input->post('id_books');
        $kode_tamu = $this->input->post('kode_tamu');
        $id_books = $this->input->post('id_books');
        $kode_rooms = $this->input->post('kode_rooms');

        $datac =array(
            'status' => '1',
            );
        $datat =array(
            'tipetamu' => 'Check In',
            );
        $datab =array(
            'status_ci' =>'checkin',
            );
        $this->model->Update('rooms',$datac,array('kode_rooms' => $kode_rooms));
        $this->model->Update('data_tamu',$datat,array('kode_tamu' => $kode_tamu));
        $this->model->Update('bookings',$datab,array('id_books' => $id_books));
        $this->session->set_flashdata('sukses', 'Konfirmasi checkin room '.$kode_rooms.' berhasil');
        redirect('admin/dashboard');
        
        
    }

    public function checkout(){
        if (!$_POST['cekout']) {
            $this->session->set_flashdata('sukses', 'cekout blm dilakukan ');
            redirect('admin/dashboard');
            
        }
        $id_books = $this->input->post('id_books');
        $kode_tamu = $this->input->post('kode_tamu');
        $id_books = $this->input->post('id_books');
        $kode_rooms = $this->input->post('kode_rooms');

        $datac =array(
            'status' => '0',
            );
        $datat =array(
            'tipetamu' => '-',
            );
        $datab =array(
            'status_ci' =>'done',
            );
        $this->model->Update('rooms',$datac,array('kode_rooms' => $kode_rooms));
        $this->model->Update('data_tamu',$datat,array('kode_tamu' => $kode_tamu));
        $this->model->Update('bookings',$datab,array('id_books' => $id_books));
        $this->session->set_flashdata('sukses', 'Konfirmasi checkout rooms room '.$kode_rooms.' berhasil');
        redirect('admin/dashboard');
        
        
    }
    public function hasil(){
        function ambil_ip() {
        foreach (array('HTTP_CLIENT_IP', 'HTTP_X_REAL_IP', 'REMOTE_ADDR', 'HTTP_FORWARDED_FOR', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED') as $key) {
            if (array_key_exists($key, $_SERVER) === true) {
              foreach (explode(',', $_SERVER[$key]) as $ip) {
                if (filter_var($ip, FILTER_VALIDATE_IP) !== false) {
                  return $ip;
                }
              }
            }
          }
        }

        echo ambil_ip();

    }

    


}
?>