<?php
	if(!$this->session->userdata('uye_session'))
		{
			$this->session->set_flashdata('mesaj', 'Giriş Yapmadınız!');
			redirect(base_url()."home/uyelik");
		}
?>
<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					
						<div class="main-card mb-3 card">
                            <div class="card-body">
                                <div class="row">
										<ul class="nav"  style="margin:0 auto;">
											<a href="<?=base_url()?>home/uye_paneli" class="nav-link">Hesap Bilgilerim</a>
                                            <a href="<?=base_url()?>/home/sepet" class="nav-link">Sepetim</a>
											<a href="<?=base_url()?>/home/siparislerim" class="nav-link">Siparişlerim</a>
                                            <a href="<?=base_url()?>home/cikis" class="nav-link">Çıkış</a>
										</ul>	
								</div>
							</div>
						</div>
					
				</div>
			</div>
		</div>
</section>