	<?php
		$this->load->view('_header');
		
	?>
	
	<div class="hero-wrap hero-bread" style="background-image: url('<?=base_url()?>/assets/images/bg_1.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="<?=base_url()?>/Home">Anasayfa</a></span>/<span>Siparişlerim</span></p>
			<h1 class="mb-0 bread">Sipariş Detayları</h1>
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
									 
                                    <div class="card-body"><h5 class="card-title">Sipariş Detayları<button type="button" style="float:right"  class="btn btn-info btn-xs btn-grad"><h5><a href="<?=base_url()?>home">
										<font color="#fff"><i class="glyphicon glyphicon-user"></i>  Sipariş Ekle</font></a></h5></button></h5>
                                        <?php if($this->session->flashdata("iptal")){?>
										<div class="callout callout-info">
											<br><strong><i><p class="text-success"><?=$this->session->flashdata("iptal")?></p></i></strong>
										</div>
										<?php }?>
										<table class="mb-0 table table-striped">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Adı</th>
												<th>Adet</th>
												<th>Tutar</th>
												<th>Tarih</th>
												<th>İptal</th>
                                            </tr>
											
		
													<?php
												$rn=0;
												$toplam=0;
												foreach($veriler as $rs)
												{
													$rn++;
													$toplam+=$rs->toplam;
												?>
												<tr>
													<td style="width: 10px"><?=$rn?></td>
													<td><?=$rs->adi?></td>
													<td><?=$rs->adet?></td>
													<td><?=$rs->toplam?> TL</td>
													<td><?=$rs->tarih?></td>
													<td><a href="<?=base_url()?>home/sepet_iptal/<?=$rs->Id?>" onclick="return confirm('İptal Edilecek Emin Misin?')" class="btn btn-block btn-danger btn-xs"><i class="fa fa-remove"></i>İptal</a>
													</td>
												</tr>
												<?php
												}?>
                                            </thead>
                                            
                                        </table>
                                    </div>
                                </div>
                            </div>
			
		</div>
		</div>
	</section>
	
		<?php
		$this->load->view('_footer');
	?>
	