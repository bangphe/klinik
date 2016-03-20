<?php
/* @var $this SupplierController */
/* @var $model Supplier */

$this->breadcrumbs=array(
	'Data Supplier'=>array('index'),
	$model->NAMA_SUPPLIER,
);
?>

<?php echo Yii::app()->user->getFlash('info') ?>

<div class="portlet box blue-steel">
	<div class="portlet-title">
		<div class="caption">
			<i class="fa fa-desktop"></i>Data Supplier #<?php echo $model->NAMA_SUPPLIER; ?>
		</div>
		<div class="actions">
			<?php echo CHtml::link('<i class="fa fa-edit"></i> Ubah', array('/admin/supplier/update', 'id' => $model->ID_SUPPLIER), array('class' => 'btn btn-default btn-sm')) ?>
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
						'ID_SUPPLIER',
						'NAMA_SUPPLIER',
						'ALAMAT_SUPPLIER',
						'NO_TELP_SUPPLIER',
					),
		 		)); 
		 	?>
        </div>
	</div>
</div>
