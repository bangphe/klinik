<?php
/* @var $this ItemController */
/* @var $model Item */

$this->breadcrumbs=array(
	'Data Item'=>array('index'),
	$model->NAMA_ITEM,
);
?>

<?php echo Yii::app()->user->getFlash('info') ?>

<div class="portlet light">
    <div class="portlet-title">
        <div class="caption">
            <i class="icon-speech"></i>
            <span class="caption-subject bold uppercase"> <?= $model->NAMA_ITEM; ?></span>
        </div>
        <div class="actions">
            <?php echo CHtml::link('<i class="fa fa-plus"></i> Tambah Barang', array('/admin/item/create'),array('class' => 'btn default')) ?>
            <?php echo CHtml::link('<i class="fa fa-user"></i> Update Stok', array('/admin/item/updatestok', 'id' => $model->ID_ITEM),array('class' => 'btn blue')) ?>
            <?php echo CHtml::link('<i class="fa fa-edit"></i> Edit', array('/admin/item/update', 'id' => $model->ID_ITEM), array('class' => 'btn btn-danger')) ?>
        </div>
    </div>
    <div class="portlet-body">
    	<div class="note note-info">
    		<strong>Info!</strong> Stok tersedia <span class="label label-primary"><?= Item::getStokItem($model->ID_ITEM); ?></span>
        </div>
    	<div class="tabbable-line tabbable-full-width">
		    <ul class="nav nav-tabs">
		        <li class="active">
		            <a href="#tab_1_1" data-toggle="tab" aria-expanded="true"> Detil </a>
		        </li>
		        <li class="">
		            <a href="#tab_1_3" data-toggle="tab" aria-expanded="false"> Stok Item </a>
		        </li>
		    </ul>
		    <div class="tab-content">
		        <div class="tab-pane active" id="tab_1_1">
		            <div class="row">
		            	<div class="col-md-12">
		            		<div class="table-scrollable">
	                    		<?php $this->widget('zii.widgets.CDetailView', array(
							 		'data' => $model,
							        'htmlOptions' => array(
							            'class' => 'table table-bordered',
							        ),
							 		'attributes'=>array(
										'ID_ITEM',
										array(
                                            'name'=>'KATEGORI',
                                            'type'=>'kategori',
                                            'value'=>$model->ID_KATEGORI
                                        ),
										'NAMA_ITEM',
										'UKURAN',
										'SATUAN',
										array(
											'name'=>'HARGA_JUAL',
											'type'=>'uang',
											'value'=>$model->HARGA_JUAL,
										),
										array(
											'name'=>'TANGGAL_EXPIRED',
											'type'=>'tanggal',
											'value'=>$model->TANGGAL_EXPIRED,
										),
										array(
                                            'name'=>'STATUS',
                                            'type'=>'statusAktif',
                                            'value'=>$model->STATUS
                                        ),
									),
							 		)); 
							 	?>
		                    </div>
		            	</div>
		            </div>
		        </div>
		        <!--tab_1_2-->
		        <div class="tab-pane" id="tab_1_3">
		            <div class="portlet-body">
		                <div class="table-responsive">
		                    <table class="table table-striped table-hover table-bordered">
			                    <thead>
			                        <tr>
			                            <th>#</th>
			                            <th>Supplier</th>
			                            <th>Harga Beli</th>
			                            <th>Stok</th>
			                            <th>Tgl Beli</th>
			                            <th>Jatuh Tempo</th>
			                            <th>Tgl Pembayaran</th>
			                            <th>Status</th>
			                            <th>Aksi</th>
			                        </tr>
			                    </thead>
			                    <tbody>
			                        <?php foreach ($detil_item as $dex => $item) { ?>
			                        <tr>
			                            <td><?php echo $dex+1;?></td>
			                            <td><?php echo Supplier::getSupplierById($item->ID_SUPPLIER);?></td>
			                            <td><?php echo MyFormatter::formatUang($item->HARGA_BELI);?></td>
			                            <td><?php echo $item->STOK;?></td>
			                            <td><?php echo MyFormatter::formatTanggalWaktu($item->TANGGAL_INPUT);?></td>
			                            <td><?php echo MyFormatter::formatTanggal($item->TANGGAL_JATUH_TEMPO);?></td>
			                            <td><?php echo $item->TANGGAL_PEMBAYARAN=='0000-00-00' || $item->TANGGAL_PEMBAYARAN==null ? '-' : MyFormatter::formatTanggal($item->TANGGAL_PEMBAYARAN);?></td>
			                            <td><?php echo MyFormatter::statusPembayaran($item->STATUS_PEMBAYARAN); ?></td>
			                            <td>
			                            	<?php if ($item->STATUS_PEMBAYARAN == DetilItem::STATUS_HUTANG) {?>
			                            	<?php echo CHtml::link('<i class="fa fa-check"></i>',array('/admin/item/step/','id'=>$item->ID_DETIL_ITEM),array('class'=>'btn green btn-sm btn-outline sbold uppercase','submit'=>array('step','id'=>$item->ID_DETIL_ITEM),'confirm'=>'Apakah Anda yakin?')); ?>
			                            	<?php } ?>
			                            </td>
			                        </tr>
			                        <?php } ?>
			                    </tbody>
		                    </table>
		                </div>
		            </div>
		        </div>
		        <!--end tab-pane-->
		    </div>
		</div>
    </div>
</div>