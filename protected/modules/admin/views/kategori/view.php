<?php
/* @var $this KategoriController */
/* @var $model Kategori */

$this->breadcrumbs=array(
	'Data Kategori'=>array('index'),
	$model->KATEGORI,
);
?>

<div class="portlet box blue-steel">
	<div class="portlet-title">
		<div class="caption">
			<i class="fa fa-desktop"></i>Data Kategori #<?php echo $model->KATEGORI; ?>
		</div>
		<div class="actions">
			<?php echo CHtml::link('<i class="fa fa-edit"></i> Ubah', array('/admin/kategori/update', 'id' => $model->ID_KATEGORI), array('class' => 'btn btn-default btn-sm')) ?>
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
						'ID_KATEGORI',
						'KATEGORI',
					),
		 		)); 
		 	?>
        </div>
	</div>
</div>
