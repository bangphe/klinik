<?php
/* @var $this OrderController */
/* @var $model Order */

$this->breadcrumbs=array(
	'Orders'=>array('index'),
	$model->KODE_ORDER,
);

?>

<div class="portlet box green">
	<div class="portlet-title">
		<div class="caption">
			<i class="fa fa-desktop"></i>Data Order #<?php echo $model->KODE_ORDER; ?>
		</div>
		<div class="actions">
            <a href="update" class="btn btn-default btn-sm">
                <i class="fa fa-pencil"></i> Ubah </a>
                <?php echo CHtml::link('<i class="fa fa-edit"></i>', array('update', 'id' => $model->KODE_ORDER)) ?>
        </div>
	</div>
	<div class="portlet-body">
		<div class="table-scrollable">
		 	<?php $this->widget('zii.widgets.CDetailView', array(
		 		'data' => $model,
                'htmlOptions' => array(
                    'class' => 'table table-bordered table-striped',
                ),
		 		'attributes'=>array(
		 			'KODE_ORDER',
					'ID_PASIEN',
					'TANGGAL_ORDER',
					'USER_PEMBUAT',
					'PEMBAYARAN',
					'KEMBALIAN',
		 			),
		 		)); 
		 	?>
        </div>
	</div>
</div>