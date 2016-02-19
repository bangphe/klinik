<?php
/* @var $this GolonganObatController */
/* @var $model GolonganObat */

$this->breadcrumbs=array(
	'Data Golongan Obat'=>array('index'),
	$model->NAMA_GOLONGAN,
);
?>

<?php echo Yii::app()->user->getFlash('info') ?>

<div class="portlet box blue-steel">
	<div class="portlet-title">
		<div class="caption">
			<i class="fa fa-desktop"></i>Data Supplier #<?php echo $model->NAMA_GOLONGAN; ?>
		</div>
		<div class="actions">
			<?php echo CHtml::link('<i class="fa fa-edit"></i> Ubah', array('/admin/golonganobat/update', 'id' => $model->ID_GOLONGAN_OBAT), array('class' => 'btn btn-default btn-sm')) ?>
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
						'ID_GOLONGAN_OBAT',
						'NAMA_GOLONGAN',
					),
		 		)); 
		 	?>
        </div>
	</div>
</div>
