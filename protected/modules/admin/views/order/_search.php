<?php
/* @var $this OrderController */
/* @var $model Order */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'KODE_ORDER'); ?>
		<?php echo $form->textField($model,'KODE_ORDER',array('size'=>11,'maxlength'=>11)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ID_PASIEN'); ?>
		<?php echo $form->textField($model,'ID_PASIEN'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'TANGGAL_ORDER'); ?>
		<?php echo $form->textField($model,'TANGGAL_ORDER'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'USER_PEMBUAT'); ?>
		<?php echo $form->textField($model,'USER_PEMBUAT'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'PEMBAYARAN'); ?>
		<?php echo $form->textField($model,'PEMBAYARAN'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'KEMBALIAN'); ?>
		<?php echo $form->textField($model,'KEMBALIAN'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->