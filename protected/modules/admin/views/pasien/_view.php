<?php
/* @var $this PasienController */
/* @var $data Pasien */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID_PASIEN')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ID_PASIEN), array('view', 'id'=>$data->ID_PASIEN)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID_LAYANAN')); ?>:</b>
	<?php echo CHtml::encode($data->ID_LAYANAN); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NAMA_PASIEN')); ?>:</b>
	<?php echo CHtml::encode($data->NAMA_PASIEN); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ALAMAT')); ?>:</b>
	<?php echo CHtml::encode($data->ALAMAT); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NO_TELP')); ?>:</b>
	<?php echo CHtml::encode($data->NO_TELP); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('JENIS_KELAMIN')); ?>:</b>
	<?php echo CHtml::encode($data->JENIS_KELAMIN); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('KETERANGAN')); ?>:</b>
	<?php echo CHtml::encode($data->KETERANGAN); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('BIAYA_REGISTRASI')); ?>:</b>
	<?php echo CHtml::encode($data->BIAYA_REGISTRASI); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TANGGAL_REGISTRASI')); ?>:</b>
	<?php echo CHtml::encode($data->TANGGAL_REGISTRASI); ?>
	<br />

	*/ ?>

</div>