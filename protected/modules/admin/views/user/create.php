<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Data User'=>array('index'),
	'Tambah',
);
?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>