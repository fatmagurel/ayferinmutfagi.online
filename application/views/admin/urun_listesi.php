	<?php
		$this->load->view('admin/_header');
		$this->load->view('admin/_sidebar');
	?>
<div id="content">
      <div class="outer">
        <div class="inner bg-light lter">
             <div class="col-lg-12">
        <div class="box">
            <header>
                <h5>Ürün Listesi</h5>
                <div class="toolbar">
                    <div class="btn-group">
                        
                    <a href="<?=base_url()?>admin/urunler/ekle" class="btn btn-info btn-sm btn-rect">Ürün Ekle</a>
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
                            <th>Ürün Id</th>
                            <th>Ürün Adı</th>
                            <th>Kategorisi</th>
                            <th>Fiyat</th>
                            <th>Resim</th>
                            <th>Açıklama</th>
                            <th>Tarih</th>
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
                            <td><?=$rs->katadi?></td>
                            <td><?=$rs->fiyat?></td>
                            <td>
							
							<?php if($rs->resim)
							{?>
						<a href="<?=base_url()?>admin/urunler/resimekle/<?=$rs->Id?>">
							<img src="<?=base_url()?>uploads/<?=$rs->resim?>"height="30" width="70"/>
							<?php } else {?>
							<td><a href="<?=base_url()?>admin/urunler/resimekle/<?=$rs->Id?>" class="btn btn-info btn-sm btn-round">Resim Ekle</a></td>
                            
							<?php }?>
							</a>
							</td>
                            <td><?=$rs->aciklama?></td>
                            <td><?=$rs->tarih?></td>
                            <td><a href="<?=base_url()?>admin/urunler/duzenle/<?=$rs->Id?>" class="btn btn-info btn-sm btn-round">Düzenle</a></td>
                            <td><a href="<?=base_url()?>admin/urunler/sil/<?=$rs->Id?>" class="btn btn-danger btn-xs btn-circle" onclick="return confirm('Silmek İstediğinizden Emin Misiniz?')">X</a></td>
                            
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