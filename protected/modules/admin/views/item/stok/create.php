<?php
/* @var $this BarangController */
/* @var $model Barang */

$this->breadcrumbs=array(
	'Data Item'=>array('index'),
	'Tambah Stok Item',
);
?>

<?php echo Yii::app()->user->getFlash('info');?>

<?php echo $this->renderPartial('stok/_form', array('item'=>$item,'detil_item'=>$detil_item)); ?>