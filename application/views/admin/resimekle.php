	<?php
		$this->load->view('admin/_header');
		$this->load->view('admin/_sidebar');
	?>
<div id="content">
                    <div class="outer">
                        <div class="inner bg-light lter">
                            <h3>Resim Ekleme Formu</h3>
							<form action="<?=base_url()?>admin/urunler/resim_upload/<?=$id?>" method="post" enctype="multipart/form-data">
								
								<input type="file" name="userfile" size="20"/>
								<input type="submit" value="Yükle"/>
								
							</form>
						</div>
                        <!-- /.inner -->
                    </div>
                    <!-- /.outer -->
                </div>
                <!-- /#content -->
<?php
		$this->load->view('admin/_footer');
	?>				
				
				
				
				