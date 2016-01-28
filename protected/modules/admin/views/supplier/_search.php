<?php
/* @var $this SupplierController */
/* @var $model Supplier */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'ID_SUPPLIER'); ?>
		<?php echo $form->textField($model,'ID_SUPPLIER'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'NAMA_SUPPLIER'); ?>
		<?php echo $form->textField($model,'NAMA_SUPPLIER',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ALAMAT_SUPPLIER'); ?>
		<?php echo $form->textField($model,'ALAMAT_SUPPLIER',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'NO_TELP_SUPPLIER'); ?>
		<?php echo $form->textField($model,'NO_TELP_SUPPLIER',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->