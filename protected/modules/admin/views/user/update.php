<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->ID_USER=>array('view','id'=>$model->ID_USER),
	'Update',
);

?>


<?php $this->renderPartial('_form', array('model'=>$model)); ?>