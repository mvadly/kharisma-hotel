<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dtbc extends CI_Controller{

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
        if ($this->session->userdata('ses_level') == 'Manager' or $this->session->userdata('ses_level') == 'Super Admin'){
            $this->session->set_flashdata('error','Maaf anda tidak bisa masuk kehalaman tersebut');
            redirect('admin/dashboard');
        }
    }
    public function cek_hak(){
        if ($this->session->userdata('ses_level') != 'Super Admin'){
            $this->session->set_flashdata('error','Maaf anda tidak bisa melakukan opsi ini');
            redirect('admin/dtbc');
        }
    }
         

    public function cek_pengunjung(){
        if ($this->session->userdata('ses_level') == 'Pengunjung'){
            $this->session->set_flashdata('error','Maaf anda tidak bisa masuk kehalaman tersebut');
            redirect('admin/halaman/datatamubooking/datatamubooking');
        }
    }

    public function index(){
        
        $data = array(
            $tgl='where tgl_masuk="'.date('Y-m-d').'"',
            'ses_level' => $this->session->userdata('ses_level'),
            'datatb' => $this->model->GetBCTJoin('')->result_array(),
            'content' => 'admin/halaman/datatamubooking/bookingrooms',
            
        );
        $this->load->view('admin/template/site', $data);
    }
    public function updatejadwalci(){
        

        $id_books = $this->input->post('id_books');
   
        $data= array(
            'tgl_masuk' => $this->input->post('tgl_masuk'),
            'tgl_keluar' => $this->input->post('tgl_keluar'),
        );

        $result = $this->model->Update('bookings',$data,array('id_books' => $id_books));

        if ($result){
            $this->session->set_flashdata('sukses', 'Update Jadwal Booking berhasil');
            redirect('admin/dtbc');
        }else{
            $this->session->set_flashdata('error', 'Update Jadwal Booking gagal');
            redirect('admin/dtbc');
        }
    }
    
    public function konf_book_ct(){

        
            $id_books = $this->input->post('id_books');
            $kode_rooms = $this->input->post('kode_rooms');
            $kode_tamu = $this->input->post('kode_tamu');

            $datac =array(
                'status' => '1',
                );
            $datat =array(
                'tipetamu' => 'Check In',
                );
            $datab =array(
                'status_ci' => 'checkin',
                );
            $this->model->Update('rooms',$datac,array('kode_rooms' => $kode_rooms));
            $this->model->Update('data_tamu',$datat,array('kode_tamu' => $kode_tamu));
            $this->model->Update('bookings',$datab,array('id_books' => $id_books));
            $this->session->set_flashdata('sukses', 'Konfirmasi booking berhasil');
            redirect('admin/dashboard');

    }
    public function accept_data(){
        
        if (!$_POST['update']){
            $this->session->set_flashdata('warning','Update data belum dilakukan');
            redirect('admin/dtbc');
        }
        $id_books = $this->input->post('id_books');
        $kode_rooms = $this->input->post('kode_rooms');
        $tgl_masuk = $this->input->post('tgl_masuk');
        $tgl_keluar = $this->input->post('tgl_keluar');
        $kode_tamu = $this->input->post('kode_tamu');
        $emailtamu = $this->input->post('email');

        $aksi = $this->input->post('aksi');
        switch ($aksi) {
            case 'terima':
                $data= array('status' => '2');
                $data2= array(
                    'tipetamu' => 'Booking',
                );
                $data3= array(
                    'status_ci' => 'booked',
                    'dp' => $this->input->post('dp'),
                );
                $result = $this->model->Update('rooms',$data,array('kode_rooms' => $kode_rooms));
                $result2 = $this->model->Update('data_tamu',$data2,array('kode_tamu' => $kode_tamu));
                $result3 = $this->model->Update('bookings',$data3,array('id_books' => $id_books));
                

                if (($result == 1) and ($result2 == 1) and ($result3 == 1) ){
                    


                    $this->session->set_flashdata('sukses', 'Booking Data Telah di verifikasi ke email tamu');
                    redirect('admin/dtbc');
                }else{
                    $this->session->set_flashdata('error', 'Booking data gagal diverifikasi');
                    redirect('admin/dtbc');
                }
                break;
            case 'tolak':
                $data3= array(
                    'status_ci' => 'rejected',
              
                );
                $result3 = $this->model->Update('bookings',$data3,array('id_books' => $id_books));

                if ($result3 == 1){
                    $this->session->set_flashdata('sukses', 'Reject booking berhasil');

                    redirect('admin/dtbc');
                }else{
                    $this->session->set_flashdata('error', 'Reject booking gagal diverifikasi');
                    redirect('admin/dtbc');
                }
                break;
            default:
                $this->session->set_flashdata('warning','Pilih aksi!');
                redirect('admin/dtbc');
                break;
        }
        
    }

    public function hapus_data($kode = 1){
        //$this->cek_hak();
        if ($this->uri->segment(3) == null){
            $this->session->set_flashdata('warning','Hapus data belum dilakukan');
            redirect('admin/dtbc');
        }
        $datatb = $this->model->GetBCTJoin("where id_books = '$kode'")->row_array();
        $buktip = $datatb['buktip'];
        $datat=array('tipetamu' =>'-');
        $datac=array('status'=>'0');
        $result1 = $this->model->Hapus('bookings',array('id_books' => $kode));
        $result2 = $this->model->update('data_tamu',$datat,array('kode_tamu' => $datatb['kode_tamu']));
        $result3 = $this->model->update('rooms',$datac,array('id_rooms' => $datatb['id_rooms']));

        if ($result1 == 1 && $result2 == 1 && $result3 == 1){
            unlink('./assets/upload/buktibayar/'.$buktip);            
            $this->session->set_flashdata('sukses','Hapus data berhasil dilakukan');
            redirect('admin/dtbc');
        }else{
            $this->session->set_flashdata('error','Hapus data gagal dilakukan');
            redirect('admin/dtbc');
        }

    }

    public function detail_data($kode = 0){
        
        if ($this->uri->segment(3) == null){
            $this->session->set_flashdata('warning','Anda belum memilih data untuk di edit');
            redirect('admin/dtbc');
        }

        
        $datatb = $this->model->GetBCTJoin("where id_books = '$kode' ")->row_array();

        $data = array(
                    'id_books' => $datatb['id_books'],
                    'tgl_masuk' => $datatb['tgl_masuk'],
                    'tgl_keluar' => $datatb['tgl_keluar'],
                    'buktip' => $datatb['buktip'],
                    'dp' => $datatb['dp'],
                    'kode_rooms' => $datatb['kode_rooms'],
                    'jml_kamar' => $datatb['jml_kamar'],
                    'lantai' => $datatb['lantai'],
                    'hargasewa' => $datatb['hargasewa'],  
                    'no_id' => $datatb['no_id'],
                    'kode_tamu' => $datatb['kode_tamu'],
                    'nama_tamu' => $datatb['nama_tamu'],
                    'jeniskelamin' => $datatb['jeniskelamin'],
                    'warganegara' => $datatb['warganegara'],
                    'tgl_lahir' => $datatb['tgl_lahir'],
                    'no_telp' => $datatb['no_telp'],
                    'email' => $datatb['email'],
                    'tipetamu' => $datatb['tipetamu'],
                    'status_ci' => $datatb['status_ci'],
                    'transby'=> $datatb['transby'],
                    'tipe_bayar'=>$datatb['tipe_bayar'],
                    'nominal'=>$datatb['nominal'],
                    

                    'content' => 'admin/halaman/datatamubooking/detail',
        );

        $this->load->view('admin/template/site',$data);

    }
    public function tambah_f($kode = 0){
        $datab = $this->model->GetBCTJoin("where id_books = '$kode'")->row_array();

        $data = array(
            'id_books' => $datab['id_books'],
            'detail_f' => $datab['detail_f'],
            'kode_tamu' => $datab['kode_tamu'],
            'dfas' => $this->model->GetFasilitas()->result_array(),
            'detailci' => $this->model->GetDetailCI("where id_detail_f='$datab[detail_f]'"),



            'content' => 'admin/halaman/datatamubooking/tambah_f',
        );

        $this->load->view('admin/template/site',$data);
    }

    function simpan_f() {
       $this->form_validation->set_rules('id_fasilitas[]', 'id_fasilitas', 'required|trim');   
       $this->form_validation->set_rules('qty[]', 'qty', 'required|trim');
       $this->form_validation->set_rules('harga[]', 'harga', 'required|trim');
       $id = $this->input->post('id_fasilitas');
        $id_books = $this->input->post('id_books');
        $df = $this->input->post('detail_f');

       // $this->form_validation->set_rules('totalf[]', 'totalf', 'required|trim');
       
       if ($this->form_validation->run() == FALSE){
        $this->session->set_flashdata('warning','Anda belum menambahkan fasilitas');
        redirect('admin/dtbc/tambah_f/'.$id_books);
       }else{
        
        
        // $id_detail = 'F'.date('Ydmhs');
        $result = array();
        foreach($id AS $key => $val){
         $result[] = array(
            'id_detail_f'=> $df,
            'id_fasilitas'  => $_POST['id_fasilitas'][$key],
            'qty'  => $_POST['qty'][$key],
            'totalf'  => $_POST['harga'][$key]*$_POST['qty'][$key],
 
         );
        }

        $test= $this->db->insert_batch('detail_f', $result); // fungsi dari codeigniter untuk menyimpan multi array
    
        if($test){
         $this->session->set_flashdata('sukses','penambahan fasilitas berhasil');
            redirect('admin/dtbc/tambah_f/'.$id_books);
           }else{
             $this->session->set_flashdata('warning','Anda gagal');
            redirect('admin/dtbc');
        }
       }
      } 
    public function hapus_f($kode = 1){
        $book = $this->input->get("get");      
        $result = $this->model->Hapus('detail_f',array('id' => $kode));


        if ($result == 1){
            
            $this->session->set_flashdata('sukses','Hapus data berhasil dilakukan');
            redirect('admin/dtbc/tambah_f/'.$book);
            
        }else{
            $this->session->set_flashdata('error','Hapus data gagal dilakukan');
            redirect('admin/dtbc/tambah_f/'.$book);
            
        }

    }

    public function checkout($kode = 1){
        if ($this->uri->segment(3) == null){
            $this->session->set_flashdata('warning','checkout belum dilakukan');
            redirect('admin/dtbc');
        }
        $datatb = $this->model->GetBCTJoin("where id_books = '$kode'")->row_array();
        $datab=array( 'status_ci'=>'done');
        $datat=array('tipetamu' =>'-');
        $datac=array('status'=>'0');

        $resultb = $this->model->update('bookings',$datab,array('id_books' => $kode));
        $resultt = $this->model->update('data_tamu',$datat,array('kode_tamu' => $datatb['kode_tamu']));
        $resultc = $this->model->update('rooms',$datac,array('kode_rooms' => $datatb['kode_rooms']));

        if (($resultb == 1) && ($resultt == 1) && ($resultc == 1)){        
            $this->session->set_flashdata('sukses','Checkout berhasil dilakukan');
            redirect('admin/dtbc');
        }else{
            $this->session->set_flashdata('error','Checkout gagal dilakukan');
            redirect('admin/dtbc');
        }

    }

        function cetak_cekin($kode = 0){

        $fakturci = $this->model->GetBCTJoin("where id_books='$kode'")->row_array();
        $data = array(
            'id_books'=>$fakturci['id_books'],
            'kode_tamu'=>$fakturci['kode_tamu'],
            'nama_tamu'=>$fakturci['nama_tamu'],
            'kode_rooms'=>$fakturci['kode_rooms'],
            'jml_kamar'=>$fakturci['jml_kamar'],
            'lantai'=>$fakturci['lantai'],
            'hargasewa' => $fakturci['hargasewa'],
            'tgl_masuk' => $fakturci['tgl_masuk'],
            'tgl_keluar' => $fakturci['tgl_keluar'],
            'tipe' => $fakturci['tipe'],
            'nominal' => $fakturci['nominal'],
        );
        $this->load->view('admin/halaman/datatamubooking/fakturci', $data);

        }

        function cetak_co($kode = 0){

        $fakturci = $this->model->GetBCTJoin("where id_books='$kode'")->row_array();
        
        $data = array(
            'id_books'=>$fakturci['id_books'],
            'kode_tamu'=>$fakturci['kode_tamu'],
            'nama_tamu'=>$fakturci['nama_tamu'],
            'kode_rooms'=>$fakturci['kode_rooms'],
            'jml_kamar'=>$fakturci['jml_kamar'],
            'lantai'=>$fakturci['lantai'],
            'hargasewa' => $fakturci['hargasewa'],
            'tgl_masuk' => $fakturci['tgl_masuk'],
            'tgl_keluar' => $fakturci['tgl_keluar'],
            'tipe' => $fakturci['tipe'],
            'nominal' => $fakturci['nominal'],

          
            'fakturci' => $this->model->GetDetailCI("where id_detail_f='$fakturci[detail_f]'"),


        );
        $this->load->view('admin/halaman/datatamubooking/fakturco', $data);

        }
}
?>