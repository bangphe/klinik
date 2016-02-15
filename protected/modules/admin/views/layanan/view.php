<?php
/* @var $this LayananController */
/* @var $model Layanan */

$this->breadcrumbs=array(
	'Data Layanan'=>array('index'),
	$model->LAYANAN,
);
?>

<?php echo Yii::app()->user->getFlash('info') ?>

<div class="portlet box blue-steel">
	<div class="portlet-title">
		<div class="caption">
			<i class="fa fa-desktop"></i>Data Layanan #<?php echo $model->LAYANAN; ?>
		</div>
		<div class="actions">
			<?php echo CHtml::link('<i class="fa fa-edit"></i> Ubah', array('/admin/layanan/update', 'id' => $model->ID_LAYANAN), array('class' => 'btn btn-default btn-sm')) ?>
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
						'ID_LAYANAN',
						'LAYANAN',
						array(
                            'name' => 'BIAYA',
                            'type' => 'uang',
                            'value' => $model->BIAYA,
                        ),
					),
		 		)); 
		 	?>
        </div>
	</div>
</div>
