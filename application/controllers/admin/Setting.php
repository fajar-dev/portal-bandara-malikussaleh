<?php
class Setting extends CI_Controller{
	function __construct(){
		parent::__construct();
		if(!isset($_SESSION['logged_in'])){
            $url=base_url('administrator');
            redirect($url);
    }elseif($_SESSION['level'] != 1 ){
			redirect(base_url('admin/dashboard')); 
		};
		$this->load->model('m_pengunjung');
	}

	function index(){
      $x['set'] = $this->db->get_where('tbl_setting', array('id'=> 1))->row();
			$this->load->view('admin/v_setting',$x);
	
	}
	
public function simpan_setting(){
		if(empty($_FILES['foto']['name'])){
			$data = array(
					'kontak' => $this->input->post('kontak'),
          'email' => $this->input->post('email'),
					'alamat' => $this->input->post('alamat'),
					'instagram' => $this->input->post('instagram'),
					'facebook' => $this->input->post('facebook'),
					'twitter' => $this->input->post('twitter'),
					'youtube' => $this->input->post('youtube'),
			);
				$this->db->where('id', 1);
				$this->db->update('tbl_setting',$data);
				$this->session->set_flashdata('msg', 'success');
      redirect(base_url('admin/setting')); 
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
                  'kontak' => $this->input->post('kontak'),
                  'email' => $this->input->post('email'),
                  'alamat' => $this->input->post('alamat'),
                  'instagram' => $this->input->post('instagram'),
                  'facebook' => $this->input->post('facebook'),
                  'twitter' => $this->input->post('twitter'),
                  'youtube' => $this->input->post('youtube'),
									'banner' => $hasil,
							);
							$this->db->where('id', 1);
							$this->db->update('tbl_setting',$data);
							$this->session->set_flashdata('msg', 'success');
						redirect(base_url('admin/setting')); 
			}
		}
	}
	
}