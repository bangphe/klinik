<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Data User'=>array('index'),
	$model->NAMA,
);

?>

<?php echo Yii::app()->user->getFlash('info') ?>

<div class="portlet box red">
	<div class="portlet-title">
		<div class="caption">
			<i class="fa fa-desktop"></i>Data User #<?php echo $model->NAMA; ?>
		</div>
		<div class="actions">
			<?php echo CHtml::link('<i class="fa fa-edit"></i> Ubah', array('update', 'id' => $model->ID_USER), array('class' => 'btn btn-default btn-sm')) ?>
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
		 			'ID_USER',
					'ID_ROLE',
					'NAMA',
					'USERNAME',
					'PASSWORD',
					'TERAKHIR_LOGIN',
					'STATUS',
		 			),
		 		)); 
		 	?>
        </div>
	</div>
</div>
