<?php
/* @var $this ItemController */
/* @var $data Item */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID_ITEM')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ID_ITEM), array('view', 'id'=>$data->ID_ITEM)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID_KATEGORI')); ?>:</b>
	<?php echo CHtml::encode($data->ID_KATEGORI); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NAMA_ITEM')); ?>:</b>
	<?php echo CHtml::encode($data->NAMA_ITEM); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('UKURAN')); ?>:</b>
	<?php echo CHtml::encode($data->UKURAN); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('SATUAN')); ?>:</b>
	<?php echo CHtml::encode($data->SATUAN); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('HARGA_JUAL')); ?>:</b>
	<?php echo CHtml::encode($data->HARGA_JUAL); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TANGGAL_EXPIRED')); ?>:</b>
	<?php echo CHtml::encode($data->TANGGAL_EXPIRED); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('STATUS')); ?>:</b>
	<?php echo CHtml::encode($data->STATUS); ?>
	<br />

	*/ ?>

</div>