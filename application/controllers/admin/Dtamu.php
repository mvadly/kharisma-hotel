<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dtamu extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form','url'));
        $this->load->library('form_validation');
        $this->cek_login();
    }

    private function cek_login(){
        if (!$this->session->userdata('ses_id')){
            $this->session->set_flashdata('error', 'Silahkan login terlebih dahulu');
            redirect('admin/login');
        }
    }

    public function cek_user(){
        if ($this->session->userdata('ses_level') == 'Pengunjung' or $this->session->userdata('ses_level') == 'Pimpinan'){
            $this->session->set_flashdata('error','Maaf anda tidak bisa masuk kehalaman tersebut');
            redirect('admin/dtamu');
        }
    }

    public function cek_pengunjung(){
        if ($this->session->userdata('ses_level') == 'Pengunjung'){
            $this->session->set_flashdata('error','Maaf anda tidak bisa masuk kehalaman tersebut');
            redirect('admin/dtamu');
        }
    }

    public function index()
    {
        $data = array(
            'ses_level' => $this->session->userdata('ses_level'),
            'datatamu' => $this->model->GetDataTamu(" order by nama_tamu asc")->result_array(),
            'content' => 'admin/halaman/datatamu/datatamu',
        );
    
        
        $this->load->view('admin/template/site', $data);
    }

    public function simpan_data(){
        $this->cek_user();
        if (!$_POST['simpan']){
            $this->session->set_flashdata('warning', 'Tambah data belum dilakukan');
            redirect('admin/dtamu');
        }
        $kode_tamu = $this->input->post('kode_tamu');
        $no_id = $this->input->post('no_id');
        $cek_kode = $this->model->GetDataTamu("where kode_tamu = '$kode_tamu'")->num_rows();
        $cek_noid = $this->model->GetDataTamu("where no_id = '$no_id'")->row_array();
        if ($cek_kode > 0){
            $this->session->set_flashdata('warning', 'Data sudah ada');
            redirect('admin/dtamu');
        }else {
            
            $data = array(
                'kode_tamu' => $kode_tamu,
                'no_id' => $this->input->post('no_id'),
                'nama_tamu' => $this->input->post('nama_tamu'),
                'jeniskelamin' => $this->input->post('jeniskelamin'),
                'warganegara' => $this->input->post('warganegara'),
                'tgl_lahir' => $this->input->post('tgl_lahir'),
                'no_telp' => $this->input->post('no_telp'),
                'email' => $this->input->post('email'),
                'tipetamu' => '-',                
            );
            $this->model->Simpan('data_tamu', $data);
            $this->session->set_flashdata('sukses', 'Simpan data berhasil dilakukan');
            redirect('admin/dtamu');
        }
    }


    public function edit_data($kode = 0){
        $this->cek_user();
        if ($this->uri->segment(3) == null){
            $this->session->set_flashdata('warning','Anda belum memilih data untuk di edit');
            redirect('admin/dtamu');
        }
        $datatamu = $this->model->GetDataTamu("where kode_tamu = '$kode'")->row_array();
        $data = array(
            'kode_tamu' => $datatamu['kode_tamu'],
            'no_id' => $datatamu['no_id'],
            'nama_tamu' => $datatamu['nama_tamu'],
            'jeniskelamin' => $datatamu['jeniskelamin'],
            'warganegara' => $datatamu['warganegara'],
            'tgl_lahir' => $datatamu['tgl_lahir'],
            'no_telp' => $datatamu['no_telp'],
            'email' => $datatamu['email'],
            'content' => 'admin/halaman/datatamu/edit'
        );
        $this->load->view('admin/template/site',$data);
    }

    

    public function update_data(){
        $this->cek_user();
        if (!$_POST['update']){
            $this->session->set_flashdata('error','Update data belum dilakukan');
            redirect('admin/dtamu');
        }
        $kode_tamu = $this->input->post('kode_tamu');
        $data = array(
            'no_id' => $this->input->post('no_id'),
            'nama_tamu' => $this->input->post('nama_tamu'),
            'jeniskelamin' => $this->input->post('jeniskelamin'),
            'warganegara' => $this->input->post('warganegara'),
            'tgl_lahir' =>$this->input->post('tgl_lahir'),
            'no_telp' => $this->input->post('no_telp'),
            'email' => $this->input->post('email')
        );
        $result = $this->model->Update('data_tamu',$data,array('kode_tamu' => $kode_tamu));
        if ($result == 1){
            $this->session->set_flashdata('sukses','Update data berhasil dilakukan');
            redirect('admin/dtamu');
        }else{
            $this->session->set_flasdata('error','Update data gagal dilakukan');
            redirect('admin/dtamu');
        }
    }

    public function hapus_data($kode = 1){
        $this->cek_user();
        if ($this->uri->segment(3) == null){
            $this->session->set_flashdata('warning','Anda belum memilih data untuk di edit');
            redirect('admin/dtamu');
        }
        $datatamu = $this->model->GetDataTamu("where kode_tamu = '$kode'")->result_array();
        $result = $this->model->Hapus('data_tamu',array('kode_tamu' => $kode));
        if ($result == 1){
            $this->session->set_flashdata('sukses','Hapus data berhasil dilakukan');
            redirect('admin/dtamu');
        }else{
            $this->session->set_flashdata('error','Hapus data gagal dilakukan');
            redirect('admin/dtamu');
        }
    }

    public function ganti_password($kode = 0){
        if ($this->uri->segment(3) == null){
            $this->session->set_flashdata('warning','Anda belum memilih data untuk ganti password');
            redirect('admin/user');
        }
        $data_user = $this->model->GetUser("where id_user = '$kode'")->row_array();
        $data = array(
            'content' => 'template/ganti-password',
            'password' => $data_user['password'],
            'id_user' => $data_user['id_user'],
        );
        $this->load->view('admin/template/site', $data);
    }

    public function ubah_password(){
        if (!$_POST['update']){
            $this->session->set_flashdata('error', 'Anda belum melakukan ganti password');
            redirect('dashboard');
        }
        $id_user = $this->input->post('id_user');
        $password = $this->input->post('password');
        $password_lama = md5($this->input->post('password_lama'));
        $password_baru = $this->input->post('password_baru');
        $ulangi_password_baru = $this->input->post('ulangi_password_baru');
        if ($password == $password_lama and $password_baru == $ulangi_password_baru){
            $data = array('password' => md5($ulangi_password_baru));
            $this->model->Update('user',$data,array('id_user' => $id_user,));
            $this->session->set_flashdata('sukses','Ganti password berhasil dilakukan');
            redirect('user');
        }else{
            $this->session->set_flashdata('error','Ganti password gagal dilakukan');
            redirect('admin/user');
        }
    }

    public function export_excel(){
        $this->cek_user();
        $data = array(
            'title' => 'Data User',
            'data_user' => $this->model->GetUser()->result_array(),
        );
        $this->load->view('user/user-laporan-excel',$data);
    }

    public function export_pdf(){
        $this->cek_user();
        ob_start();
        $data = array(
            'title' => 'Data User',
            'data_user' => $this->model->GetUser()->result_array(),
        );
        $this->load->view('user/user-laporan-pdf', $data);
        $html = ob_get_clean();

        require_once ('./assets/html2pdf/html2pdf.class.php');
        $pdf = new HTML2PDF('P','A4','en');
        $pdf->WriteHTML($html);
        $pdf->Output('Data User.pdf','D');
    }

    public function export_print(){
        $this->cek_user();
        $data = array(
            'title' => 'Data User',
            'data_user' => $this->model->GetUser()->result_array(),
        );
        $this->load->view('user/user-laporan-pdf', $data);
    }

}
