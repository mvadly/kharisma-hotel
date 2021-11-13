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

class Upload extends CI_Controller
{

	function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->helper(array('url','file'));
	}

	function index(){
		$this->load->view('admin/halaman/upload_view');
	}


	//Untuk proses upload foto
	function proses_upload(){

        $config['upload_path']   = FCPATH.'/assets/upload/gambar';
        $config['allowed_types'] = 'gif|jpg|png|ico';
        $this->load->library('upload',$config);

        if($this->upload->do_upload('userfile')){
        	$token=$this->input->post('token_foto');
        	$id_gambar=$this->input->post('id_gambar');
        	$nama=$this->upload->data('file_name');
        	$this->db->insert('data_gambar',array('gambar'=>$nama,'id_gambar'=>$id_gambar,'token'=>$token));
        }
        // echo $token.'<br>';
        // echo $nama.'<br>';

        // $config['upload_path']   = FCPATH.'/assets/upload/gambar/';
        // $config['allowed_types'] = 'gif|jpg|png|ico';
        // $this->load->library('upload',$config);

        // if($this->upload->do_upload('userfile')){
        // 	$token=$this->input->post('token_foto');
        // 	$nama=$this->upload->data('file_name');
        // 	$this->db->insert('foto',array('nama_foto'=>$nama,'token'=>$token));
        // }


	}


	//Untuk menghapus foto
	function remove_foto(){

			//Ambil token foto
		$token=$this->input->post('token');

		
		$foto=$this->db->get_where('data_gambar',array('token'=>$token));


		if($foto->num_rows()>0){
			$hasil=$foto->row();
			$gambar=$hasil->gambar;
			if(file_exists($file=FCPATH.'/assets/upload/gambar/'.$gambar)){
				unlink($file);
			}
			$this->db->delete('data_gambar',array('token'=>$token));

		}


		echo "{}";
	}
	

}