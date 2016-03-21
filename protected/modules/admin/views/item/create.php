<?php
/* @var $this ItemController */
/* @var $model Item */

$this->breadcrumbs=array(
	'Data Item'=>array('index'),
	'Tambah',
);
?>

<?php echo Yii::app()->user->getFlash('info');?>

<?php $this->renderPartial('_form', array('item'=>$item, 'detil_item'=>$detil_item)); ?>