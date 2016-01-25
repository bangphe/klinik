<?php
/* @var $this ItemController */
/* @var $model Item */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'item-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'ID_KATEGORI'); ?>
		<?php echo $form->textField($model,'ID_KATEGORI'); ?>
		<?php echo $form->error($model,'ID_KATEGORI'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'NAMA_ITEM'); ?>
		<?php echo $form->textField($model,'NAMA_ITEM',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'NAMA_ITEM'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'UKURAN'); ?>
		<?php echo $form->textField($model,'UKURAN'); ?>
		<?php echo $form->error($model,'UKURAN'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'SATUAN'); ?>
		<?php echo $form->textField($model,'SATUAN'); ?>
		<?php echo $form->error($model,'SATUAN'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'HARGA_JUAL'); ?>
		<?php echo $form->textField($model,'HARGA_JUAL'); ?>
		<?php echo $form->error($model,'HARGA_JUAL'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'TANGGAL_EXPIRED'); ?>
		<?php echo $form->textField($model,'TANGGAL_EXPIRED'); ?>
		<?php echo $form->error($model,'TANGGAL_EXPIRED'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'STATUS'); ?>
		<?php echo $form->textField($model,'STATUS'); ?>
		<?php echo $form->error($model,'STATUS'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->