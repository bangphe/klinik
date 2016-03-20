<?php
/* @var $this OrderController */
/* @var $model Order */

$this->breadcrumbs=array(
	'Orders'=>array('index'),
	$model->KODE_ORDER=>array('view','id'=>$model->KODE_ORDER),
	'Update',
);

$this->menu=array(
	array('label'=>'List Order', 'url'=>array('index')),
	array('label'=>'Create Order', 'url'=>array('create')),
	array('label'=>'View Order', 'url'=>array('view', 'id'=>$model->KODE_ORDER)),
	array('label'=>'Manage Order', 'url'=>array('admin')),
);
?>

<h1>Update Order <?php echo $model->KODE_ORDER; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>