<?php
		$this->load->view('_header');
		
	?>
		

    <div class="hero-wrap hero-bread" style="background-image: url('<?=base_url()?>/assets/images/bg_1.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="<?=base_url()?>/Home">ANASAYFA</a></span>/<span class="mr-2"><a href="index.html">ÜRÜN DETAY</a></span>
            <h1 class="mb-0 bread">ÜRÜN DETAY</h1>
          </div>
        </div>
      </div>
    </div>
	
    <section class="ftco-section" style="margin:0 auto;">
	<center>
			<div class="mb-2 mr-2 badge badge-pill badge-success" style="margin:0 auto;"><?=$this->session->flashdata("urun")?></div>
		</center>
    	<div class="container">
		
    		<div class="row">
    			<div class="col-xs-6 col-lg-6 mb-5 ftco-animate">
    				<img src="<?=base_url()?>uploads/<?=$veriler[0]->resim?>" class="img-fluid" alt="Colorlib Template">
    			</div>
    			<div class="col-xs-6 col-lg-6 product-details pl-md-5 ftco-animate">
    				<h3><?=$veriler[0]->adi?></h3>
    				<div class="rating d-flex">
							<p class="text-left mr-4">
								<a href="#" class="mr-2"><p><?=$veriler[0]->aciklama?></p></a>
								<a href="#"><span class="ion-ios-star-outline"></span></a>
								<a href="#"><span class="ion-ios-star-outline"></span></a>
								<a href="#"><span class="ion-ios-star-outline"></span></a>
								<a href="#"><span class="ion-ios-star-outline"></span></a>
								<a href="#"><span class="ion-ios-star-outline"></span></a>
							</p>
						</div>
    				<p class="mr-2"><span><?=$veriler[0]->fiyat?> TL</span></p>
					<span>
						<form class="form-horizontal qtyFrm" method="post" action="<?=base_url()?>home/sepete_ekle">
							<div class="control-group">
								<div class="row mt-4">
									<div class="w-100"></div>
									<div class="input-group col-md-6 d-flex mb-3">
										<span class="input-group-btn mr-2">Adet</span>
										<input type="hidden" name="urunid" value="<?=$veriler[0]->Id?>"/>
										<input type="number" id="quantity" name="adet" step="1" title="Qty" class="form-control input-number" value="1" min="1" max="100">
									</div>
									<div class="w-100"></div>
								</div>
							</div>
							<button class="mb-2 mr-2 btn btn-success">&#127869; SEPETE EKLE</button>
					</form>
					</span>
    			</div>
    		</div>
    	</div>
    </section>
	<?php
		$this->load->view('_footer');
	?>