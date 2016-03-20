<?php
/* @var $this GolonganObatController */
/* @var $model GolonganObat */

$this->breadcrumbs=array(
	'Data Golongan Obat'=>array('index'),
	$model->NAMA_GOLONGAN=>array('view','id'=>$model->ID_GOLONGAN_OBAT),
	'Update',
);
?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>