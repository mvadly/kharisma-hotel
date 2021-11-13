<?php
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2014 - 2016, British Columbia Institute of Technology
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */

class Gallery extends CI_Controller
{

	function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->helper(array('url','file'));
	}

	function index(){
		$data= array(
			'content'=>'admin/halaman/gallery/gallery'
			);
		$this->load->view('admin/template/site',$data);
	}

	function fnd(){
		$data= array(
			'content'=>'admin/halaman/gallery/gallery2'
			);
		$this->load->view('admin/template/site',$data);
	}


	//Untuk proses upload foto
	function uploadhp(){

        $config['upload_path']   = FCPATH.'/assets/umum/images/homepage';
        $config['allowed_types'] = 'gif|jpg|png|ico';
        $this->load->library('upload',$config);

        $this->upload->do_upload('userfile');
        


	}

	function upload_fnd(){

        $config['upload_path']   = FCPATH.'/assets/umum/images/fnd';
        $config['allowed_types'] = 'gif|jpg|png|ico';
        $this->load->library('upload',$config);

        $this->upload->do_upload('userfile');
        


	}


	//Untuk menghapus foto
	public function hapushp($kode = 1){


		if(file_exists($file=FCPATH.'/assets/umum/images/homepage/'.$kode)){
			unlink($file);
			$this->session->set_flashdata('sukses','Hapus data berhasil dilakukan');
        	redirect('admin/gallery/');
		}else{
			$this->session->set_flashdata('error','Hapus data gagal');
            redirect('admin/gallery/');

		}
	}
	public function hapus_fnd($kode = 1){


		if(file_exists($file=FCPATH.'/assets/umum/images/fnd/'.$kode)){
			unlink($file);
			$this->session->set_flashdata('sukses','Hapus data berhasil dilakukan');
        	redirect('admin/gallery/fnd');
		}else{
			$this->session->set_flashdata('error','Hapus data gagal');
            redirect('admin/gallery/fnd');

		}
	}
	

}

?>