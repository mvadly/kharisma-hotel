<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bresave extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form','url'));
        $this->load->library('form_validation');


    }
    private function hapus_session(){
        $this->session->unset_userdata('adult');
        $this->session->unset_userdata('child');
        $this->session->unset_userdata('tipe');
    }

    public function savebook(){
        $no_id = $this->input->post('no_id');
        if ($no_id==null) {
            $this->session->set_flashdata('error', 'Ulangi dari awal');
            redirect('');
        }
        $id_books = $this->input->post('booksid');
        $detail_f = date('ymsihd');
        $kode_tamu = 'T'.date('0dhism');
        $kode_rooms=$this->input->post('kode_rooms');
        $tgl_masuk=$this->input->post('tgl_masuk');
        $tgl_keluar=$this->input->post('tgl_keluar');
        $pcode=$this->input->post('code');

        $book1=$this->model->GetCheckBCT('where status_ci="booked" and
            kode_rooms="'.$kode_rooms.'"  and 
            tgl_masuk between "'.$tgl_masuk.'" and "'.$tgl_keluar.'"')->num_rows();
        $book2=$this->model->GetCheckBCT('where status_ci="booked" and
            kode_rooms="'.$kode_rooms.'"  and 
            tgl_keluar = "'.$tgl_masuk.'" and "'.$tgl_keluar.'"')->num_rows();

        if (($book1>0) or ($book2>0)) {
            $this->session->set_flashdata('error', ' Mohon Maaf rooms yang anda pesan tidak bisa dibooking');
            redirect("");
        }

        $cek_kb = $this->model->GetCheckBCT("where id_books = '$id_books'")->num_rows();
        $cek_df = $this->model->GetCheckBCT("where detail_f = '$detail_f'")->num_rows();
        $cek_pc = $this->model->GetCheckBCT("where pcode = '$pcode'")->num_rows();
        $cek_kt = $this->model->GetDataTamu("where kode_tamu = '$kode_tamu'")->num_rows();

        if (($cek_kb >0) OR ($cek_kt >0) OR ($cek_df >0) OR ($cek_pc >0)) {
            $this->session->set_flashdata('error', 'Mohon Maaf Sistem sedang sibuk, silahkan tunggu beberapa saat lagi. Terima Kasih');
            redirect("");
        }

            
            
            $data1 = array(
                'kode_tamu' => $kode_tamu,
                'no_id' => $no_id,
                'nama_tamu' => $this->input->post('nama_tamu'),
                'jeniskelamin' => $this->input->post('jeniskelamin'),
                'warganegara' => $this->input->post('warganegara'),
                'tgl_lahir' => $this->input->post('tgl_lahir'),
                'no_telp' => $this->input->post('no_telp'),
                'email' => $this->input->post('email'),
                'tipetamu' => '-',
                
            );
            $data2= array(
                'id_books' => $id_books,
                'detail_f' => $detail_f,
                'kode_tamu' => $kode_tamu,
                'kode_rooms' => $kode_rooms,
                'tgl_masuk' => $tgl_masuk,
                'tgl_keluar' => $tgl_keluar,
                'tipe' => $this->session->userdata("tipe"),
                'adult'=> $this->input->post('adult'),
                'child'=> $this->input->post('child'),
                'status_ci' =>'unverified',
                'pcode'=> $pcode,
                'transby'=>'byself'
                
            );
            $result1 = $this->model->Simpan('data_tamu', $data1);
            $result2 =$this->model->Simpan('bookings', $data2);
            if (($result1==1) and ($result2==1)) {
                $this->hapus_session();
                $this->session->set_flashdata('sukses', 'Booking rooms berhasil silahkan cek status reservasi anda pada form Cek Reservasi secara berkala');
                redirect('');
            }else{
                echo "Gagal";
            }
        

        
    }

    
}

?>