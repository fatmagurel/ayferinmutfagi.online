	<?php
		$this->load->view('admin/_header');
		$this->load->view('admin/_sidebar');
	?>
<div id="content">
                    <div class="outer">
                        <div class="inner bg-light lter">
                            <div class="col-lg-12">
        <div class="box">
            <header class="dark">
                <div class="icons"><i class="">➕</i></div>
                <h5>Ayarlar</h5>
                <!-- .toolbar -->
				
            </header>
            <div class="page-content-wrap">
					<div class="row">
						<div class="col-md-12">
							<div class="panel panel-default">
								<!-- START CONTENT FRAME TOP -->
								
								<?php
				if($this->session->flashdata("mesaj"))
				{
					?>
					<span class="label label-info"><strong><?=$this->session->flashdata("mesaj")?></strong></span>
				<?php
				}
				?>
								<div class="panel-body panel-body-table">
								
									<div class="nav-tabs-custom">
										
										<form method="post" class="form-horizontal" action="<?=base_url()?>admin/home/ayarlar_guncelle/<?=$veri[0]->Id?>">       
										<div class="tab-content">
											<div class="tab-pane active" id="genel">
												<div class="panel-body">                   
												<div class="form-group">
													<label class="col-md-3 control-label">Site Adı:</label>
													<div class="col-md-6 col-xs-12">
														<input type="text" class="form-control" value="<?=$veri[0]->adi?>" name="adi"/>
													</div>
												</div> 
												<div class="form-group">
													<label class="col-md-3 control-label">Açıklama:</label>
													<div class="col-md-6 col-xs-12">
														<input type="text" class="form-control" value="<?=$veri[0]->aciklama?>" name="aciklama"/>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label">Anahtar Kelimeler:</label>
													<div class="col-md-6 col-xs-12">
														<input type="text" class="form-control" value="<?=$veri[0]->keywords?>" name="keywords"/>
													</div>
												</div>
												   
												<div class="form-group">
													<label class="col-md-3 control-label">Telefon:</label>
													<div class="col-md-6 col-xs-12">
														<input type="text" class="form-control" value="<?=$veri[0]->tel?>" name="tel"/>
													</div>
												</div> 
												<div class="form-group">
													<label class="col-md-3 control-label">Şehir:</label>
													<div class="col-md-6 col-xs-12">
														<input type="text" class="form-control" value="<?=$veri[0]->sehir?>" name="sehir"/>
													</div>
												</div>
												
												<div class="form-group">
													<label class="col-md-3 control-label">Logo:</label>
													<div class="col-md-6 col-xs-12" ><input type="file" name="logo"value="<?=$veri[0]->logo?>" />
												</div>
										    </div>
											<div class="tab-pane" id="email">
												<div class="panel-body">                       
												<div class="form-group">
													<label class="col-md-3 control-label">Email:</label>
													<div class="col-md-6 col-xs-12">
														<input type="email" class="form-control" value="<?=$veri[0]->email?>" name="email"/>
													</div>
												</div>
												</div>
											</div>
										
											
											
											<div class="form-group">
					
                        <label class="control-label col-lg-4">Hakkımızda</label>
                        <div class="col-lg-4">
						<script src="<?=base_url()?>ckeditor/ckeditor.js"></script>  
						<textarea id="ckeditor" class="ckeditor" name="ckeditor" ><?=$veri[0]->hakkimizda?></textarea>
						<script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'ckeditor' );
            </script>
                        </div>
                    </div>
									
										<hr>
										</div>
										<div class="">
											<button class="btn btn-primary pull-right">GÜNCELLE</button>
										</div>
										</form>
									</div>
								</div>
							</div>
							</div>
						</div>
					</div>
        </div>
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