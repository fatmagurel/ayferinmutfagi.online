
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategoriler extends CI_Controller {

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
		$query=$this->db->query("select * from kategoriler order by adi");
		$data["veriler"]=$query->result();
		
		$this->load->view('admin/kategori_listesi',$data);
	}
	
	public function ekle()
	{
		$this->load->view('admin/kategori_ekle');
	}
	
	
	public function kaydet()
	{
		$data=array(
		'adi'=> $this->input->post('adi')
		);
		$this->session->set_flashdata("mesaj","Kategori Kaydedildi...");
		$this->Database_Model->insert_data("kategoriler", $data);
		redirect(base_url()."admin/kategoriler");
	}
	
	public function sil($id)
	{
		$this->Database_Model->delete_data("kategoriler", $id);
		$this->session->set_flashdata("mesaj","Kategori Silindi...");
		redirect(base_url()."admin/kategoriler");
	}
	
	public function duzenle($id)
	{
		$query=$this->db->query("select * from kategoriler WHERE Id=$id");
		$data["veri"]=$query->result();
		$this->load->view('admin/kategori_duzenle',$data);
	}
	
	public function guncelle($id)
	{
		$data=array(
		'adi'=> $this->input->post('adi')
		);
		
		$this->Database_Model->update_data("kategoriler", $data,$id);
		$this->session->set_flashdata("mesaj","Kategori Güncellendi...");
		redirect(base_url()."admin/kategoriler");
	}
}
