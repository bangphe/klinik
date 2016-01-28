<?php
/* @var $this KategoriController */
/* @var $model Kategori */

$this->breadcrumbs=array(
	'Data Kategori'=>array('index'),
	$model->KATEGORI=>array('view','id'=>$model->ID_KATEGORI),
	'Update',
);
?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>