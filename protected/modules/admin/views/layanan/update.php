<?php
/* @var $this LayananController */
/* @var $model Layanan */

$this->breadcrumbs=array(
	'Layanans'=>array('index'),
	$model->ID_LAYANAN=>array('view','id'=>$model->ID_LAYANAN),
	'Update',
);

?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>