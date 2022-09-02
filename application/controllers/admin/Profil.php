<?php
class Profil extends CI_Controller{
	function __construct(){
		parent::__construct();
		if(!isset($_SESSION['logged_in'])){
            $url=base_url('administrator');
            redirect($url);
        };
		$this->load->model('m_pengunjung');
	}

	function index(){
      $x['profil'] = $this->db->get_where('tbl_profil', array('id'=> 1))->row();
			$this->load->view('admin/v_profil',$x);
	
	}
	
public function simpan_profil(){
		if(empty($_FILES['foto']['name'])){
			$data = array(
					'isi' => $this->input->post('isi'),
			);
				$this->db->where('id', 1);
				$this->db->update('tbl_profil',$data);
				$this->session->set_flashdata('msg', 'success');
      redirect(base_url('admin/profil')); 
		}else{
			$config['upload_path']        = './assets/images';
			$config['allowed_types']       = 'img|png|jpeg|gif|jpg';
			$config['encrypt_name']        = true;
			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload('foto')){
				$this->session->set_flashdata('msg', 'gagal');
				redirect('user/biodata');
			}else{
								$data = array('foto' => $this->upload->data());
								$uploadData = $this->upload->data();
								$hasil = $uploadData['file_name'];
								$data = array(
									'isi' => $this->input->post('isi'),
									'foto' => $hasil,
							);
							$this->db->where('id', 1);
							$this->db->update('tbl_profil',$data);
							$this->session->set_flashdata('msg', 'success');
						redirect(base_url('admin/profil')); 
			}
		}
	}
	
}