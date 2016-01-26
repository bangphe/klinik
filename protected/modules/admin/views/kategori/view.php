<?php
/* @var $this KategoriController */
/* @var $model Kategori */

$this->breadcrumbs=array(
	'Kategoris'=>array('index'),
	$model->ID_KATEGORI,
);

$this->menu=array(
	array('label'=>'List Kategori', 'url'=>array('index')),
	array('label'=>'Create Kategori', 'url'=>array('create')),
	array('label'=>'Update Kategori', 'url'=>array('update', 'id'=>$model->ID_KATEGORI)),
	array('label'=>'Delete Kategori', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ID_KATEGORI),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Kategori', 'url'=>array('admin')),
);
?>

<h1>View Kategori #<?php echo $model->ID_KATEGORI; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ID_KATEGORI',
		'KATEGORI',
	),
)); ?>
