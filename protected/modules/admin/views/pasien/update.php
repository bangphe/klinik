<?php
/* @var $this PasienController */
/* @var $model Pasien */

$this->breadcrumbs=array(
	'Data Pasien'=>array('index'),
	$model->NAMA_PASIEN=>array('view','id'=>$model->ID_PASIEN),
	'Update',
);
?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>