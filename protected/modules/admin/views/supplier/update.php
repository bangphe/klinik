<?php
/* @var $this SupplierController */
/* @var $model Supplier */

$this->breadcrumbs=array(
	'Data Supplier'=>array('index'),
	$model->NAMA_SUPPLIER=>array('view','id'=>$model->ID_SUPPLIER),
	'Update',
);
?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>