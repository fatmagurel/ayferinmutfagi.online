	<?php
		$this->load->view('_header');
		
	?>
	
	<div class="hero-wrap hero-bread" style="background-image: url('<?=base_url()?>/assets/images/bg_1.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="<?=base_url()?>/Home">Anasayfa</a></span>/<span>Sepet</span></p>
			<h1 class="mb-0 bread">Sepet</h1>
          </div>
        </div>
      </div>
    </div>	
		<?php
		$this->load->view('_uyesidebar');
		
	?>
		<div class="container">
		
			<div class="row">
			
				<div class="col-lg-12">
                                <div class="main-card mb-3 card">
                                    <div class="card-body"><h5 class="card-title">Sepetim</h5>
                                        
										<?php if($this->session->flashdata("sil")){?>
										<div class="callout callout-info">
											<center><strong><i><p class="text-success"><?=$this->session->flashdata("sil")?></p></i></center></strong>
										</div>
										<?php }?>
										<table class="mb-0 table table-striped">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Ürün</th>
                                                <th>Adı</th>
                                                <th>Fiyat</th>
                                                <th>Miktar</th>
                                                <th>Tutar</th>
                                                <th>İptal</th>
                                            </tr>
											
		
													<?php 
												$rn=0;
												$toplam=0;
												foreach($veriler as $rs)
												{
													$rn++;
													$tutar=$rs->sfiyat*$rs->adet;
													$toplam+=$tutar;
												?>
													<tr>
														<td ><?=$rn?></td>
														<td>
															<a href="<?=base_url()?>home/urun_detay/<?=$rs->urun_id?>">
																<img src="<?=base_url()?>uploads/<?=$rs->urunresim?>" height="30" width="70"/>
															</a>
														</td>
														<td><?=$rs->urunadi?></td>
														<td><?=$rs->sfiyat?> TL</td>
														<td><?=$rs->adet?></td>
														<td><?=$tutar?>TL</td>
														<td><a href="<?=base_url()?>home/sepetsil/<?=$rs->Id?>" onclick="return confirm('İptal Edilecek Emin Misin?')" class="btn btn-block btn-danger btn-xs"><i class="fa fa-remove"></i>İptal</a>
														</td>
													</tr>
												<?php 
												}?>
                                            </thead>
                                            
                                        </table>
                                    </div>
                                </div>
                            </div>
	
		<form method="post" action="<?=base_url()?>home/satinalma">
		<input type="hidden" name="toplam" value="<?=$toplam?>">
		<div class="form-group col-md-12">
							<div class="controls">
				                <input type="submit" name="submitAccount" class="btn btn-primary pull-right" value="SİPARİŞİ TAMAMLA"/>
				            </div>
							<div class="controls">
				               <br> <b>Sipariş Toplamı :<?=$toplam?>TL</b>
				            </div>
							</div>
							</form>

 
				
			
			</div>
		</div>
		</div>
	</section>
		
	<?php
		$this->load->view('_footer');
	?>