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
                <h5>Ürün Düzenle</h5>
                <!-- .toolbar -->
            

            </header>
            <div id="collapse2" class="body">
                <form class="form-horizontal" id="popup-validation" action="<?=base_url()?>admin/urunler/guncelle/<?=$veri[0]->Id?>" method="post">

					
                    <div class="form-group">
                        <label class="control-label col-lg-4">Ürün Adı</label>
                        <div class="col-lg-4">
                            <input type="text" class="validate[required] form-control" name="adi" value="<?=$veri[0]->adi?>" id="adi">
                        </div>
                    </div>
					
					<div class="form-group">
                    <label for="pass" class="control-label col-lg-4">Kategori</label>
						<div class="col-lg-8">
                            <select name="kategori_id"  class="form-control chzn-select" tabindex="2" >
								<option value="<?=$veri[0]->kategori_id?>"><?=$veri[0]->katadi?></option>
								<?php 
								foreach($veriler as $rs) 
								{?>
								<option value="<?=$rs->Id?>"><?=$rs->adi?></option>
								<?php }?>
							</select> 

                            </div>
                        </div>

    
					<div class="form-group">
                        <label for="username" class="control-label col-lg-4">Fiyat</label>

                        <div class="col-lg-8">
                            <input type="text" value="<?=$veri[0]->fiyat?>" name="fiyat" class="form-control">
                        </div>
                    </div>
					
					<div class="form-group">
					
                        <label class="control-label col-lg-4">Ürün Açıklaması</label>
                        <div class="col-lg-4">
						<script src="<?=base_url()?>ckeditor/ckeditor.js"></script>  
						<textarea id="ckeditor" class="ckeditor" name="aciklama" ><?=$veri[0]->aciklama?></textarea>
						<script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'aciklama' );
            </script>
                        </div>
                    </div>
					
					<div class="form-group">
                        <label class="control-label col-lg-4">Resim Yükle</label>
                        <div class="col-lg-8">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
								<div><input type="file" name="resim" ><?=$veri[0]->resim?></div>
								</div>
							</div>
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