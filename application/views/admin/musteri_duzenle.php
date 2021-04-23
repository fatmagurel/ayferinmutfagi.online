	<?php
		$this->load->view('admin/_header');
		$this->load->view('admin/_sidebar');
	?>
<div id="content">
                    <div class="outer">
                        <div class="inner bg-light lter">
                            <div class="row">
    <div class="col-lg-12">
        <div class="box">
            <header class="dark">
                <div class="icons"><i class="">➕</i></div>
                <h5>Üye Düzenle</h5>
                <!-- .toolbar -->
            

            </header>
            <div id="collapse2" class="body">
                <form class="form-horizontal" id="popup-validation" action="<?=base_url()?>admin/musteriler/guncelle/<?=$veri[0]->Id?>" method="post">

                    <div class="form-group">
                        <label class="control-label col-lg-4">Adı Soyadı</label>
                        <div class="col-lg-4">
                            <input type="text" class="validate[required] form-control" name="adsoy" value="<?=$veri[0]->adsoy?>" id="adsoy">
                        </div>
                    </div>

					<div class="form-group">
                        <label class="control-label col-lg-4">E-mail</label>

                        <div class=" col-lg-4">
                            <input class="validate[required,custom[email]] form-control" type="email" value="<?=$veri[0]->email?>"name="email"
                                   id="email"/>
                        </div>
                    </div>
					
					<div class="form-group">
                        <label class="control-label col-lg-4">Şifre</label>

                        <div class=" col-lg-4">
                            <input class="validate[required] form-control" type="password" value="<?=$veri[0]->sifre?>" name="sifre" id="sifre"/>
                        </div>
                    </div>
					
					
					

                    <div class="form-actions no-margin-bottom">
                        <input type="submit" value="Güncelle" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /.col-lg-12 -->
</div>
                        </div>
                        <!-- /.inner -->
                    </div>
                    <!-- /.outer -->
                </div>
                <!-- /#content -->
	<?php
		$this->load->view('admin/_footer');
	?>