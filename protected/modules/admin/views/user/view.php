<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->ID_USER,
);

?>

<div class="portlet box red">
	<div class="portlet-title">
		<div class="caption">
			<i class="fa fa-desktop"></i>Data User #<?php echo $model->NAMA; ?>
		</div>
		<div class="actions">
            <a href="update" class="btn btn-default btn-sm">
                <i class="fa fa-pencil"></i> Ubah </a>
                <?php echo CHtml::link('<i class="fa fa-edit"></i>', array('update', 'id' => $model->ID_USER)) ?>
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
