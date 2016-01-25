<?php
/* @var $this OrderController */
/* @var $data Order */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('KODE_ORDER')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->KODE_ORDER), array('view', 'id'=>$data->KODE_ORDER)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID_PASIEN')); ?>:</b>
	<?php echo CHtml::encode($data->ID_PASIEN); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TANGGAL_ORDER')); ?>:</b>
	<?php echo CHtml::encode($data->TANGGAL_ORDER); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('USER_PEMBUAT')); ?>:</b>
	<?php echo CHtml::encode($data->USER_PEMBUAT); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PEMBAYARAN')); ?>:</b>
	<?php echo CHtml::encode($data->PEMBAYARAN); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('KEMBALIAN')); ?>:</b>
	<?php echo CHtml::encode($data->KEMBALIAN); ?>
	<br />


</div>