<?php
/* @var $this OrderController */
/* @var $model Order */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'order-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'ID_PASIEN'); ?>
		<?php echo $form->textField($model,'ID_PASIEN'); ?>
		<?php echo $form->error($model,'ID_PASIEN'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'TANGGAL_ORDER'); ?>
		<?php echo $form->textField($model,'TANGGAL_ORDER'); ?>
		<?php echo $form->error($model,'TANGGAL_ORDER'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'USER_PEMBUAT'); ?>
		<?php echo $form->textField($model,'USER_PEMBUAT'); ?>
		<?php echo $form->error($model,'USER_PEMBUAT'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'PEMBAYARAN'); ?>
		<?php echo $form->textField($model,'PEMBAYARAN'); ?>
		<?php echo $form->error($model,'PEMBAYARAN'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'KEMBALIAN'); ?>
		<?php echo $form->textField($model,'KEMBALIAN'); ?>
		<?php echo $form->error($model,'KEMBALIAN'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->