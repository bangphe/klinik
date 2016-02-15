<?php
/* @var $this LayananController */
/* @var $model Layanan */

$this->breadcrumbs=array(
	'Layanans'=>array('index'),
	$model->ID_LAYANAN,
);

$this->menu=array(
	array('label'=>'List Layanan', 'url'=>array('index')),
	array('label'=>'Create Layanan', 'url'=>array('create')),
	array('label'=>'Update Layanan', 'url'=>array('update', 'id'=>$model->ID_LAYANAN)),
	array('label'=>'Delete Layanan', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ID_LAYANAN),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Layanan', 'url'=>array('admin')),
);
?>

<h1>View Layanan #<?php echo $model->ID_LAYANAN; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ID_LAYANAN',
		'LAYANAN',
		'BIAYA',
	),
)); ?>
