
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siparisler extends CI_Controller {

	public function __construct()
	{
			parent::__construct();
			$this->load->library('session');
			$this->load->helper('url');
			$this->load->database();
			$this->load->model('Database_Model');
			if(!$this->session->userdata('admin_session'))
			{
				$this->session->set_flashdata("mesaj","Login Olmanız Gerekir...");
				redirect(base_url().'admin/login');
			}
			
			
	}
	
	public function index()
	{
		$query=$this->db->query("select * from siparis_urunler order by siparis_id");
		$data["veriler"]=$query->result();
		
		$this->load->view('admin/siparis_listesi',$data);
	}
	
	public function sil($id)
	{
		$this->Database_Model->delete_data("siparis_urunler", $id);
		$this->session->set_flashdata("mesaj","Sipariş Silindi...");
		redirect(base_url()."admin/siparisler");
	}
}
