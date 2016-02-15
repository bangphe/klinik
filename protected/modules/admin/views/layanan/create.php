<?php
/* @var $this LayananController */
/* @var $model Layanan */

$this->breadcrumbs=array(
	'Layanans'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Layanan', 'url'=>array('index')),
	array('label'=>'Manage Layanan', 'url'=>array('admin')),
);
?>

<h1>Create Layanan</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>