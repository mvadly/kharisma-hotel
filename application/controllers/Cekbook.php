<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cekbook extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->library('upload');

    }


    public function index(){
        
        $this->load->view('umum/cekbook');
    }
    
    public function find(){
        $idb=$this->input->post("idb");
        $no_id=$this->input->post("no_id");
        $dbook=$this->model->GetBCTJoin("where id_books='$idb' and
            no_id='$no_id' and status_ci<>'done' ")->num_rows();
        $dbooks=$this->model->GetBCTJoin("where id_books='$idb' and
            no_id='$no_id' and status_ci<>'done' ")->row_array();
        $lama = ((abs(strtotime($dbooks['tgl_masuk'])-strtotime($dbooks['tgl_keluar'])))/(60*60*24));
        $data=array(
        	'id_books'=> $dbooks['id_books'],
        	'nama_tamu'=> $dbooks['nama_tamu'],
        	'kode_rooms'=> $dbooks['kode_rooms'],
            'tipe'=> $dbooks['tipe'],
            'hargasewa'=> $dbooks['hargasewa']+$dbooks['nominal'],
        	'tgl_masuk'=> $dbooks['tgl_masuk'],
        	'tgl_keluar'=> $dbooks['tgl_keluar'],
            'lama'=>$lama,
        	'status'=> $dbooks['status_ci'],
        	'buktip'=> $dbooks['buktip'],
            'pcode'=> $dbooks['pcode'],
        );

        if ($dbook >0) {
        	$this->load->view('umum/cekbook/sukses',$data);
        }else{
        	$this->load->view('umum/cekbook/gagal');
        }
        

    }
    function upload_image(){
        $config['upload_path'] = './assets/upload/buktibayar/'; //path folder
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
        if(!empty($_FILES['buktip']['name']))
        {
            if ($this->upload->do_upload('buktip'))
                {
                    $gbr = $this->upload->data();
                    $gambar=$gbr['file_name']; //Mengambil file name dari gambar yang diupload
                    $id_books=strip_tags($this->input->post('id_books'));
                    $data=array('buktip'=>$gambar);
                    $result=$this->model->update('bookings',$data,array('id_books'=>$id_books));
                    if ($result>0) {
                        $this->session->set_flashdata('sukses','Upload bukti pembayaran berhasil, silahkan cek ulang untuk melihat hasil upload pembayaran anda');
                        redirect("cekbook");
                    }else{
                        $this->session->set_flashdata('error','Upload bukti pembayaran gagal, silahkan upload beberapa saat lagi. terima kasih');
                        redirect("cekbook");
                    }
                    
                }else{
                    $this->session->set_flashdata('error','Gambar Gagal Upload. Gambar harus bertipe gif|jpg|png|jpeg|bmp');
                    redirect("cekbook");
                    
                }
                     
            }else{
                $this->session->set_flashdata('error','Gagal, gambar belum di pilih');
                redirect("cekbook");
                
        }
                
    }

    

}
?>