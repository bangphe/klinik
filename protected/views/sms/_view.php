<?php
/* @var $this SmsController */
/* @var $data SmsLog */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID_SMS_LOG')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ID_SMS_LOG), array('view', 'id'=>$data->ID_SMS_LOG)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID_USER')); ?>:</b>
	<?php echo CHtml::encode($data->ID_USER); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID_PELANGGAN')); ?>:</b>
	<?php echo CHtml::encode($data->ID_PELANGGAN); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PESAN')); ?>:</b>
	<?php echo CHtml::encode($data->PESAN); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TUJUAN')); ?>:</b>
	<?php echo CHtml::encode($data->TUJUAN); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TANGGAL_KIRIM')); ?>:</b>
	<?php echo CHtml::encode($data->TANGGAL_KIRIM); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('STATUS')); ?>:</b>
	<?php echo CHtml::encode($data->STATUS); ?>
	<br />


</div>