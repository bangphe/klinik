<?php
/* @var $this SmsController */
/* @var $model SmsLog */

$this->breadcrumbs=array(
	'Sms Logs'=>array('index'),
	$model->ID_SMS_LOG,
);

$this->menu=array(
	array('label'=>'List SmsLog', 'url'=>array('index')),
	array('label'=>'Create SmsLog', 'url'=>array('create')),
	array('label'=>'Update SmsLog', 'url'=>array('update', 'id'=>$model->ID_SMS_LOG)),
	array('label'=>'Delete SmsLog', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ID_SMS_LOG),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SmsLog', 'url'=>array('admin')),
);
?>

<h1>View SmsLog #<?php echo $model->ID_SMS_LOG; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ID_SMS_LOG',
		'ID_USER',
		'ID_PELANGGAN',
		'PESAN',
		'TUJUAN',
		'TANGGAL_KIRIM',
		'STATUS',
	),
)); ?>
