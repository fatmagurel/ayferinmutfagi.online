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
                <h5>Kategori Ekle</h5>
                <!-- .toolbar -->
            

            </header>
            <div id="collapse2" class="body">
                <form class="form-horizontal" id="popup-validation" action="<?=base_url()?>admin/kategoriler/kaydet/" method="post">

                    <div class="form-group">
                        <label class="control-label col-lg-4">Kategori Adı</label>
                        <div class="col-lg-4">
                            <input type="text" class="validate[required] form-control" name="adi" id="adi">
                        </div>
                    </div>
                    <div class="form-actions no-margin-bottom">
                        <input type="submit" value="Kaydet" class="btn btn-primary">
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