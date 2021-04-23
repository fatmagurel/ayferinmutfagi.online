<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Uye extends CI_Controller {

	public function __construct()
        {
                parent::__construct();
                // Your own constructor code
				
				$this->load->model('Database_Model');
				$this->load->helper('url');
				if(!$this->session->userdata("uye_session"))
					redirect(base_url().'home/uyelik');
        }
	public function index()
	{
		$query=$this->db->query("SELECT * FROM ayarlar");
		$data["veri"]=$query->result();
		
		$query=$this->db->query("SELECT * FROM uyeler WHERE Id=".$this->session->uye_session["id"]);
		$data["uye"]=$query->result();
		
		$data["sayfa"]="Üye Paneli";
		$data["menu"]="uye";
		$this->load->view('hesabim',$data);

	}
	
	public function uye_paneli()
	{
		$query=$this->db->query("SELECT * FROM kategoriler ORDER BY adi");
		$data["kategoriler"]=$query->result(); 
		
		$query=$this->db->query("select * from ayarlar limit 1");
		$data["veri"]=$query->result();
		$id=$this->session->uye_session["id"];
		$query=$this->db->query("select * from uyeler WHERE Id=$id");
		$data["veri2"]=$query->result();
		$this->load->view('uye_paneli',$data);
		
		
	}
	public function uye_guncelle()
	{
		$data=array(
		'adsoy'=>$this->input->post('adsoy'),
		'sifre'=>$this->input->post('sifre'),
		'tel'=>$this->input->post('tel'),
		'adres'=>$this->input->post('adres'),
		'email'=>$this->input->post('email')
		);
		$id=$this->session->uye_session["id"];
		
		$this->Database_Model->update_data("uyeler",$data,$id);
		$this->session->set_flashdata("mesaj1","Üye Güncellendi...");
		redirect(base_url().'home/uye_paneli');
	}
	
	public function uye_ekle()
	{
		$data=array(
		
		'email'=>$this->input->post('email'),
		'sifre'=>$this->input->post('sifre'),
		'adsoy'=>$this->input->post('adsoy')
		
		);
		$this->db->insert("uyeler",$data);
		$this->session->set_flashdata("mesaj","Kayıt Oldunuz...<br>Lütfen Giriş Yapınız...");
		redirect(base_url().'home');
	}
	
	public function sepete_ekle()
	{
		//Form verilerini alır.
		$data=array(
		'urun_id'=>$this->input->post('urunid'),
		'adet'=>$this->input->post('adet'),
		'musteri_id'=>$this->session->uye_session["id"]
		);
		
		//Aynı ürün eklendi ise kontrol edilip o ürünün miktar kısmı artırılır...
		
		$this->db->insert("sepet",$data);
		$this->session->set_flashdata("urun","Ürün Sepete Eklendi...");
		redirect(base_url().'home/urundetay/'.$this->input->post('urunid'));
	}
	public function sepet()
	{
		if(!$this->session->userdata('uye_session'))
		{
			$this->session->set_flashdata('mesaj2', 'Giriş Yapmadınız!');
			redirect(base_url()."home/uyelik");
		}
		else ($this->session->userdata("uye_session"));
		{
			$benim_id=$this->session->uye_session["id"];
			$query=$this->db->query("SELECT COUNT(Id) AS say FROM sepet WHERE sepet.musteri_id='.$benim_id'");
			$data["sepet"]=$query->result(); 
		}
		
		$query=$this->db->query("SELECT * FROM ayarlar");
		$data["veri"]=$query->result();
		
		$id=$this->session->uye_session["id"];
		
		$data["veriler"]=$this->Database_Model->sepet_urunler($id);
		
		$this->load->view('sepet',$data);
		
	}
	public function sepetsil($id)
	{
		
		$this->db->query("DELETE FROM sepet WHERE Id=$id");
		$this->session->set_flashdata("sil","Ürün Sepetten Silindi...");
		redirect(base_url().'home/sepet');
	}
	
	public function sepet_iptal($id)
	{
		
		$this->db->query("DELETE FROM sepet_urunler WHERE Id=$id");
		$this->session->set_flashdata("iptal","Ürün İptal Edildi...");
		redirect(base_url().'home/siparislerim');
	}
	
	public function satinalma()
	{
		
		$query=$this->db->query("SELECT * FROM ayarlar");
		$data["veri"]=$query->result();
		$data["sayfa"]="Satın Alma ||";
		$data["menu"]="uye";
		
		
		$data["toplam"]=$this->input->post('toplam');
		$id=$this->session->uye_session["id"];
		
		$query=$this->db->query("select * from uyeler WHERE Id=$id");
		$data["veri2"]=$query->result();
		
		
	
		
		$this->load->view('satinalma',$data);
	
	}
	
	public function siparis_tamamla()
	{
		$musteri_id=$this->session->uye_session["id"];
		$data=array(
		'adsoy'=>$this->input->post('adsoy'),
		'musteri_id'=>$this->session->uye_session["id"],
		'adres'=>$this->input->post('adres'),
		'tel'=>$this->input->post('tel'),
		'toplam'=>$this->input->post('toplam')
		);
		//VERİLERİ SİPARİŞ TABLOSUNA EKLE
		$siparis_id=$this->Database_Model->insert_data("siparis",$data);
		
		if($siparis_id)
		{
			$query=$this->db->query("SELECT sepet.*, urunler.adi as adi, urunler.fiyat as fiyat FROM sepet INNER JOIN 
			urunler ON urunler.Id=sepet.urun_id WHERE sepet.musteri_id=$musteri_id order by adi");
			
			$veriler=$query->result();
			foreach($veriler as $rs)
			{
				$data=array(
				'musteri_id'=>$this->session->uye_session["id"],
				'fiyat'=>$rs->fiyat,
				'adi'=>$rs->adi,
				'siparis_id'=>$siparis_id,
				'urun_id'=>$rs->Id,
				'siparis_id'=>$siparis_id,
				'adet'=>$rs->adet,
				'toplam'=>$rs->adet*$rs->fiyat
				);
				$urun_id=$this->Database_Model->insert_data("sepet_urunler",$data);
				//eklenen ürün adedi Urunler tablosundaki stoktan düşürülmeli
				
			}
		}
		$this->db->query("DELETE FROM sepet WHERE musteri_id=$musteri_id");
		
		redirect(base_url().'home/islemson');
	}
	
	public function islemson()
	{
		$query=$this->db->query("SELECT * FROM ayarlar");
		$data["veri"]=$query->result();
		
		
		//siparişin tamamlandığına dair email
		
		$this->load->view('islemson',$data);
	
	}
	public function siparislerim()
	{
		if ($this->session->userdata("uye_session"));
		{
			$benim_id=$this->session->uye_session["id"];
			$query=$this->db->query("SELECT * FROM sepet_urunler WHERE musteri_id=".$this->session->uye_session["id"]);
			$data["veriler"]=$query->result(); 
		}
		
		$query=$this->db->query("SELECT * FROM ayarlar");
		$data["veri"]=$query->result();

		
		$this->load->view('siparislerim',$data);
	}
	
	public function siparisdetay($siparis_id)
	{
		
		$query=$this->db->query("SELECT * FROM ayarlar");
		$data["veri"]=$query->result();
		$data["sayfa"]="Sipariş Detayı ||";
		$data["menu"]="uye";
		
		$id=$this->session->uye_session["id"];
		$query=$this->db->query("SELECT * FROM siparis_urunler WHERE siparis_id=$siparis_id");
		
		$data['veriler']=$query->result();
		
		$this->load->view('siparis_detay',$data);
	
	}
	
	
	public function cikis()
	{
		$this->session->unset_userdata("uye_session");
		redirect(base_url().'home');
	}
	
	
	
	
	
	public function siparislerim()
	{
		if(!$this->session->userdata('uye_session'))
		{
			$this->session->set_flashdata('mesaj', 'Giriş Yapmadınız!');
			redirect(base_url()."home/uyelik");
		}
		
		$query=$this->db->query("select * from ayarlar limit 1");
		$data["veri"]=$query->result();
		
		$id=$this->session->uye_session["id"];
		/*
		$query=$this->db->query("select * from siparisler WHERE Id=$id");
		$data["siparisler"]=$query->result();
		*/
		$this->load->view('uye_siparisler',$data);
		
	}
	
	
	
}
