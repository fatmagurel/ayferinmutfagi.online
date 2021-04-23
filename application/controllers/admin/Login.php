
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
			parent::__construct();
			$this->load->library('session');
			$this->load->database();
			$this->load->helper('url');
			$this->load->model('Database_Model');
			
	}
	
	public function index()
	{
		
		$this->load->view('admin/login');
	}
	
	public function giris_yap()
	{
		$email=$this->input->post('email');
		$sifre=$this->input->post('sifre');
		
		$email=$this->security->xss_clean($email);
		$sifre=$this->security->xss_clean($sifre);
		
		$result=$this->Database_Model->login('kullanicilar',$email,$sifre);
		
		if($result)
		{
			$sess_array=array(
			'id'=>$result[0]->Id,
			'email'=>$result[0]->email,
			'adsoy'=>$result[0]->adsoy,
			'sifre'=>$result[0]->sifre,
			'resim'=>$result[0]->resim
			);
			
			$this->session->set_userdata('admin_session',$sess_array);
			
			redirect(base_url().'admin/home/');
		}
		else
		{
			$this->session->set_flashdata("mesaj","Geçersiz email vaya şifre");
			redirect(base_url().'admin/login');
		}
	}
	
	public function cikis_yap()
	{
		$this->session->unset_userdata($admin_session);
		redirect(base_url().'admin/login');
	}
		
}
