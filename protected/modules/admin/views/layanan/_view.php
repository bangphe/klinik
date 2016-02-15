<?php
/* @var $this LayananController */
/* @var $data Layanan */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID_LAYANAN')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ID_LAYANAN), array('view', 'id'=>$data->ID_LAYANAN)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('LAYANAN')); ?>:</b>
	<?php echo CHtml::encode($data->LAYANAN); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('BIAYA')); ?>:</b>
	<?php echo CHtml::encode($data->BIAYA); ?>
	<br />


</div>