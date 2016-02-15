<?php
/* @var $this LayananController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Layanans',
);

$this->menu=array(
	array('label'=>'Create Layanan', 'url'=>array('create')),
	array('label'=>'Manage Layanan', 'url'=>array('admin')),
);
?>

<h1>Layanans</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
