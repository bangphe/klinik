<?php
/* @var $this ItemController */
/* @var $model Item */

$this->breadcrumbs=array(
	'Data Item'=>array('index'),
	$item->NAMA_ITEM=>array('view','id'=>$item->ID_ITEM),
	'Update',
);
?>

<?php $this->renderPartial('_form_update', array('item'=>$item)); ?>