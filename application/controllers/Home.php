<?php 
class Home extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_tulisan');
		$this->load->model('m_pengunjung');
		$this->load->model('m_kontak');
        $this->m_pengunjung->count_visitor();
	}
	function index(){
		$x['post']=$this->m_tulisan->get_post_home();
		$x['profil'] = $this->db->get_where('tbl_profil', array('id'=> 1))->row();
		$x['set'] = $this->db->get_where('tbl_setting', array('id'=> 1))->row();
		$this->load->view('include/v_header',$x);
		$this->load->view('v_home');
		$this->load->view('include/v_footer');
	}

	function kirim_pesan(){
		$nama=htmlspecialchars($this->input->post('nama',TRUE),ENT_QUOTES);
		$email=htmlspecialchars($this->input->post('email',TRUE),ENT_QUOTES);
		$pesan=htmlspecialchars(trim($this->input->post('pesan',TRUE)),ENT_QUOTES);
		$this->m_kontak->kirim_pesan($nama,$email,$pesan);
		echo $this->session->set_flashdata('msg',"<div class='alert alert-info'>Terima kasih telah menghubungi kami.</div>");
		redirect();
	}
}