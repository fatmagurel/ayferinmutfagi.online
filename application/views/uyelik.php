	<?php
		$this->load->view('_header');
	?>
	<div class="hero-wrap hero-bread" style="background-image: url('<?=base_url()?>/assets/images/bg_1.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="<?=base_url()?>/Home">Anasayfa</a></span> <span>Üye Girişi</span></p>
            <h1 class="mb-0 bread">Üye Girişi</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section contact-section bg-light">
	
      <div class="container">
        <div class="row">
				<div class="col-sm-4 col-sm-offset-1" style="margin:0 auto;">
					<div class="login-form">
            <form action="<?=base_url()?>/home/login" method="post" class="bg-white p-5 contact-form">
				<tr>
					<td>
						<div class="mb-2 mr-2 badge badge-pill badge-danger"><?=$this->session->flashdata("mesaj")?></div>
					</td>
				</tr>
				<div class="position-relative form-group"><label class="">Email</label>
					<input name="email" placeholder="Email adresinizi giriniz..." type="email" class="form-control">
				</div>
				
             <div class="position-relative form-group"><label for="examplePassword" class="">Şifre</label>
				<input name="sifre" id="examplePassword" placeholder="Şifrenizi giriniz..." type="password" class="form-control">
			</div>
              
			 <button class="mb-2 mr-2 border-0 btn-transition btn btn-outline-success">GÖNDER</button>
            </form>
			</div>
			</div>
			<center>
			<div class="width:auto">
				<div class="mb-2 mr-2 badge badge-pill badge-danger">YA DA KAYIT OL!</div>
		  
			</div>
			</center>
			 <div class="text-right" style="margin:0 auto;">
					<div class="login-form">
			 <form action="<?=base_url()?>/home/uye_ekle" method="post" class="bg-white p-5 contact-form">
				
				<div class="position-relative form-group"><label class="">Email</label>
					<input name="email" placeholder="Email adresinizi giriniz..." type="email" class="form-control">
				</div>
				
				<div class="position-relative form-group"><label class="">Adı Soyadı</label>
					<input name="adsoy" placeholder="Ad Soyadınızı giriniz..." type="text" class="form-control">
				</div>
				
             <div class="position-relative form-group"><label for="examplePassword" class="">Şifre</label>
				<input name="sifre" id="examplePassword" placeholder="Şifrenizi giriniz..." type="password" class="form-control">
			</div>
              
			 <button class="mb-2 mr-2 border-0 btn-transition btn btn-outline-success">KAYIT OL</button>
            </form>
		</div>
		</div>
		</div>
		   
        </div>
		
       
    </section>


	<?php
		$this->load->view('_footer');
	?>