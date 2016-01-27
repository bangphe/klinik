<?php
/* @var $this KategoriController */
/* @var $model Kategori */

$this->breadcrumbs=array(
	'Kategoris'=>array('index'),
	$model->ID_KATEGORI=>array('view','id'=>$model->ID_KATEGORI),
	'Update',
);

$this->menu=array(
	array('label'=>'List Kategori', 'url'=>array('index')),
	array('label'=>'Create Kategori', 'url'=>array('create')),
	array('label'=>'View Kategori', 'url'=>array('view', 'id'=>$model->ID_KATEGORI)),
	array('label'=>'Manage Kategori', 'url'=>array('admin')),
);
?>

<h1>Update Kategori <?php echo $model->ID_KATEGORI; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>