	<?php
		$this->load->view('admin/_header');
		$this->load->view('admin/_sidebar');
	?>
<div id="content">
      <div class="outer">
        <div class="inner bg-light lter">
             <div class="col-lg-6">
        <div class="box" style=" width: 1100px;">
            <header>
                <h5>Kategori Listesi</h5>
                <div class="toolbar">
                    <div class="btn-group">
                        
                    <a href="<?=base_url()?>admin/kategoriler/ekle" class="btn btn-info btn-sm btn-rect">Kategori Ekle</a>
                    </div>


                </div>
            </header>
			
			<tr>
                <td>
                    <span class="label label-info"><?=$this->session->flashdata("mesaj")?></span>
                </td>
                
                </tr>
						
            <div id="stripedTable" class="body collapse in">
                <table class="table table-striped responsive-table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Kategori Adı</th>
                            <th>Düzenle</th>
                            <th>Sil</th>
                        </tr>
                    </thead>
                    <tbody>
					<?php
						foreach($veriler as $rs)
						{
						?>
                        <tr>
							<th scope="row"><?=$rs->Id?></th>
                            <td><?=$rs->adi?></td>
							<td><a href="<?=base_url()?>admin/kategoriler/duzenle/<?=$rs->Id?>" class="btn btn-info btn-sm btn-round">Düzenle</a></td>
                            <td><a href="<?=base_url()?>admin/kategoriler/sil/<?=$rs->Id?>" class="btn btn-danger btn-xs btn-circle" onclick="return confirm('Silmek İstediğinizden Emin Misiniz?')">X</a></td>
                            
                        </tr>
                        
						<?php
						}
						?>
                    </tbody>                
					</table>
            </div>
        </div>
    </div>
                        </div>
                        <!-- /.inner -->
                    </div>
                    <!-- /.outer -->
</div>
	<?php
		$this->load->view('admin/_footer');
	?>