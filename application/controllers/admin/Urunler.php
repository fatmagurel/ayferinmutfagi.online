
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Urunler extends CI_Controller {

	public function __construct()
	{
			parent::__construct();
			$this->load->library('session');
			$this->load->helper(array('form','url'));
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
		
		$data["veriler"]=$this->Database_Model->get_urunler();
		
		$this->load->view('admin/urun_listesi',$data);
	}
	
	public function ekle()
	{
		$query=$this->db->query("select * from kategoriler order by adi");
		$data["kategoriler"]=$query->result();
		$this->load->view('admin/urun_ekle',$data);
	}
	
	
	public function kaydet()
	{
		$data=array(
		'adi'=> $this->input->post('adi'),
		'kategori_id'=> $this->input->post('kategori_id'),
		'fiyat'=> $this->input->post('fiyat'),
		'resim'=> $this->input->post('resim'),
		'aciklama'=> $this->input->post('aciklama'),
		'tarih'=> $this->input->post('tarih')
		
		);
		$this->session->set_flashdata("mesaj","Ürün Kaydedildi...");
		$this->Database_Model->insert_data("urunler", $data);
		redirect(base_url()."admin/urunler");
	}
	
	public function sil($id)
	{
		$this->Database_Model->delete_data("urunler", $id);
		$this->session->set_flashdata("mesaj","Ürün Silindi...");
		redirect(base_url()."admin/urunler");
	}
	
	public function duzenle($id)
	{
		$query=$this->db->query("select * from urunler WHERE Id=$id");
		$data["veri"]=$query->result();
		$this->load->view('admin/urun_duzenle',$data);
	}
	
	public function guncelle($id)
	{
		$data=array(
		
		'adi'=> $this->input->post('adi'),
		'kategori_id'=> $this->input->post('kategori_id'),
		'fiyat'=> $this->input->post('fiyat'),
		'resim'=> $this->input->post('resim'),
		'aciklama'=> $this->input->post('aciklama'),
		'tarih'=> $this->input->post('tarih')
		
		);
		
		$this->Database_Model->update_data("urunler", $data,$id);
		$this->session->set_flashdata("mesaj","Ürün Güncellendi...");
		redirect(base_url()."admin/urunler");
	}
	
	public function resimekle($id)
	{
		$data["id"]=$id;
		$this->load->view('admin/resimekle',$data);
	}
	
	public function resim_upload($id)
	{
				$data["id"]=$id;
		
				$config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'gif|jpg|jpeg|png';
                $config['max_size']             = 1024;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('userfile'))
                {
                      $error = $this->upload->display_errors();
					  $this->session->set_flashdata("mesaj","Yüklemede hata oluştu:En fazla 1024x1024 boyutunda yükleyin...".$error);
                        $this->load->view('admin/resimekle', $data);
						//$this->load->view('admin/resimekle', $error);
                }
                else
                {
                        $data = $this->upload->data();
						echo $dosyaadi=$data["file_name"];
						$data=array(
						'resim'=>$dosyaadi
						);
						
						$this->Database_Model->update_data("urunler",$data,$id);
						$this->session->set_flashdata("mesaj","Ürün Resmi Güncellendi...");
                   		redirect(base_url()."admin/Urunler");                        
                }		
	}
	
}	
	
	
	