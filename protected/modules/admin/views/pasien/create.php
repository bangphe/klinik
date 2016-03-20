<?php
/* @var $this PasienController */
/* @var $model Pasien */

$this->breadcrumbs=array(
	'Data Pasien'=>array('index'),
	'Tambah Data',
);
?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>