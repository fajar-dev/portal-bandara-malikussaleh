<?php 
class Blog extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_tulisan');
		$this->load->model('m_pengunjung');
        $this->m_pengunjung->count_visitor();
	}

	function index(){
		$jum=$this->m_tulisan->berita();
        $page=$this->uri->segment(3);
        if(!$page):
            $offset = 0;
        else:
            $offset = $page;
        endif;
        $limit=6;
        $config['base_url'] = base_url() . 'blog/index/';
        $config['total_rows'] = $jum->num_rows();
        $config['per_page'] = $limit;
        $config['uri_segment'] = 3;
        $config['first_link'] = 'Awal';
        $config['last_link'] = 'Akhir';
        $config['next_link'] = 'Next >>';
        $config['prev_link'] = '<< Prev';
        $this->pagination->initialize($config);
        $x['page'] =$this->pagination->create_links();
		$x['data']=$this->m_tulisan->berita_perpage($offset,$limit);
		$x['populer']=$this->m_tulisan->get_tulisan_populer();
		$x['kat']=$this->m_tulisan->get_kategori_for_blog();
		$x['judul']= 'Berita Terbaru';
		$x['set'] = $this->db->get_where('tbl_setting', array('id'=> 1))->row();
		$x['title'] = 'Blog';
		$this->load->view('include/v_header',$x);
		$this->load->view('v_blog');
		$this->load->view('include/v_footer');
		}

	function detail($slug){
		$data=$this->m_tulisan->get_berita_by_slug($slug);
		$q=$data->row_array();
		$kode=$q['tulisan_id'];
		$this->m_tulisan->count_views($kode);
		$x['status'] = 1;
		$x['data']=$this->m_tulisan->get_berita_by_slug($slug);
		$x['populer']=$this->m_tulisan->get_tulisan_populer();
		$x['terbaru']=$this->m_tulisan->get_tulisan_terbaru();
		$x['kat']=$this->m_tulisan->get_kategori_for_blog();
		$x['set'] = $this->db->get_where('tbl_setting', array('id'=> 1))->row();
		$x['title'] = $x['data']->row()->tulisan_judul;
		$x['status'] = 1;
		$this->load->view('include/v_header',$x);
		$this->load->view('v_blog_detail');
		$this->load->view('include/v_footer');
	}

	function kategori($id){
		$kategori_id=$id;
		$jum=$this->m_tulisan->get_tulisan_by_kategori($kategori_id);
        $page=$this->uri->segment(4);
        if(!$page):
            $offset = 0;
        else:
            $offset = $page;
        endif;
        $limit=5;
        $config['base_url'] = base_url() . 'blog/kategori/'.$kategori_id.'/';
        $config['total_rows'] = $jum->num_rows();
        $config['per_page'] = $limit;
        $config['uri_segment'] = 4;
        $config['first_link'] = 'Awal';
        $config['last_link'] = 'Akhir';
        $config['next_link'] = 'Next >>';
        $config['prev_link'] = '<< Prev';
        $this->pagination->initialize($config);
        $x['page'] =$this->pagination->create_links();
		$x['data']=$this->m_tulisan->get_tulisan_by_kategori_perpage($kategori_id,$offset,$limit);
		$x['populer']=$this->m_tulisan->get_tulisan_populer();
		$x['kat']=$this->m_tulisan->get_kategori_for_blog();
		$hasil = $this->db->get_where('tbl_kategori', array('kategori_id'=> $id))->row();
		$x['set'] = $this->db->get_where('tbl_setting', array('id'=> 1))->row();
		$x['judul']= 'Kategori "'.$hasil->kategori_nama.'"';
		$x['title'] = $hasil->kategori_nama;
		$this->load->view('include/v_header',$x);
		$this->load->view('v_blog');
		$this->load->view('include/v_footer');
	}

	function search(){
		$keyword=str_replace("'", "", $this->input->post('xfilter',TRUE));
		$x['data']=$this->m_tulisan->search_tulisan($keyword);
		$x['populer']=$this->m_tulisan->get_tulisan_populer();
		$x['kat']=$this->m_tulisan->get_kategori_for_blog();
		$x['judul']= 'Hasil Pencarian "'.$keyword.'"';
		$x['set'] = $this->db->get_where('tbl_setting', array('id'=> 1))->row();
		$x['title'] = 'Blog';
		$this->load->view('include/v_header',$x);
		$this->load->view('v_blog');
		$this->load->view('include/v_footer');;
	}


}