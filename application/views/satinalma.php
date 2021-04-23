	<?php
		$this->load->view('_header');
	?>
	<div class="hero-wrap hero-bread" style="background-image: url('<?=base_url()?>/assets/images/bg_1.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="<?=base_url()?>/Home">Anasayfa</a></span>/<span>Satın Alma</span></p>
			<h1 class="mb-0 bread">Teslimat Bilgileri</h1>
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
                                            <div class="card-body"><h5 class="card-title"><center>***Kapıda Ödeme Yapılmaktadır***</center></h5>
												<hr>
                                                
												<form id="popup-validation" class="form-horizontal" name="contact-form" method="post" action="<?=base_url()?>/home/siparis_tamamla">
													 <div class="position-relative form-group">
														<label class="">Adı Soyadı</label>
														<input name="adsoy" type="text" class="form-control" value="<?=$veri2[0]->adsoy?>"/>
													</div>
													<div class="position-relative form-group">
														<label class="">Telefon</label>
														<input name="tel" type="text" class="form-control" value="<?=$veri2[0]->tel?>"/>
													</div>
													<div class="position-relative form-group">
														<label class="">Adres</label>
														<input name="adres" type="text" class="form-control" value="<?=$veri2[0]->adres?>"/>
													</div>
                                                    <div class="position-relative form-group">
														<label class="">Toplam Tutar<sup>*</sup></label>
														<input name="toplam" type="text" class="form-control" readonly value="<?=$toplam?> TL"/>
													</div>
                                                    
                                                    <button class="mt-1 btn btn-primary" type="submit">SİPARİŞİ TAMAMLA</button>
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