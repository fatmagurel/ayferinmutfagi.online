	<?php
		$this->load->view('_header');
	?>
	<div class="hero-wrap hero-bread" style="background-image: url('<?=base_url()?>/assets/images/bg_1.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="<?=base_url()?>/Home">Anasayfa</a></span>/<span>Sipariş Onayı</span></p>
			<h1 class="mb-0 bread">Sipariş Onay</h1>
          </div>
        </div>
      </div>
    </div>	
	
	<?php
		$this->load->view('_uyesidebar');
	?>	

		<div class="container">
			<div class="row">
				<div class="mb-3 text-center card card-body col-sm-6" style="margin:0 auto;">
					<h5 class="card-title">Siparişiniz Tamamlanmıştır</h5>Bizi Tercih Ettiğiniz İçin Teşekkür Ederiz. Ürününüz En Kısa Sürede Size İletilecektir...
					 <form action="<?=base_url()?>home" method="post" class="form-horizontal" id="popup-validation">
                       <br> <button class="btn btn-primary">Alışverişe Devam Et</button>
					</form>
                </div>
				
			</div>
		</div>
	</section>

	
	
	
	<?php
		$this->load->view('_footer');
	?>