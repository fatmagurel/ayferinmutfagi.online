
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kullanicilar extends CI_Controller {

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
		$query=$this->db->query("select * from kullanicilar order by adsoy");
		$data["veriler"]=$query->result();
		
		$this->load->view('admin/kullanici_listesi',$data);
	}
	
	public function ekle()
	{
		$this->load->view('admin/kullanici_ekle');
	}
	
	
	public function kaydet()
	{
		$data=array(
		'adsoy'=> $this->input->post('adsoy'),
		'email'=> $this->input->post('email'),
		'sifre'=> $this->input->post('sifre'),
		'resim'=> $this->input->post('resim')
		);
		$this->session->set_flashdata("mesaj","Kullanıcı Kaydedildi...");
		$this->Database_Model->insert_data("kullanicilar", $data);
		redirect(base_url()."admin/kullanicilar");
	}
	
	public function sil($id)
	{
		$this->Database_Model->delete_data("kullanicilar", $id);
		$this->session->set_flashdata("mesaj","Kullanıcı Silindi...");
		redirect(base_url()."admin/kullanicilar");
	}
	
	public function duzenle($id)
	{
		$query=$this->db->query("select * from kullanicilar WHERE Id=$id");
		$data["veri"]=$query->result();
		$this->load->view('admin/kullanici_duzenle',$data);
	}
	
	public function guncelle($id)
	{
		$data=array(
		'adsoy'=> $this->input->post('adsoy'),
		'email'=> $this->input->post('email'),
		'sifre'=> $this->input->post('sifre'),
		'resim'=> $this->input->post('resim')
		);
		
		$this->Database_Model->update_data("kullanicilar", $data,$id);
		$this->session->set_flashdata("mesaj","Kullanıcı Güncellendi...");
		redirect(base_url()."admin/kullanicilar");
	}
}
