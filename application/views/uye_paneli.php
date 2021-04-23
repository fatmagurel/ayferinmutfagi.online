	<?php
		$this->load->view('_header');
	?>
	<div class="hero-wrap hero-bread" style="background-image: url('<?=base_url()?>/assets/images/bg_1.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="<?=base_url()?>/Home">Anasayfa</a></span>/<span>Üye Bilgileri</span></p>
			<h1 class="mb-0 bread">Üye Bilgileri</h1>
          </div>
        </div>
      </div>
    </div>	
	
	<?php
		$this->load->view('_uyesidebar');
	?>
		
		<div class="container">
			<div class="row">
				
				<div class="col-md-6" style="margin:0 auto;">
                                        <div class="main-card mb-3 card">
                                            <div class="card-body"><h5 class="card-title"><center>Üye Bilgileri</center></h5>
												<hr>
												<div class="callout callout-info">
													<center><strong><i><p class="text-success"><?=$this->session->flashdata("mesaj1")?></p></i></center></strong>
												</div>
                                                <form action="<?=base_url()?>home/uye_guncelle/<?$veri2[0]->Id?>" method="post" class="form-horizontal" id="popup-validation">
                                                    <div class="position-relative form-group"><label class="">Adı Soyadı</label><input name="adsoy" type="text" class="form-control" value="<?=$veri2[0]->adsoy?>"></div>
                                                    <div class="position-relative form-group"><label class="">Email</label><input name="email" type="email" class="form-control" value="<?=$veri2[0]->email?>"></div>
                                                    <div class="position-relative form-group"><label class="">Şifre</label><input name="sifre" type="password" class="form-control" value="<?=$veri2[0]->sifre?>"></div>
                                                    <div class="position-relative form-group"><label class="">Adres</label><input name="adres" type="text" class="form-control" value="<?=$veri2[0]->adres?>"></div>
                                                    <div class="position-relative form-group"><label class="">Telefon</label><input name="tel" type="text" class="form-control" value="<?=$veri2[0]->tel?>"></div>
                                                        
                                                    <button class="mt-1 btn btn-primary" type="submit" value="GÜNCELLE">GÜNCELLE</button>
                                                </form>
                                            </div>
                                        </div>
                </div>

			</div>
		</div>
	</section>

		
	<?php
		$this->load->view('_footer');
	?>