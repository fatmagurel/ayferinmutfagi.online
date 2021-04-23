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
                <h5>Sipariş Listesi</h5>
                <div class="toolbar">
				
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
                            <th>Adı Soyadı</th>
                            <th>Ürün</th>
                            <th>Adet</th>
                            <th>Fiyat</th>
                            <th>Adres</th>
                            <th>Telefon</th>
							<th>Toplam</th>
							<th>Tarih</th>
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
                            <td><?=$rs->adsoy?></td>
                            <td><?=$rs->adi?></td>
                            <td><?=$rs->adet?></td>
                            <td><?=$rs->fiyat?></td>
                            <td><?=$rs->adres?></td>
                            <td><?=$rs->tel?></td>
							<td><?=$rs->toplam?></td>
							<td><?=$rs->tarih?></td>
                            <td><a href="<?=base_url()?>admin/siparisler/sil/<?=$rs->Id?>" class="btn btn-danger btn-xs btn-circle" onclick="return confirm('Silmek İstediğinizden Emin Misiniz?')">X</a></td>
                            
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