<?php
class Gallery extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_galeri');
		$this->load->model('m_album');
		$this->load->model('m_pengunjung');
        $this->m_pengunjung->count_visitor();
	}

	function index(){
		$x['alb']=$this->m_album->get_all_album();
		$x['data']=$this->m_galeri->get_all_galeri();
		$x['set'] = $this->db->get_where('tbl_setting', array('id'=> 1))->row();
		$x['title'] = 'Gallery';
		$this->load->view('include/v_header',$x);
		$this->load->view('v_gallery');
		$this->load->view('include/v_footer');
	}
}
