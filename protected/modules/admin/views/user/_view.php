<?php
/* @var $this UserController */
/* @var $data User */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID_USER')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ID_USER), array('view', 'id'=>$data->ID_USER)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID_ROLE')); ?>:</b>
	<?php echo CHtml::encode($data->ID_ROLE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NAMA')); ?>:</b>
	<?php echo CHtml::encode($data->NAMA); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('USERNAME')); ?>:</b>
	<?php echo CHtml::encode($data->USERNAME); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PASSWORD')); ?>:</b>
	<?php echo CHtml::encode($data->PASSWORD); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TERAKHIR_LOGIN')); ?>:</b>
	<?php echo CHtml::encode($data->TERAKHIR_LOGIN); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('STATUS')); ?>:</b>
	<?php echo CHtml::encode($data->STATUS); ?>
	<br />


</div>