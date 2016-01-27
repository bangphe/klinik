<?php
/* @var $this KategoriController */
/* @var $data Kategori */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID_KATEGORI')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ID_KATEGORI), array('view', 'id'=>$data->ID_KATEGORI)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('KATEGORI')); ?>:</b>
	<?php echo CHtml::encode($data->KATEGORI); ?>
	<br />


</div>