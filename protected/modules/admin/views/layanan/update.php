<?php
/* @var $this LayananController */
/* @var $model Layanan */

$this->breadcrumbs=array(
	'Layanans'=>array('index'),
	$model->ID_LAYANAN=>array('view','id'=>$model->ID_LAYANAN),
	'Update',
);

$this->menu=array(
	array('label'=>'List Layanan', 'url'=>array('index')),
	array('label'=>'Create Layanan', 'url'=>array('create')),
	array('label'=>'View Layanan', 'url'=>array('view', 'id'=>$model->ID_LAYANAN)),
	array('label'=>'Manage Layanan', 'url'=>array('admin')),
);
?>

<h1>Update Layanan <?php echo $model->ID_LAYANAN; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>