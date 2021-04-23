
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
			parent::__construct();
			$this->load->helper('url');
			$this->load->library('session');
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
		$this->load->view('admin/_header');
		$this->load->view('admin/_sidebar');
		$this->load->view('admin/_content');
		$this->load->view('admin/_footer');
	}
	
	public function ayarlar()
	{
		$query=$this->db->query("select *from ayarlar limit 1");
		$data["veri"]=$query->result();
		$this->load->view('admin/ayarlar',$data);
	}
	
	public function ayarlar_guncelle($id)
	{
		$data=array(
			'adi' => $this->input->post('adi'),
			'keywords' => $this->input->post('keywords'),
			'aciklama' => $this->input->post('aciklama'),
			'sehir' => $this->input->post('sehir'),
			'tel' => $this->input->post('tel'),
			'email' => $this->input->post('email'),	
			'hakkimizda' => $this->input->post('ckeditor'),
			'logo' => $this->input->post('logo')
		);
		$this->load->model('Database_Model');
		$this->Database_Model->update_data("ayarlar",$data,$id);
		$this->session->set_flashdata("mesaj","Güncellendi...");
		redirect(base_url().'admin/home/ayarlar');

	}
}
