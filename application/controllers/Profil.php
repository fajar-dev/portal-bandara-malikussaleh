<?php 
class Profil extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_tulisan');
		$this->load->model('m_pengunjung');
        $this->m_pengunjung->count_visitor();
	}
	function index(){
		$x['profil'] = $this->db->get_where('tbl_profil', array('id'=> 1))->row();
		$x['set'] = $this->db->get_where('tbl_setting', array('id'=> 1))->row();
		$this->load->view('include/v_header',$x);
		$this->load->view('v_profil');
		$this->load->view('include/v_footer');
	}


}