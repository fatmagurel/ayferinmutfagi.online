
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Musteriler extends CI_Controller {

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
		$query=$this->db->query("select * from uyeler order by adsoy");
		$data["veriler"]=$query->result();
		
		$this->load->view('admin/musteri_listesi',$data);
	}
	
	public function ekle()
	{
		$this->load->view('admin/musteri_ekle');
	}
	
	
	public function kaydet()
	{
		$data=array(
		'adsoy'=> $this->input->post('adsoy'),
		'email'=> $this->input->post('email'),
		'sifre'=> $this->input->post('sifre')
		);
		$this->session->set_flashdata("mesaj","Üye Kaydedildi...");
		$this->Database_Model->insert_data("uyeler", $data);
		redirect(base_url()."admin/musteriler");
	}
	
	public function sil($id)
	{
		$this->Database_Model->delete_data("uyeler", $id);
		$this->session->set_flashdata("mesaj","Üye Silindi...");
		redirect(base_url()."admin/musteriler");
	}
	
	public function duzenle($id)
	{
		$query=$this->db->query("select * from uyeler WHERE Id=$id");
		$data["veri"]=$query->result();
		$this->load->view('admin/musteri_duzenle',$data);
	}
	
	public function guncelle($id)
	{
		$data=array(
		'adsoy'=> $this->input->post('adsoy'),
		'email'=> $this->input->post('email'),
		'sifre'=> $this->input->post('sifre')
		);
		
		$this->Database_Model->update_data("uyeler", $data,$id);
		$this->session->set_flashdata("mesaj","Üye Güncellendi...");
		redirect(base_url()."admin/musteriler");
	}
}
