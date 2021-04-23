
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
			parent::__construct();
			$this->load->helper('url');
			$this->load->model('Database_Model');
	}
	
	public function index()
	{
		$query=$this->db->query("SELECT * FROM yorumlar ORDER BY tarih DESC");
		
		$data["yorum"]=$query->result();
		
		$this->load->view('_header');
		$this->load->view('_slider');
		$this->load->view('_content',$data);
		$this->load->view('_footer');
	}
	
	
	
	public function hakkimizda()
	{
		$this->load->view('hakkimizda');
	}
	
	public function yorum()
	{
		$data=array(
		'adi'=>$this->input->post('adi'),
		'mesaj'=>$this->input->post('mesaj'),
		'tarih'=>$this->input->post('tarih')
		);
		$this->db->insert("yorumlar",$data);
		redirect(base_url().'#yorumyap');
		
	}
}
