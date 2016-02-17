<?php
/* @var $this LayananController */
/* @var $model Layanan */

$this->breadcrumbs=array(
	'Layanans'=>array('index'),
	$model->ID_LAYANAN=>array('view','id'=>$model->ID_LAYANAN),
	'Update',
);

?>

<h1>Update Layanan <?php echo $model->ID_LAYANAN; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>