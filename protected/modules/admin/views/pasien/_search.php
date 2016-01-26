<?php
/* @var $this PasienController */
/* @var $model Pasien */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'ID_PASIEN'); ?>
		<?php echo $form->textField($model,'ID_PASIEN'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ID_LAYANAN'); ?>
		<?php echo $form->textField($model,'ID_LAYANAN'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'NAMA_PASIEN'); ?>
		<?php echo $form->textField($model,'NAMA_PASIEN',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ALAMAT'); ?>
		<?php echo $form->textField($model,'ALAMAT',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'NO_TELP'); ?>
		<?php echo $form->textField($model,'NO_TELP',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'JENIS_KELAMIN'); ?>
		<?php echo $form->textField($model,'JENIS_KELAMIN'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'KETERANGAN'); ?>
		<?php echo $form->textField($model,'KETERANGAN',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'BIAYA_REGISTRASI'); ?>
		<?php echo $form->textField($model,'BIAYA_REGISTRASI'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'TANGGAL_REGISTRASI'); ?>
		<?php echo $form->textField($model,'TANGGAL_REGISTRASI'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->