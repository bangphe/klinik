<?php
/* @var $this PasienController */
/* @var $model Pasien */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'pasien-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'ID_LAYANAN'); ?>
		<?php echo $form->textField($model,'ID_LAYANAN'); ?>
		<?php echo $form->error($model,'ID_LAYANAN'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'NAMA_PASIEN'); ?>
		<?php echo $form->textField($model,'NAMA_PASIEN',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'NAMA_PASIEN'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ALAMAT'); ?>
		<?php echo $form->textField($model,'ALAMAT',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'ALAMAT'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'NO_TELP'); ?>
		<?php echo $form->textField($model,'NO_TELP',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'NO_TELP'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'JENIS_KELAMIN'); ?>
		<?php echo $form->textField($model,'JENIS_KELAMIN'); ?>
		<?php echo $form->error($model,'JENIS_KELAMIN'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'KETERANGAN'); ?>
		<?php echo $form->textField($model,'KETERANGAN',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'KETERANGAN'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'BIAYA_REGISTRASI'); ?>
		<?php echo $form->textField($model,'BIAYA_REGISTRASI'); ?>
		<?php echo $form->error($model,'BIAYA_REGISTRASI'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'TANGGAL_REGISTRASI'); ?>
		<?php echo $form->textField($model,'TANGGAL_REGISTRASI'); ?>
		<?php echo $form->error($model,'TANGGAL_REGISTRASI'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->