<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Data Layanan'=>array('index'),
	'Tambah',
);
?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>